<?php
/* Message Test cases generated on: 2011-10-23 20:10:30 : 1319414130*/
App::import('Model', 'Message');

class MessageTestCase extends CakeTestCase {
	var $fixtures = array('app.message');

	function startTest() {
		$this->Message =& ClassRegistry::init('Message');
	}

	function endTest() {
		unset($this->Message);
		ClassRegistry::flush();
	}

}
?>