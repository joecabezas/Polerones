<div id="user">

	<?php
		echo $session->flash('auth');
		echo $form->create('User', array('action' => 'login'));
		echo $form->input('mail');
		echo $form->input('password');
	?>

	<div class="recover">
		<?php //echo $html->link('Perdí mi Contraseña. Quiero Recuperarla.',array('action' => 'recover')); ?>
	</div>
	<?php echo $form->end('Ingresar'); ?>
</div>
