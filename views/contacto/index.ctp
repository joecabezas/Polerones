<?php echo $this->Session->flash('email'); ?>
<?php echo $form->create('Message', array('type' => 'file', 'url' => array('controller' => 'contacto'))); ?>

<?php echo $form->input('Message.name', array('label' => 'Nombre')); ?>
<?php echo $form->input('Message.mail', array('label' => 'Email')); ?>
<?php echo $form->input('Message.phone', array('label' => 'Teléfono')); ?>
<?php echo $form->input('Message.comuna', array('label' => 'Comuna')); ?>
<?php echo $form->input('Message.file', array('type' => 'file', 'label' => 'Adjuntar archivo (Opcional)')); ?>
<?php echo $form->input('Message.file_dir', array('type' => 'hidden')); ?>
<?php echo $form->input('Message.content', array('label' => 'Mensaje', 'type' => 'textarea')); ?>

<?php echo $form->end('Enviar'); ?>
