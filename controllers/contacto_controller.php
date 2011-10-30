<?php
class ContactoController extends AppController {

	var $name = 'Contacto';
	var $uses = array('Message','Project', 'User');

	//var $layout = 'backend';

	var $components = array('Notifications');

	function index(){
		$this->pageTitle = 'Contactanos';

		if($this->data){
			//verificar si existe el user
			/*
			$user = $this->User->find('first', array('conditions' => array('User.mail' => $this->data['User']['mail'])));

			//si no existe, crearlo
			if(empty($user)){
				$user = $this->User->save($this->data['User']);
			} else {
				$this->User->set($user);
			}
			*/

			//setear el mensaje para validacion
			$this->Message->set($this->data);

			if(!$this->Message->validates($this->data)){
				//debug($this->Message->validationErrors);
				return;
			}


			//$this->Session->setFlash('asd');

			//crear el mensaje
			$this->Message->create();
			$this->Message->set($this->data);
			$this->Message->save();

			//mandar notificacion a los admin
			//adjuntar datos del cliente que esta mandando el mensaje
			$this->Notifications->from = $this->data['Message'];

			//adjuntar informacion de todos los admin
			$admins = $this->User->find('all', array('conditions' => array('privileges' => 0)));

			//por cada admin encontrado...
			foreach($admins as $admin){
				$this->Notifications->to[] = $admin['User'];
			}

			//configurar notificacion
			$this->Notifications->config['template'] = 'notification_new_contact';
			$this->Notifications->config['subject'] = '[Nuevo Mensaje] ['.$this->Notifications->from['name'].']';

			//enviar mail
			$this->Notifications->sendContactNotification();

			//mandar al index
			$this->render('mensaje_enviado');
		}

		//$this->Notifications->sendContactNotification($this->data);
	}

}
?>
