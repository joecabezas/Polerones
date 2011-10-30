<?php
/* Message Fixture generated on: 2011-10-23 20:10:30 : 1319414130 */
class MessageFixture extends CakeTestFixture {
	var $name = 'Message';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'file' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'file_dir' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'file_type' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'file_size' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'file' => 'Lorem ipsum dolor sit amet',
			'file_dir' => 'Lorem ipsum dolor sit amet',
			'file_type' => 'Lorem ipsum dolor sit amet',
			'file_size' => 'Lorem ipsum dolor sit amet',
			'created' => '2011-10-23 20:55:30',
			'modified' => '2011-10-23 20:55:30'
		),
	);
}
?>