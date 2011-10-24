<?php
class Message extends AppModel {
	var $name = 'Message';

	var $actsAs = array(
		'Upload.Upload' => array(
			'file' => array(

				'fields' => array(
					'dir' => 'file_dir',
					'type' => 'file_type',
					'size' => 'file_size',
				),

				'maxSize' => 5242880, // = (10 * 1024 * 1024) //10MB

				'extensions' => array(
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
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'No olvides escribir tu nombre!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'mail' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Por favor, escribe aca tu correo, queremos responderte!',
				//'allowEmpty' => false,
				//'required' => false,
				'last' => true, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'email' => array(
				'rule' => array('email'),
				'message' => 'Está bien escrito tu correo?, parece no ser válido :(',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'phone' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Escribe un teléfono para que te podamos contactar.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'comuna' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Queremos saber de dónde eres, escribe tu comuna por favor.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'content' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => '¿Nos quieres decir algo?, escribe tu mensaje acá.',
				//'allowEmpty' => false,
				//'required' => false,
				'last' => true, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'minlength' => array(
				'rule' => array('minlength', 10),
				'message' => 'Tu mensaje es muy corto!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),

		'file' => array(
			'isBelowMaxSize' => array(
				'rule' => 'isBelowMaxSize',
				'message' => 'El archivo no debe superar los 10MB.',
			),
			/*
			'isValidExtension' => array(
				'rule' => 'isValidExtension',
				'message' => 'El archivo es de un tipo no válido, intente con los siguientes tipos: jpg, png, gif, pdf, zip, rar.'
			),
			*/
		)
	);

	/*
	var $validate = array(
		'content' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Vacio',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'minlength' => array(
				'rule' => array('minlength'),
				'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'file' => array(
			'isBelowMaxSize' => array(
				'rule' => 'isBelowMaxSize',
				'message' => 'El archivo no debe superar los 10MB.'
			),
			'isValidExtension' => array(
				'rule' => 'isValidExtension',
				'message' => 'El archivo es de un tipo no válido, intente con los siguientes tipos: jpg, png, gif, pdf, zip, rar.'
			),
		)
	);
	*/

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	/*
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
	*/


}
?>
