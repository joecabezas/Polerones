<?php
class ProductosController extends AppController {

	var $name = 'Productos';
	var $helpers = array('Xml');
	var $scaffold;

	function ver($var){
		
		Configure::write('debug', 0);
		
		$this->layoutPath = 'xml';
		$this->layout = 'default';

		$productos = $this->Producto->find('all', array('order' => 'Producto.id DESC'));
		
		//Debugger::dump(pr($productos));

		$this->set('productos', $productos);
	}
}
?>
