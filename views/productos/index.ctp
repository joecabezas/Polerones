<div class="productos index">
<h2><?php __('Productos');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('descripcion');?></th>
	<th><?php echo $paginator->sort('foto_delantera');?></th>
	<th><?php echo $paginator->sort('foto_trasera');?></th>
	<th><?php echo $paginator->sort('foto_detalle');?></th>
	<th><?php echo $paginator->sort('tipo_id');?></th>
	<th><?php echo $paginator->sort('tecnica_id');?></th>
	<th><?php echo $paginator->sort('material_id');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($productos as $producto):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $producto['Producto']['id']; ?>
		</td>
		<td>
			<?php echo $producto['Producto']['name']; ?>
		</td>
		<td>
			<?php echo $producto['Producto']['descripcion']; ?>
		</td>
		<td>
			<?php echo $producto['Producto']['foto_delantera']; ?>
		</td>
		<td>
			<?php echo $producto['Producto']['foto_trasera']; ?>
		</td>
		<td>
			<?php echo $producto['Producto']['foto_detalle']; ?>
		</td>
		<td>
			<?php echo $html->link($producto['Tipo']['name'], array('controller'=> 'tipos', 'action'=>'view', $producto['Tipo']['id'])); ?>
		</td>
		<td>
			<?php echo $html->link($producto['Tecnica']['name'], array('controller'=> 'tecnicas', 'action'=>'view', $producto['Tecnica']['id'])); ?>
		</td>
		<td>
			<?php echo $html->link($producto['Material']['name'], array('controller'=> 'materiales', 'action'=>'view', $producto['Material']['id'])); ?>
		</td>
		<td>
			<?php echo $producto['Producto']['created']; ?>
		</td>
		<td>
			<?php echo $producto['Producto']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $producto['Producto']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $producto['Producto']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $producto['Producto']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $producto['Producto']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Producto', true), array('action'=>'add')); ?></li>
		<li><?php echo $html->link(__('List Tipos', true), array('controller'=> 'tipos', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Tipo', true), array('controller'=> 'tipos', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Tecnicas', true), array('controller'=> 'tecnicas', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Tecnica', true), array('controller'=> 'tecnicas', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Materiales', true), array('controller'=> 'materiales', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Material', true), array('controller'=> 'materiales', 'action'=>'add')); ?> </li>
	</ul>
</div>
