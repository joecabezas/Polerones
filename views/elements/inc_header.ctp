<!--HEADER-->
<header>
	<span id="logo_polerones"><?php echo $html->link('Polerones.com', '/') ?></span>
	<ul>
		<!-- categories -->
		<? if(isset($top_menu)): ?>
			<?php foreach($top_menu as $c): ?>
				<li class="topmenu">
					<?php
						echo $html->link(
							$c['Category']['name'],
							array(
								'controller' => 'main',
								'action' => 'categoria',
								$c['Category']['id']
							)
						);
					?>
				</li>
			<?php endforeach; ?>
		<?php endif; ?>
		
		<li class="topmenu activo">
			<?php echo $html->link('Contáctanos', '/contacto') ?>
		</li>
		
		<!--
		<li id="bot_h_01"><a href="#;" title="Catálogo polerones">Catálogo polerones</a></li>
		<li id="bot_h_02"><a href="ropa_institucional.php" title="Ropa Institucional">Ropa Institucional</a></li>
		<li id="bot_h_03"><a href="contacto" title="Cotiza ahora !">Cotiza ahora !</a></li>
		<li id="bot_h_04"><?php echo $html->link('Contáctanos', '/contacto') ?></li>
		-->
	</ul>
</header>
<!--END HEADER-->
