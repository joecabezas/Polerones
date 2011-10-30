		<section id="big-banner" class="col_8 col">
			<?php echo $html->image('bann_01.png', array('alt' => '', 'width' => '450', 'height' => '345', 'url' => array('#'))); ?>
		</section>

		<section id="news-works" class="col_8 col">
			<div class="header-box">
				<h1>Últimos trabajos </h1>
				<span><a href="#">ver más</a></span>
			</div>

			<ul id="design" class="left">
				<?php foreach($d['Pictures'] as $picture): ?>
				<?php $img_url = DS.'files'.DS.'picture'.DS.'image'.DS.$picture['image_dir'].DS.'chica_'.$picture['image']; ?>
				<li class=""><a href="#"><?php echo $html->image($img_url); ?></a></li>
				<?php endforeach; ?>
			</ul>
		</section>
