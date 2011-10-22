<?php echo $session->flash(); ?>
<?php echo $session->flash('email'); ?>

<?php debug($data['Message']); ?>

<h2> contestar a esta conversacion</h2>

<?php
    echo $form->create('Message', array('url' => array('controller' => 'projects', 'action' => 'admin_conversacion', $data['id']),'type' => 'file'));
    echo $form->input('Message.content');
    echo $form->input('Message.file', array('label' => 'Adjuntar Archivo', 'type' => 'file'));
    echo $form->end('Enviar Mensaje');
?>
