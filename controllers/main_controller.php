<?php
class MainController extends AppController {

	var $name = 'Main';
	var $uses = array('Picture', 'Product', 'Status', 'Category');

	function index(){

		//traer la lista de ultimas fotos que pertenezcan a productos
		//cuyos proyectos esten con status = 'Terminado'
		$this->Picture->recursive = 3;
		$r = $this->Picture->find(
			'all',
			array(
				'conditions' => array(
					//'Product.id' => '> 0',
				),
				'order' => array(
					'Picture.created' => 'DESC'
				),
			)
		);

		$pictures = array();
		foreach($r as $picture)
		{
			if($picture['Product']['Project']['Status']['name'] == 'Terminado')
			{
				if(count($pictures) < 12)
				{
					array_push($pictures, $picture['Picture']);
				} else {
					//FIXME: Verificar si efectivamente, sale del foreach
					break;
				}
			}
		}

		//debug($pictures);

		//encapsular todo
		$d['Pictures'] = $pictures;
		$this->set('d', $d);
	}

	function categoria($category_id = 1)
	{
		//obtener datos de la categoría
		$category = $this->Category->findById($category_id);

		//obtener la id del estado 'Terminado'
		$finished_status_id = $this->_getStatusIDbyName('Terminado');

		//$this->Product->recursive = 3;
		$r = $this->Product->find(
			'all',
			array(
				'conditions' => array(
					'Project.status_id' => $finished_status_id,
					'Project.category_id' => $category_id,
				),
			)
		);
		//debug($r);

		$d['Category'] = $category['Category'];
		$d['Products'] = $r;

		//debug($d);

		$this->set('d', $d);
	}

	function _getStatusIDbyName($name)
	{
		$r = $this->Status->findByName($name);
		return $r['Status']['id'];
	}
}
?>
