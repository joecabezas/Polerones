<?php
class Picture extends AppModel {
	var $name = 'Picture';
	
	
	var $actsAs = array(
			'MeioUpload.MeioUpload' => array(
				'url' => array(
					'Empty' => array(
						'check' => false
					),
					'useTable' => true,
					'createDirectory' => false,
					'maxSize' => 2097152,
					'allowedMime' => array('image/jpeg', 'image/pjpeg', 'image/png', 'image/gif'),
					'allowedExt' => array('.jpg', '.jpeg', '.png', '.gif'),
					'zoomCrop' => 'C',
					'thumbnailQuality' => 85,
					'thumbsizes' => array(
						'normal' => array('width' => 940, 'height' => 760, 'zoomCrop' => 'C'),
						'medium' => array('width' => 470, 'height' => 380, 'zoomCrop' => 'C'),
						'small' => array('width' => 110, 'height' => 110, 'zoomCrop' => 'C'),
						'nano' => array('width' => 74, 'height' => 74, 'zoomCrop' => 'C')
					),
					'length' => array(
						'minWidth' => 200
					)
				)
			)
		);
	
	
	var $validate = array(
		'product_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		/*'url' => array(
			'url' => array(
				'rule' => array('url'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),*/
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
