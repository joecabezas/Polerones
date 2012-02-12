<!DOCTYPE HTML>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Polerones.com: Portada</title>
<link href="css/screen.css" rel="stylesheet" type="text/css" media="screen" />
<link href="css/print.css" rel="stylesheet" type="text/css" media="print" />
<script type="text/javascript" src="js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="js/jquery.jcarousel.min.js"></script>
<!--
<script type="text/javascript">
jQuery(document).ready(function() {
	$('#tips').jcarousel({
        vertical: false,
		wrap: 'circular',
        scroll: 1
    });
	
});
</script>-->
<meta name="keywords" content="" />
<meta name="description" content="" />

<!--[if lt IE 9]>
<script src="js/ie9.js"></script>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<![endif]-->

<!--[if IE 6]>
<script src="js/dd_belatedpng.js"></script>
<script>
DD_belatedPNG.fix('div,img,a,span,button,section,article,ul,li,p,h1,h2,h3,h4');
</script>
<![endif]-->

<!-- <?php //include php('include/inc_html5.tpl.html')?> -->

</head>
<body>
<!--HEADER-->
<header>
	<span id="logo_polerones"><a href="#;">Polerones.com</a></span>
	
	<!-- categories -->
	<? if(isset($d['Categories'])): ?>
		<?php foreach($d['Categories'] as $c): ?>
			<span id="">
				<?php echo $html->link(array('controller' => 'main', 'action' => 'categoria', $c['Category']['id']));?>
				<?php echo $c['Category']['name']; ?>
			</span>
		<?php endforeach; ?>
	<?php endif; ?>
</header>
<!--END HEADER-->

<?php echo $content_for_layout; ?>

<!--FOOTER-->
<footer>
	<address>Avda Matta 372<br>2do piso</address>
    <span class="fono_cel">9 159 3999<br>8 636 2885</span>
    <span class="fono_fijo">02- 9960069</span>
</footer>
<!--END FOOTER-->

</body>
</html>
