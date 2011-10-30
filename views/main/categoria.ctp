		<?php echo $html->css('catalogo', null, array('inline' => false)); ?>
		<section id="news-works" class="col_16 col">
			<div class="header-box">
				<h1>Catálogo | <?php echo $d['Category']['name']; ?></h1>
			</div>

			<?php //debug($d['Products']); ?>
			<div class="catalogo">
				</br></br>

				<!-- Por cada producto -->
				<?php foreach($d['Products'] as $product): ?>

				<div class="producto">

					<!-- Imprimir datos -->
					<ul>
						<li>nombre: <?php echo $product['Product']['name']; ?></li>
						<li>tipo: <?php echo $product['Type']['name']; ?></li>
					</ul>

					<!--Imprimir imágenes -->
					<!--Por cada imágen -->
					<?php foreach($product['Picture'] as $picture): ?>
					<?php
						$img_url_chica = DS.'files'.DS.'picture'.DS.'image'.DS.$picture['image_dir'].DS.'chica_'.$picture['image'];
						$img_url_grande = DS.'files'.DS.'picture'.DS.'image'.DS.$picture['image_dir'].DS.'grande_'.$picture['image'];
					?>
					<?php echo $html->image($img_url_chica, array('class' => 'imagen_chica')); ?>

					<?php endforeach; ?>

				</div>

				<?php endforeach; ?>
			</div>
		</section>
