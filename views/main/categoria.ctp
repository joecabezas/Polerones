		<section id="contenidos">
			<h1 id="ico_ropa">Catálogo | <?php echo $d['Category']['name']; ?></h1>

			<?php //debug($d['Products']); ?>
			
			<!--DIV ROPA-->
			<div id="ropa">

				<?php $counter = 0; ?>
				
				<!-- Por cada 2 productos -->
				<?php foreach($d['Products'] as $product): ?>

					<?php if($counter % 2 == 0): ?>
						<!--FILA-->
						<div class="fila">
					<?php endif; ?>
					
						<div class="columna">
							<div class="tabs">
								<ul>
									<!--Imprimir imágenes chicas-->
									<?php foreach($product['Picture'] as $picture): ?>
									<?php
										$img_url_chica = DS.'files'.DS.'picture'.DS.'image'.DS.$picture['image_dir'].DS.'chica_'.$picture['image'];
										$img_url_grande = DS.'files'.DS.'picture'.DS.'image'.DS.$picture['image_dir'].DS.'grande_'.$picture['image'];
									?>
									<li>
										<?php
											echo $html->image(
												$img_url_chica,
												array(
													'width' => 60,
													'height' => 45,
													'url' => $img_url_grande
												)
											);
										?>
									</li>

									<?php endforeach; ?>
									<!--<li><a href="#;"><img src="images/fotos_banners/img_ropa_01_ch.jpg" class="activo" width="60" height="45" alt="Foto" title="Foto"></a></li>-->
								</ul>
							</div>
							<h2>
								<strong>Nombre:</strong>
								<?php echo $product['Product']['name']; ?><br>
								<strong>Tipo:</strong>
								<?php echo $product['Type']['name']; ?>
							</h2>
							<p>
								<!--<img src="images/fotos_banners/img_ropa_01.jpg" width="318" height="218" alt="Foto" title="Foto">-->
								<?php if(!empty($product['Picture'])): ?>
									<?php
										$img_url_mediana = DS.'files'.DS.'picture'.DS.'image'.DS.$product['Picture'][0]['image_dir'].DS.'mediana_'.$product['Picture'][0]['image'];
										$img_url_grande = DS.'files'.DS.'picture'.DS.'image'.DS.$product['Picture'][0]['image_dir'].DS.'grande_'.$product['Picture'][0]['image'];
									?>
									<?php
											echo $html->image(
												$img_url_mediana,
												array(
													'width' => 318,
													'height' => 218,
													'url' => $img_url_grande
												)
											);
										?>
								
								<?php endif; ?>
							</p>
						</div>
					
					<?php if($counter % 2 != 0): ?>
						</div>
						<!--END FILA-->
					<?php endif; ?>
					
					<?php $counter++; ?>
					
				<?php endforeach; ?>
			</div>
		</section>
