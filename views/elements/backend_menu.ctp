<div id="menu" class="user">
	<ul>
		<li><?php echo $html->link(__('Mis Datos',true),array('controller' => 'users', 'action' => 'index')); ?></li>
		<li><?php echo $html->link(__('Modificar Datos',true),array('controller' => 'users', 'action' => 'edit')); ?></li>
	</ul>
</div>