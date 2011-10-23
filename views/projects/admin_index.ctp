<div class="projects index">
	<h2><?php __('Proyectos');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('#productos','product_count');?></th>
			<th><?php echo $this->Paginator->sort('Inicio', 'start');?></th>
			<th><?php echo $this->Paginator->sort('Fin', 'end');?></th>
			<th><?php echo $this->Paginator->sort('Institucion', 'institution_id');?></th>
			<th><?php echo $this->Paginator->sort('Estado', 'status_id');?></th>
			<th><?php echo $this->Paginator->sort('Categoría', 'category_id');?></th>
			<th class="actions"><?php __('Acciones');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($projects as $project):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><span class="tag"><?php echo $project['Project']['id']; ?>&nbsp;</span></td>
		<td><span class="count"><?php echo $project['Project']['product_count']; ?>&nbsp;</span></td>
		<td><?php echo $project['Project']['start']; ?>&nbsp;</td>
		<td><?php echo $project['Project']['end']; ?>&nbsp;</td>
		<td>
			<?php //echo $this->Html->link($project['Institution']['name'], array('controller' => 'institutions', 'action' => 'view', $project['Institution']['id'])); ?>
			<?php echo $project['Institution']['name']; ?>
		</td>
		<td style="width:120px;">
			<?php //echo $this->Html->link($project['Status']['name'], array('controller' => 'statuses', 'action' => 'view', $project['Status']['id'])); ?>
			<?php
				$status_class = 'pending';
				if( $project['Status']['name'] == 'Terminado' )
					$status_class = 'finished';
			?>
			<span class="<?php echo $status_class; ?>"><?php echo $project['Status']['name']; ?></span>
		</td>
		<td>
			<?php //echo $this->Html->link($project['Category']['name'], array('controller' => 'categories', 'action' => 'view', $project['Category']['id'])); ?>
			<?php echo $project['Category']['name']; ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Agregar Producto', true), array('controller' => 'products', 'action' => 'add', 'project_id' => $project['Project']['id'])); ?>
			<?php
				echo $this->Html->link(
					__('Ver', true),
					array(
						'controller' => 'products',
						'action' => 'index',
						'project_id' => $project['Project']['id']
					)
				);
			?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $project['Project']['id'])); ?>
			<?php echo $this->Html->link(__('Borrar', true), array('action' => 'delete', $project['Project']['id']), null, sprintf(__('Seguro desea borrar el proyecto #%s?\n(Esto borrará todos los productos e imágenes que tenga!)', true), $project['Project']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
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
<?php echo $this->element('actions_menu'); ?>
