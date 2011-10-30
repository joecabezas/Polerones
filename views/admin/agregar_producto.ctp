<?php
	// Admin Menu (desde helper AdminMenu)
	$adminMenu->display();
?>
<h2>Ingrese nuevo Producto</h2>
<?php
	echo $form->create('Producto', array('url' => array('controller' => 'admin', 'action' => 'agregar_producto'), 'type' => 'file'));
	echo $form->input('name');
	echo $form->input('descripcion');
	echo $form->input('tipo_id');
	echo $form->input('tecnica_id');
	echo $form->input('material_id');
	echo 'Foto Delantera: '.$form->file('foto_delantera');
	echo 'Foto Trasera: '.$form->file('foto_trasera');
	echo 'Foto Detalle (opcional): '.$form->file('foto_detalle');
	echo $form->end('Enviar');
	
	//debug
	//echo pr($debug);
?>
