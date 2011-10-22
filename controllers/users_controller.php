<?php
class UsersController extends AppController {

	var $name = 'Users';
	
	function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow(
			'login', 'logout', 'recover'
		);
	}
    
    function beforeRender(){
    	parent::beforeRender();
    	if( $this->layout != 'auth' ){
			$this->layout = 'backend';
			$this->set('backendPrefix','backend');
		}
    }
	
    function login() {
    	$this->layout = 'auth';
    }

    function logout() {
        $this->redirect($this->Auth->logout());
    }
    
    function index(){
    	/** Debería mostrar un resumen de usuario o algo así **/
    }

	function recover(){
		/** Falta construir el controlador para recuperar la contraseña **/
	}
    
}
?>