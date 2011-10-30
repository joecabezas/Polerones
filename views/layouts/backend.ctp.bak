<?php
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.view.templates.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php __('Polerones.com ›'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon','/app/webroot/favicon.ico');
		echo $this->Html->css('backend_reset');
		echo $this->Html->css('backend_generic');

		echo $scripts_for_layout;
	?>
</head>
<body>
	<div id="container">

		<div id="wrap">		

			<?php echo $this->element('backend_header'); ?>
			<?php if(isset($backendPrefix)) echo $this->element($backendPrefix.'_menu'); ?>

			<div id="content">
				<?php echo $this->Session->flash(); ?>
				<?php echo $content_for_layout; ?>
			</div>
			
			<?php echo $this->element('backend_footer'); ?>
		
		</div>
		
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
