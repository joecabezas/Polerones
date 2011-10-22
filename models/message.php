<?php
class Message extends AppModel {
	var $name = 'Message';
	
	var $actsAs = array(
		'MeioUpload.MeioUpload' => array(
			'file' => array(
				'maxSize' => 5242880, //5MB
				'allowedMime' => null,
				'allowedExt' => array(
					'.jpg',
					'.jpeg',
					'.png',
					'.gif',
					'.pdf',
					'.zip',
					'.rar'
				)
			)
		)
	);
	
	var $validate = array(
		'content' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Este campo no puede quedar vacío',
				'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'minLength' => array(
				'rule' => array('minLength', 10),
				'message' => 'Tu mensaje es muy corto!'
			),
		),
		'file' => array(
			'Empty' => array(
				'rule' => array('uploadCheckEmpty'),
				'check' => false,
				'on' => 'create',
				'last' => true
			)
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Thread' => array(
			'className' => 'Thread',
			'foreignKey' => 'thread_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	
}
?>
