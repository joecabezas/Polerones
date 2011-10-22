<?php
class AdminController extends AppController {

	var $name = 'Admin';
	var $helpers = array('Html', 'Form', 'AdminMenu');
	var $components = array('Auth', 'JoexImage');
	var $uses = array('Admin', 'Producto', 'Tipo', 'Tecnica', 'Material');
	
	function index(){
		
	}
	
	
	// LOGICA DE PRODUCTOS

	function productos() {
		$this->Producto->recursive=3;
		$productos = $this->Producto->find('all', array('order' => 'Producto.id DESC'));
		
		$this->set('productos', $productos);
	}
	
	function agregar_producto(){
		if ($this->data) {
			//Debugger::dump(pr($this->data['Producto']['foto_delantera']));
			//exit();
		
			//primero subir fotos
			//generar un nombre unico para todas las fotos, para evitar problemas de procesamiento
			//ya que la version gib y small DEBEN tener el mismo nombre, pues en la BD solo se graba el small
			
			$nombreUnico = $this->JoexImage->generarNombreUnico();
			
			$imagen = $this->data['Producto']['foto_delantera'];
			$opciones = array('prefijo' => 'del', 'nombre' => $nombreUnico);
			$foto_delantera_big = $this->JoexImage->upload($imagen, 800, 600, "big", $opciones);
			$foto_delantera_small = $this->JoexImage->upload($imagen, 230, 150, "small", $opciones);
		
			$imagen = $this->data['Producto']['foto_trasera'];
			$opciones = array('prefijo' => 'tra', 'nombre' => $nombreUnico);
			$foto_trasera_big = $this->JoexImage->upload($imagen, 800, 600, "big", $opciones);
			$foto_trasera_small = $this->JoexImage->upload($imagen, 230, 150, "small", $opciones);
		
			if($this->data['Producto']['foto_detalle']){
				$imagen = $this->data['Producto']['foto_detalle'];
				$opciones = array('prefijo' => 'det', 'nombre' => $nombreUnico);
				$foto_detalle = $this->JoexImage->upload($imagen, 80, 80, "detail", $opciones);
			}
		
			//recuperar estructura del producto con el nombre de cada imagen guardada
			$this->data['Producto']['foto_delantera'] = $foto_delantera_small;
			$this->data['Producto']['foto_trasera'] = $foto_trasera_small;
			$this->data['Producto']['foto_detalle'] = $foto_detalle;
			
			//Humanizemos el nombre
			App::import('Core', 'sanitize');
			$this->data['Producto']['name'] = Sanitize::clean($this->data['Producto']['name']);

			$this->Producto->create();
		
			if($this->Producto->save($this->data)){
				$this->Session->setFlash('Producto añadido exitosamente');
				$this->redirect('productos');
			}
		}
		
		$aaa = $this->Tipo->find('list');
		$this->set('tipos',$aaa);
		
		$aaa = $this->Tecnica->find('list');
		$this->set('tecnicas',$aaa);
		
		$aaa = $this->Material->find('list');
		$this->set('materiales',$aaa);
		
	}
	
	function editar_producto($id) {
		if ($this->data) {
			App::import('Core', 'sanitize');
			$name = Sanitize::clean($this->data['Producto']['name']);
			$desc = Sanitize::clean($this->data['Producto']['descripcion']);
			
			$this->data['Producto']['name'] = $name;
			$this->data['Producto']['descripcion'] = $desc;

			if($this->Producto->save($this->data)){
				$this->Session->setFlash('Producto actualizado!');
				$this->redirect('productos');
			}
		}
		
		//$this->Producto->recursive=-1;
		//esto es lo mismo, pero la funcion read() es mas elegante
		//$this->data = $this->Producto->find(array('Categoria.id' => $id));
		$this->data = $this->Producto->read(null, $id);
		
		$this->set('tipos', $this->Tipo->find('list'));
		$this->set('tecnicas', $this->Tecnica->find('list'));
		$this->set('materiales', $this->Material->find('list'));
	}
	
	function borrar_producto($id) {	
		//obtener nombre de imagen, y borrarla
		$imagen = $this->Producto->read(null, $id);
			
		if (!$id) {
			$this->Session->setFlash('Producto no especificado');
		}
		else if($this->Producto->del($id)) {
			//borrando imagenes
			$del = $imagen['Producto']['foto_delantera'];
			$tra = $imagen['Producto']['foto_trasera'];
			$det = $imagen['Producto']['foto_detalle'];
		
			$this->JoexImage->borrarImagen($del, 'big');
			$this->JoexImage->borrarImagen($del, 'small');
		
			$this->JoexImage->borrarImagen($tra, 'big');
			$this->JoexImage->borrarImagen($tra, 'small');
		
			$this->JoexImage->borrarImagen($det, 'detail');
			$this->Session->setFlash('Producto eliminado con exito!');
		}
		else {
			$this->Session->setFlash('ERROR: No se puedo eliminar el producto');
		}
		$this->redirect('productos');
	}
	
	
	function login() {
		//esto solo se ejecuta una vez que la autenticacion (via auth component) ha sido exitosa
		//y solo si $this->Auth->autoRedirect = false; en un beforeFilter
		if ($this->Auth->user()) {
			/* FORMA ALTERNATIVA, menos elegante
			$user = $this->Auth->user();
			//@param : array de campos a actualizar con sus valores
			//@param : array de condiciones de registros a actualizar
			$this->Admin->updateAll(
				array('Admin.last_login' => date("YmdHis")),
				array('Admin.id' => $user['Admin']['id'])				
				);
			*/
			
			
			/* Forma elegante */
			$user = $this->Auth->user();
			$this->Admin->id = $user['Admin']['id'];
			$this->Admin->saveField('last_login', date("Y-m-d H:i:s"));
			
			$this->redirect('index');
		}
		$this->set('p', $this->Auth);
	}
	
	function logout() {
		$this->redirect($this->Auth->logout());
	}

	// called before every single action
	function beforeFilter() {
			
		Security::setHash('md5'); // or sha1 or sha256.
		
		//configurando el Auth Component
		$this->Auth->userModel = 'Admin';
		$this->Auth->loginAction = array('controller' => 'admin', 'action' => 'login');
		$this->Auth->loginRedirect = array('controller' => 'admin', 'action' => 'index');
		//$this->Auth->logoutRedirect = '';
		$this->Auth->autoRedirect = false;
		
		//esto especifica que funciones del controlador, son permitidas entrar por Auth
		//$this->Auth->allow('index');
		
		//mensajes de error
		$this->Auth->loginError = 'Datos de acceso incorrectos';
		$this->Auth->authError = 'Debe identificarse para poder entrar a esta area';
		
		
		$this->Auth->fields = array(
			'username' => 'name',
			'password' => 'password'
		);
		
	}

}
?>
