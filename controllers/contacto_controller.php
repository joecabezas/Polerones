<?php
class ContactoController extends AppController {

	var $name = 'Contacto';
	var $uses = array('Message','Project', 'User');

	//var $layout = 'backend';

	var $components = array('Notifications');

	function index(){
		$this->pageTitle = 'Contactanos';

		if($this->data){
			
			//crear el mensaje
			$this->Message->create();

			//setear el mensaje para validacion
			$this->Message->set($this->data);

			if(!$this->Message->validates($this->data)){
				//debug($this->Message->validationErrors);
				return;
			}

			$this->Message->save();
			
			//mandar notificacion a los admin
			//adjuntar datos del cliente que esta mandando el mensaje
			$this->Notifications->from = $this->data['Message'];
			
			//adjuntar archivo si existe
			$msg = $this->Message->read();
			if(isset($msg['Message']['file']))
				$this->Notifications->attachments = array(
						WWW_ROOT.'files/message/file/'.$msg['Message']['file_dir'].DS.$msg['Message']['file']
					);

			//adjuntar informacion de todos los admin
			$admins = $this->User->find('all', array('conditions' => array('privileges' => 0)));

			//debug($admins);
			
			//por cada admin encontrado...
			foreach($admins as $admin){
				$this->Notifications->to[] = $admin['User'];
			}
			
			//debug: enviar a joe.cabezas@gmail.com
			//$this->Notifications->to[] = array(
			//		'mail' => 'joe.cabezas@gmail.com',
			//		'name' => 'joe cabezas',
			//	);

			//configurar notificacion
			$this->Notifications->config['template'] = 'notification_new_contact';
			$this->Notifications->config['subject'] = '[Nuevo Mensaje] ['.$this->Notifications->from['name'].']';

			//enviar mail
			$this->Notifications->sendContactNotification();
			//debug($this->Session->read('Message.email'));

			//mandar al index
			$this->render('mensaje_enviado');
		}
	}

}
?>
