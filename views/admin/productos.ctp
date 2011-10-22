<?php 
	// Admin Menu (desde helper AdminMenu)
	$adminMenu->display();
?>

<h2>Administrar Productos</h2>

<?php echo $html->div(null, $html->link('[Agregar Producto]', 'agregar_producto')); ?>
<br/>

<table>
	<tr>
		<th>id</th>
		<th>foto<br/>delantera</th>
		<th>foto<br/>trasera</th>
		<th>foto<br/>detalle</th>
		<th>nombre</th>
		<th>descripcion</th>
		<th>tipo</th>
		<th>tecnica</th>
		<th>material</th>
		<th>fecha creacion</th>
		<th>acciones</th>
	</tr>
	<?php foreach($productos as $p){ ?>
	<tr>
		<td><?php echo $p['Producto']['id']; ?></td>
		<td><?php echo $html->image('uploads/small/'.$p['Producto']['foto_delantera'], array('width' => 80)); ?></td>
		<td><?php echo $html->image('uploads/small/'.$p['Producto']['foto_trasera'], array('width' => 80)); ?></td>
		<td><?php echo $html->image('uploads/detail/'.$p['Producto']['foto_detalle'], array('width' => 50)); ?></td>
		<td><?php echo $p['Producto']['name']; ?></td>
		<td><?php echo $p['Producto']['descripcion']; ?></td>
		<td><?php echo $p['Tipo']['name']; ?></td>
		<td><?php echo $p['Tecnica']['name']; ?></td>
		<td><?php echo $p['Material']['name']; ?></td>
		<td><?php echo $p['Producto']['created']; ?></td>
		<td><?php echo $html->link('[editar]','editar_producto/'.$p['Producto']['id']); ?> <?php echo $html->link('[borrar]','borrar_producto/'.$p['Producto']['id']); ?></td>
	</tr>
	<?php } //endforeach ?>
</table>
<br/>

<?php //echo pr($productos); ?>
