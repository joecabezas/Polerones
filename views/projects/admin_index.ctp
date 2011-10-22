<?php echo $session->flash(); ?>

<h2>Estos son tus Proyectos</h2>


<?php echo $html->link('[+] Nuevo Proyecto', array('action' => 'admin_add'), array('class' => 'button')); ?>
<?php foreach($data['Projects'] as $proyecto): ?>

	<?php $idp = $proyecto['Project']['id']; ?>
	<p>Proyecto #<?php echo $idp; ?></p>

	<?php echo $html->link('[Borrar Proyecto]', array('action' => 'admin_delete', $idp),null,'seguro deseas borrar el proyecto #'.$idp); ?>
	<?php echo $html->link('[Ver Conversación]', array('action' => 'admin_conversacion', $proyecto['Thread'][0]['id'])); ?>
	<?php debug($proyecto); ?>

<?php endforeach; ?>
