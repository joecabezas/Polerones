<div id="header">
	<h1>
		<?php echo $html->link(__('Polerones.com › ',true),array('controller'=> 'pages', 'action' => 'home', 'admin' => false, 'clientes' => false)); ?>
	</h1>
	
	<ul id="nav">
	
		<?php if($this->Session->read('Auth.User.id')): ?>
		
			<li class="ident">
				<?php echo $html->link('Usuario '.$this->Session->read('Auth.User.name'), array('controller' => 'users', 'action' => 'index', 'admin' => false, 'clientes' => false)); ?>
			</li>
			
			<?php if($this->Session->read('Auth.User.privileges') == 1): ?>
			<li class="clients">
				<?php echo $html->link(__('Zona Clientes',true),array('controller' => 'projects', 'action' => 'index', 'clientes' => true)); ?>
			</li>
			<?php endif; ?>
			
			<?php if($this->Session->read('Auth.User.privileges') == 0): ?>
			<li class="admin">
				<?php echo $html->link(__('Administración',true),array('controller' => 'projects', 'action' => 'index', 'admin' => true)); ?>
			</li>
			<?php endif; ?>
			
			<li class="logout">
				<?php echo $html->link(__('Salir',true),array('controller' => 'users', 'action' => 'logout', 'clientes' => false, 'admin' => false)); ?>
			</li>
		
		<?php endif; ?>
		
		<?php if(!$this->Session->read('Auth.User.id')): ?>
			<li class="login">
				<?php echo $html->link(__('Ingresar',true),array('controller' => 'users', 'action' => 'login')); ?>
			</li>
		<?php endif; ?>
		
	</ul>
</div>