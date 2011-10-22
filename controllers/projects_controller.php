<?php
class ProjectsController extends AppController {

	var $name = 'Projects';

	var $components = array('Notifications');
	//var $scaffold;

	function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow(
			'clientes_conversacion'
		);
	}

	function admin_index(){

		debug($this->layout);

		$this->Project->recursive = 2;
		$data['Projects'] = $this->Project->find('all');

		//descomentar para borrar todos los proyectos
		//$this->Project->deleteAll(true);

		$this->set('data', $data);
	}

	function admin_delete($id){
		if (!$id) {
			$this->Session->setFlash(__('Proyecto inválido', true));
			$this->redirect(array('action'=>'admin_index'));
		}
		//borrar en cascada
		if ($this->Project->delete($id,true)) {
			$this->Session->setFlash(__('Proyecto borrado', true));
			$this->redirect(array('action'=>'admin_index'));
		}
		$this->Session->setFlash(__('El proyecto no pudo ser borrado', true));
		$this->redirect(array('action' => 'admin_index'));
	}

	//$id: thread ID
	function admin_conversacion($id = null){
		if (!$id) {
			$this->Session->setFlash(__('Hilo de conversacion no especificado', true));
			$this->redirect(array('action'=>'admin_index'));
		}

		//buscar el thread requerido
		$this->Project->Thread->recursive = 3;
		$this->Project->Thread->Behaviors->attach('Containable');
		$this->Project->Thread->contain('Message', 'Project.ProjectPermission.User');
		$data = $this->Project->Thread->read(null,$id);
		//debug($data);

		if($this->data){

			//adjuntra informacion adicional
			$this->data['Message']['thread_id'] = $id;
			$this->data['Message']['user_id'] = $this->Session->read('Auth.User.id');

			if($this->Project->Thread->Message->save($this->data)){

				//enviar notificacion al(los) user involucrados
				//adjuntar datos de que admin está respondiendo
				$this->Notifications->from = $this->Session->read('Auth.User');

				//adjuntar informacion de que otros usuarios estan involucrados en el proyecto
				foreach($data['Project']['ProjectPermission'] as $permiso){
					//debug($permiso);

					//agregar datos del destino
					$to = $permiso['User'];

					//agregar datos del sufix: parte del final del link, que puede ser una ID o un named param (hash)
					if(isset($permiso['hash'])){ //TODO: verificar si esto funciona cuando no hay hash
						//debug('Hay hash, por lo que hay que mandar el link con hash y NO con la ID del thread');
						$to['sufix'] = 'hash:'.$permiso['hash'];
						$to['hash'] = true;
					} else {
						$to['sufix'] = $id;
					}

					//agregar al notification
					$this->Notifications->to[] = $to;
					debug($this->Notifications->to);
				}

				//configurar notificacion
				$this->Notifications->config['template'] = 'notifications_user_reply';
				$this->Notifications->config['subject'] = '[Polerones.com] [Han respondido tu mensaje!]';

				//enviar mail
				$this->Notifications->sendReplyNotification();

				//mensaje guardado, redirigir :D
				//$this->redirect(array($id));
			} else {
				debug('mensaje NO guardado');
			}
		}

		$data['id'] = $id;
		$this->set('data', $data);
	}

	/** Acciones de Clientes **/

	//$id: thread ID
	function clientes_conversacion($id = null){

		if (!$id && !isset($this->params['named']['hash'])) {
			$this->Session->setFlash(__('Hilo de conversación no especificado', true));
			$this->redirect(array('action'=>'clientes_index'));
		}

		//verificar si es un hash
		if(isset($this->params['named']['hash'])){
			//debug('si hay hash');

			//buscar el project_permission asociado y permitir acceso
			$this->Project->ProjectPermission->recursive = 3;
			$permiso = $this->Project->ProjectPermission->find('first', array('conditions' => array('hash' => $this->params['named']['hash'])));
			if($permiso){
				//debug($permiso);

				//verificar si el proyecto asociado tiene un solo thread, si es asi:
				//mostrar el thread, listo para responder
				if(count($permiso['Project']['Thread']) == 1){
					$data = $this->Project->Thread->find('first', array('conditions' => array('Thread.id' => $permiso['Project']['Thread'][0]['id'])));
				} else {
					//si no:
					//redirigir al dashboard del proyecto, para que escoja que thread quiere ver
					$this->redirect(array('action' => 'clientes_index'));
				}
			} else {
				//debug('no encontre permiso');
				$this->Session->setFlash(__('Link de acceso no valido!, si creaste una contraseña, primero debes ingresar para poder ver tus proyectos', true));
				$this->redirect(array('action'=>'clientes_index'));
			}
		}

		if($id){
			//buscar el thread con esta $id
			//$data = $this->Project->Thread->recursive = 3;
			$data = $this->Project->Thread->find('first', array('conditions' => array('Thread.id' => $id)));
		}

		if($this->data){

			$this->data['Message']['thread_id'] = $data['Thread']['id'];

			debug($this->data);

			if($this->Project->Thread->Message->save($this->data)){

				//enviar notificacion al(los) admin
				$this->Notifications->sendReplyNotification($data);

				//mensaje guardado
				$this->redirect(array($id));
			} else {
				debug('mensaje NO guardado');
			}
		}

		debug($data);
		$this->set('data', $data);
	}

	function clientes_index(){

	}

}
?>
