<div class="products index">
	<h2><?php __('Productos');?></h2>
	<?php
	$i = 0;
	foreach ($products as $product):

		//si esta seteado el parametro named: "project_id:n"
		//entonces mostrar solo ese, en vez de project/view/n

		if( isset( $this->params['named']['project_id'] ) && ( $this->params['named']['project_id'] != $product['Project']['id'] ) )
			continue;

		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('Nombre', 'name');?></th>
			<th><?php echo $this->Paginator->sort('Proyecto', 'project_id');?></th>
			<th><?php echo $this->Paginator->sort('Tipo', 'type_id');?></th>
			<th class="actions"><?php __('Acciones');?></th>
	</tr>
	<tr<?php echo $class;?>>
		<td><?php echo $product['Product']['id']; ?>&nbsp;</td>
		<td><?php echo $product['Product']['name']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($product['Project']['id'], array('controller' => 'projects', 'action' => 'view', $product['Project']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($product['Type']['name'], array('controller' => 'types', 'action' => 'view', $product['Type']['id'])); ?>
		</td>
		<td class="actions">
			<?php
				echo $this->Html->link(
					__('Agregar Foto', true),
					array(
						'controller' => 'pictures',
						'action' => 'add',
						'product_id' => $product['Product']['id']
					)
				);
			?>
			<?php //echo $this->Html->link(__('Ver', true), array('action' => 'view', $product['Product']['id'])); ?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $product['Product']['id'])); ?>
			<?php echo $this->Html->link(__('Borrar', true), array('action' => 'delete', $product['Product']['id']), null, sprintf(__('Estas Seguro de querer borrar el producto #%s?\n(Esto borrará todas las fotos asociadas a él!)', true), $product['Product']['id'])); ?>
		</td>
	</tr>
	</table>
		<?php foreach($product['Picture'] as $picture): ?>
			<?php //debug($product['Picture']); ?>
			<?php
				echo $this->Html->image(
					DS.'files'.DS.'picture'.DS.'image'.DS.$picture['image_dir'].DS.'chica_'.$picture['image'],
					array(
						'url' => $html->url(
							array(
								'controller' => 'pictures',
								'action' => 'delete',
								$picture['id']
							),
							true
						)
						//'style' => 'width:30px;height:auto;'
						//'style' => 'float:right;'
					)
				);
			?>
			<?php
				echo $html->link(
					'[Borrar]',
					array(
						'controller' => 'pictures',
						'action' => 'delete',
						$picture['id']
					),
					null,
					'¿Seguro deseas borrar la foto '.$picture['id'].'?'
				);
			?>
			<br/>
		<?php endforeach; ?>
<?php endforeach; ?>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Página %page% de %pages%, mostrando %current% registros de %count% en total, comenzando con el registro %start% y terminando con el registro %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('Anterior', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('Siguiente', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<!--
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Product', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Projects', true), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project', true), array('controller' => 'projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Types', true), array('controller' => 'types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Type', true), array('controller' => 'types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pictures', true), array('controller' => 'pictures', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Picture', true), array('controller' => 'pictures', 'action' => 'add')); ?> </li>
	</ul>
</div>
-->
<?php echo $this->element('actions_menu'); ?>
