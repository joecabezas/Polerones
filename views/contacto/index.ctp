<?php echo $this->Session->flash('email'); ?>
<?php echo $form->create('Contacto', array('url' => array('controller' => 'contacto'))); ?>

<?php echo $form->input('User.name'); ?>
<?php echo $form->input('User.mail'); ?>
<?php echo $form->input('User.phone'); ?>
<?php echo $form->input('User.region_id'); ?>
<?php echo $form->input('Message.content', array('type' => 'textarea')); ?>

<?php echo $form->end('Enviar'); ?>
