<?php

class NotificationsComponent extends Object {

	var $components = array('Email');

	//variables de componente
	//var $userModel = 'User'; //not used
	var $config = array();
	var $to = array();
	var $from = array(
		'mail' => 'Robot <robot@polerones.com>'
		);

	//called before Controller::beforeFilter()
	function initialize(&$controller, $settings = array()) {
		// saving the controller reference for later use
		$this->controller =& $controller;
	}

	function sendContactNotification(){

		if(!$this->validarDatos()){
			return false;
		}

		//avisar a todos los admin
		foreach($this->to as $to){
			$this->_send($to);
		}
	}

	function sendReplyNotification(){

		if(!$this->validarDatos()){
			return false;
		}

		//avisar a todos los involucrados del proyecto en cuestion, excepto a quien envio el mensaje
		foreach($this->to as $to){
			$this->_send($to);
		}

		//$this->_debugDatos();

	}

	function validarDatos(){
		//verificar que hay destinos
		if(!isset($this->to) || empty($this->to)){
			debug('NotificationsComponent: No hay destinos definidos!');
			debug($this->to);
			return false;
		}

		//verificar si estan las configuraciones minimas
		if(!isset($this->config) || empty($this->config)){
			debug('NotificationsComponent: No hay config');
			return false;
		}

		if(!isset($this->config['subject']) || empty($this->config['subject'])){
			debug('NotificationsComponent: No hay subject');
			return false;
		}

		if(!isset($this->config['template']) || empty($this->config['template'])){
			debug('NotificationsComponent: No hay template');
			return false;
		}

		return true;
	}

	function _debugDatos(){

		debug($this->config);
		debug($this->from);

		foreach($this->to as $to){
			debug($to);
		}
	}

	function _send($to)
	{
		$this->Email->to = $to['mail'];

		$this->Email->subject = $this->config['subject'];
		$this->Email->replyTo = $this->from['mail'];
		$this->Email->from = $this->from['mail'];
		
		if(isset($this->attachments))
			$this->Email->attachments = $this->attachments;

		$this->Email->template = $this->config['template']; // note no '.ctp'
		//Send as 'html', 'text' or 'both' (default is 'text')

		$this->Email->sendAs = 'both'; // because we like to send pretty mail

		//debug
		//$this->Email->delivery = 'debug';

		//Set view variables as normal
		$data['config'] = $this->config;
		$data['from'] = $this->from;
		$data['to'] = $to;
		
		$this->controller->set('data', $data);

		//Do not pass any args to send()
		$this->Email->send();
	}
}

?>
