<div class="pictures form">
<?php echo $this->Form->create('Picture');?>
	<fieldset>
 		<legend><?php __('Admin Edit Picture'); ?></legend>
	<?php
		echo $this->Form->input('id');

		echo $this->Form->input('image', array('type' => 'file'));
		echo $this->Form->input('image_dir', array('type' => 'hidden'));

		echo $this->Form->input('product_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar', true));?>
</div>
<!--
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Picture.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Picture.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Pictures', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Products', true), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product', true), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
-->
<?php echo $this->element('actions_menu'); ?>
