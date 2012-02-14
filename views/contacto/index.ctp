<!--
<?php echo $this->Session->flash('email'); ?>
<?php
	echo $form->create(
		'Message',
		array(
			'type' => 'file',
			'url' => array(
				'controller' => 'contacto'
			)
		),
		array(
			'id' => 'aaa'
		)
	);
?>

<?php echo $form->input('Message.name', array('label' => 'Nombre')); ?>
<?php echo $form->input('Message.mail', array('label' => 'Email')); ?>
<?php echo $form->input('Message.phone', array('label' => 'Teléfono')); ?>
<?php echo $form->input('Message.comuna', array('label' => 'Comuna')); ?>
<?php echo $form->input('Message.file', array('type' => 'file', 'label' => 'Adjuntar archivo (Opcional)')); ?>
<?php echo $form->input('Message.file_dir', array('type' => 'hidden')); ?>
<?php echo $form->input('Message.content', array('label' => 'Mensaje', 'type' => 'textarea')); ?>

<?php echo $form->end('Enviar'); ?>
-->

<h1 id="ico_contacto">Contacto</h1>
<?php
	echo $form->create(
		'Message',
		array(
			'type' => 'file',
			'url' => array(
				'controller' => 'contacto'
			)
		),
		array(
			'id' => 'aaa'
		)
	);
?>
	<div id="formulario">
		<div id="col_01">
			<p><?php echo $form->input('Message.name', array('label' => 'Nombre')); ?></p>
			<p><?php echo $form->input('Message.mail', array('label' => 'Email')); ?></p>
			<p><?php echo $form->input('Message.phone', array('label' => 'Teléfono')); ?></p>
			<p><?php echo $form->input('Message.comuna', array('label' => 'Comuna')); ?></p>
		</div>
		<div id="col_02">
			<p><?php echo $form->input('Message.file', array('type' => 'file', 'label' => 'Adjuntar archivo (Opcional)')); ?></p>
			<?php echo $form->input('Message.file_dir', array('type' => 'hidden')); ?>
			<p><?php echo $form->input('Message.content', array('label' => 'Mensaje', 'type' => 'textarea')); ?> </p>
			<p class="align_right"><button type="submit" title="Enviar">&nbsp;</button></p>
		</div>
	</div>
</form>
