<div class="actions">
	<h3><?php __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nuevo Proyecto', true), array('action' => 'add')); ?></li>
	</ul>
	<h3><?php __('Extras'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Ver Instituciones', true), array('controller' => 'institutions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Institución', true), array('controller' => 'institutions', 'action' => 'add')); ?> </li>
		</br>
		<li><?php echo $this->Html->link(__('Ver Estados', true), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Estado', true), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
		</br>
		<li><?php echo $this->Html->link(__('Ver Categorías', true), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Categoría', true), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		</br>
		<li><?php echo $this->Html->link(__('Ver Productos', true), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Producto', true), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
