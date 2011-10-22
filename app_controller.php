<?php
class AppController extends Controller {

	var $components = array('Auth','Session');
	var $helpers = array('Session','Html','Form');

	function beforeFilter() {

		//Security::setHash('md5');

		$this->Auth->fields = array(
			'username' => 'mail',
			'password' => 'password'
		);

		if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {

			if($this->Session->read('Auth.User.privileges') != 0){
				$this->Session->setFlash('No tienes permisos para acceder al panel de administración');
				$this->redirect(array('controller' => 'users', 'action' => 'login', 'clientes' => true));
			}

		}

		$this->Auth->loginAction = array(
			'controller' => 'users',
			'action' => 'login',
			'admin' => false,
			//'clientes' => false
		);

		if($this->Session->read('Auth.User.privileges') == 0){

			$this->Auth->loginRedirect = array(
				'controller' => 'projects',
				'action' => 'index',
				'admin' => true
			);

		}else{

			$this->Auth->loginRedirect = array(
				'controller' => 'projects',
				'action' => 'index',
				'clientes' => true
			);

		}

		$this->Auth->loginError = "Tu e-mail o contraseña son incorrectos";
		$this->Auth->authError = "Debes ingresar tu e-mail y password para ingresar";

		if(in_array($this->name, array('Pages', 'Contacto'))) {
			$this->Auth->allow('*');
		}
	}

	function beforeRender(){

		if(isset($this->params['prefix'])){
			switch($this->params['prefix']){
				case 'admin':
					$this->set('backendPrefix',$this->params['prefix']);
					$this->layout = 'backend';
					break;
				case 'clientes':
					$this->set('backendPrefix',$this->params['prefix']);
					$this->layout = 'backend';
					break;
				default:
					$this->set('backendPrefix','backend');
			}
		}

		$this->_setErrorLayout();
	}

	function _setErrorLayout() {
    	if($this->name == 'CakeError') {
	        $this->layout = 'error';
    	}
	}


}
