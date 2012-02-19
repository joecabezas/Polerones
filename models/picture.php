<?php
class Picture extends AppModel {
	var $name = 'Picture';
	var $displayField = 'name';

	var $actsAs = array(
		'Upload.Upload' => array(
			'image' => array(
				'fields' => array(
					'dir' => 'image_dir',
				),
				'thumbsizes' => array(
					'grande' => '640w',
					'mediana' => '318x218',
					'chica' => '60x45',
				),
				'thumbnailMethod' => 'php',
			),
		//'Sequence.Sequence'
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>
