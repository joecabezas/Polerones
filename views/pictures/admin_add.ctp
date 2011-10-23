<div class="pictures form">
<?php echo $this->Form->create('Picture', array('type' => 'file'));?>
	<fieldset>
 		<legend><?php __('Admin Add Picture'); ?></legend>
	<?php
		echo $this->Form->input('image', array('type' => 'file'));
		echo $this->Form->input('image_dir', array('type' => 'hidden'));

		if( isset( $this->params['named']['product_id'] ) ){
			echo $this->Form->input(
				'product_id',
				array(
					'type' => 'hidden',
					'value' => $this->params['named']['product_id']
				)
			);
		} else {
			echo $this->Form->input('product_id');
		}
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Pictures', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Products', true), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product', true), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
