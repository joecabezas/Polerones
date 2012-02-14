<!--HEADER-->
<header>
	<span id="logo_polerones"><a href="index.php">Polerones.com</a></span>
	<ul>
		<!-- categories -->
		<? if(isset($d['Categories'])): ?>
			<?php foreach($d['Categories'] as $c): ?>
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
			<a href="contacto">Contáctanos</a>
		</li>
		
		<!--
		<li id="bot_h_01"><a href="#;" title="Catálogo polerones">Catálogo polerones</a></li>
		<li id="bot_h_02"><a href="ropa_institucional.php" title="Ropa Institucional">Ropa Institucional</a></li>
		<li id="bot_h_03"><a href="contacto" title="Cotiza ahora !">Cotiza ahora !</a></li>
		<li id="bot_h_04"><a href="contacto" title="Contacto">Contacto</a></li>
		-->
	</ul>
</header>
<!--END HEADER-->
