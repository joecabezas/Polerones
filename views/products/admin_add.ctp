<div class="products form">
<?php echo $this->Form->create('Product');?>
	<fieldset>
 		<legend><?php __('Agregar Producto'); ?></legend>
	<?php
		echo $this->Form->input('name', array('label' => 'Nombre'));

		if( isset( $this->params['named']['project_id'] ) ){
			echo $this->Form->input(
				'project_id',
				array(
					'type' => 'hidden',
					'value' => $this->params['named']['project_id'],
					'label' => 'Proyecto al que pertenece este producto:'
				)
			);
		} else {
			echo $this->Form->input('project_id', array('label' => 'Proyecto al que pertenece este producto:'));
		}

		echo $this->Form->input('type_id', array('label' => 'Tipo'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar', true));?>
</div>
<!--
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Products', true), array('action' => 'index'));?></li>
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
