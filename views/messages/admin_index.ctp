<div class="messages index">
	<h2><?php __('Mensajes');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('ID', 'id');?></th>
			<th><?php echo $this->Paginator->sort('Nombre', 'name');?></th>
			<th><?php echo $this->Paginator->sort('Email', 'mail');?></th>
			<th><?php echo $this->Paginator->sort('Teléfono', 'phone');?></th>
			<th><?php echo $this->Paginator->sort('Comuna', 'comuna');?></th>
			<th><?php echo $this->Paginator->sort('Mensaje', 'content');?></th>
			<th><?php echo $this->Paginator->sort('Archivo', 'file');?></th>
			<th><?php echo $this->Paginator->sort('Tipo', 'file_type');?></th>
			<th><?php echo $this->Paginator->sort('Tamaño', 'file_size');?></th>
			<th><?php echo $this->Paginator->sort('Fecha Envío', 'created');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($messages as $message):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $message['Message']['id']; ?>&nbsp;</td>
		<td><?php echo $message['Message']['name']; ?>&nbsp;</td>
		<td><?php echo $message['Message']['mail']; ?>&nbsp;</td>
		<td><?php echo $message['Message']['phone']; ?>&nbsp;</td>
		<td><?php echo $message['Message']['comuna']; ?>&nbsp;</td>
		<td><?php echo substr($message['Message']['content'],0,5).'...'; ?>&nbsp;</td>
		<td>
		<?php
			echo $html->link($message['Message']['file'], DS.'files'.DS.'message'.DS.'file'.DS.$message['Message']['file_dir'].DS.$message['Message']['file']);
		?>
		&nbsp;
		</td>
		<td><?php echo $message['Message']['file_type']; ?>&nbsp;</td>
		<td><?php echo round($message['Message']['file_size']/(1024*1024), 3).' MB'; ?>&nbsp;</td>
		<td><?php echo $message['Message']['created']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $message['Message']['id'])); ?>
			<?php echo $this->Html->link(__('Borrar', true), array('action' => 'delete', $message['Message']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $message['Message']['id'])); ?>
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
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<?php echo $this->element('actions_menu'); ?>
