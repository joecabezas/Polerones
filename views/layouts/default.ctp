<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset=utf-8>
	<title>Polerones.com | <?php echo $title_for_layout?></title>

	<?php
	//echo $html->charset();
	echo $html->meta('favicon.ico', '/favicon.ico', array('type' => 'icon'));
	//echo $html->css('cake.generic');
	echo $html->css('reset');
	echo $html->css('general');
	echo $html->css('grid');
	echo $html->css('polerones');

	//scripts personalizadas
	echo $scripts_for_layout;
	?>

	<script src="html5.js"></script>

</head>
<body>
	<header>
		<?php $session->flash(); ?>
		<div class="wrap">
			<nav id="top">
				<ul>
					<li></li>
				</ul>
			</nav>
		</div>
		<div class="wrap">
			<div id="logo">
				<h1><?php echo $html->image('polerones.jpg', array('alt' => 'Polerones.com', 'width' => '216', 'height' => '97', 'url' => array('controller' => 'main', 'action' => 'index'))); ?></h1>
			</div>

			<nav id="menu">
				<ul>
					<li class="soon"><a href="#">Crea tu<br/> Polera<br/><small>pronto</small></a></li>
					<li><a href="<?php echo $html->url(array('controller' => 'main', 'action' => 'categoria', 1)); ?>">Catálogo<br/> Polerones</a></li>
					<li><a href="<?php echo $html->url(array('controller' => 'main', 'action' => 'categoria', 2)); ?>">Ropa<br/>Institucional</a></li>
					<li><a href="#">Cotiza<br/> Ahora!</a></li>
				</ul>
			</nav>
		</div>
	</header>


	<section id="center" class="home">
		<div class="wrap">
			<?php echo $this->Session->flash(); ?>
			
			<?php echo $content_for_layout; ?>

		</div>
	</section>


	<footer>
		<div class="wrap">
			<article class="col_4 col">
				<span>
					<h2>Polerones / Generación</h2>
					<?php echo $html->image('design_generation.png', array('alt' => '', 'width' => '178', 'height' => '101')); ?>
					<p>En polerones.com podemos hacer el poleron de tu curso al gusto y a la medida del curso, contamos con mas de 8 años de eperiencia haciendo ropa de la mejor calidad. La calidad de todos nuestros productos son garantizados!</p>
				</span>
			</article>

			<article class="col_4 col">
				<span>
					<h2>Estampados</h2>
					<?php echo $html->image('bordado.png', array('alt' => '', 'width' => '194', 'height' => '103')); ?>
					<p>Contamos con máquinas propias y profesionales para diseñar y bordar tu pedido, (...). Para más información <a href="#">click aquí</a>.</p>
				</span>
			</article>

			<article class="col_4 col">
				<span>
					<h2>Cotiza Ahora</h2>
					<!-- Una imagen aca por favor -->
					<p>¿Tienes consultas?, ¿Quieres pedir una cotizacion?, envíanos tus consutas acá</p>
					<p>Para más información <a href="#">click aquí</a>.</p>
				</span>
			</article>

			<div id="credit" class="col_4 col">
				<span class="creditos">
					© 2011 Polerones.com<br/>
					Design by <a href="http://zouppowered.com"  title="Zoup Powered">Zoup Powered</a>
				</span>
			</div>

		</div>
	</footer>

	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
