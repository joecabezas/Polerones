<?php
class ContactoController extends AppController {

	var $name = 'Contacto';
	var $uses = array('Message','Project','ProjectPermission','Region','Status','Thread','User');
	var $layout = 'backend';

	var $components = array('Notifications');
	
	function index(){
		$this->pageTitle = 'Contactanos';
		
		if($this->data){
			//verificar si existe el user
			$user = $this->User->find('first', array('conditions' => array('User.mail' => $this->data['User']['mail'])));

			//si no existe, crearlo
			if(empty($user)){
				$user = $this->User->save($this->data['User']);
			} else {
				$this->User->set($user);
			}
		
			//setear el mensaje para validacion
			$this->Message->set($this->data);
		
			if($user && $this->Message->validates()){
		
				//buscar status: Cotización
				//si no está, crearlo
				$nombre_estado = 'Cotización';
			
				$status = $this->Status->find('first', array('conditions' => array('Status.name' => $nombre_estado)));
			
				//si no existe, crearlo
				if(empty($status)){
					$this->Status->create();
					$this->Status->set('name',$nombre_estado);
					$status = $this->Status->save();
				} else {
					$this->Status->set($status);
				}
			
				//crear proyecto
				$this->Project->create();
				$this->Project->set('status_id', $this->Status->id);
				$this->Project->save();
		
				//crear permisos al usuario para acceder a este proyecto
				$this->ProjectPermission->create();
				$this->ProjectPermission->set('user_id',$this->User->id);
				$this->ProjectPermission->set('project_id',$this->Project->id);
				$this->ProjectPermission->save();
		
				//agregar hash al permiso recien creado
				$this->ProjectPermission->id = $this->ProjectPermission->id;
				$this->ProjectPermission->set('hash', Security::hash($this->ProjectPermission->id)); //no esta agregando salt
				//$this->ProjectPermission->set('hash', $this->ProjectPermission->id);
				$this->ProjectPermission->save();
			
				//crear el thread
				$this->Thread->create();
				$this->Thread->set('project_id', $this->Project->id);
				$this->Thread->save();
			
				//crear el mensaje
				$this->Message->create();
				$this->Message->set($this->data);
				$this->Message->set('thread_id',	$this->Thread->id);
				$this->Message->set('user_id',		$this->User->id);
				$this->Message->save();
				
				//mandar notificacion al admin				
				//adjuntar datos de que admin está respondiendo
				$this->Notifications->from = $this->data['User'];
				
				//adjuntar informacion de todos los admin
				$admins = $this->User->find('all', array('conditions' => array('privileges' => 0)));

				//por cada admin encontrado...	
				foreach($admins as $admin){
					$this->Notifications->to[] = $admin['User'];
				}
				
				//configurar notificacion
				$this->Notifications->config['thread_id'] = $this->Thread->id;
				$this->Notifications->config['template'] = 'notification_new_contact';
				$this->Notifications->config['subject'] = '[Nuevo Contacto] [#'.$this->Thread->id.'] ['.$this->Notifications->from['name'].']';
				
				//enviar mail
				$this->Notifications->sendContactNotification();
				
			} else {
				//no pudo agregar al user
			}
		}
		
		//$this->Notifications->sendContactNotification($this->data);
		
		//obtener la lista de regiones
		$r = $this->Region->find('list');
		$this->set('regions', $r);
	}
	
	function beforeFilter(){
		parent::beforeFilter();
		$this->Notifications->aaa = 'bbb';
	}

}
?>
