<?php
class AdminMenuHelper extends AppHelper {
	var $helpers = array('Html');
	
	function display() {
		$adminMenu = $this->Html->link('[Volver al menu principal]', 'index');
		$adminMenu .= ' '.$this->Html->link('[Desconectar]', 'logout');
		echo $this->Html->div('adminMenu', $adminMenu);
	}
}
?>
