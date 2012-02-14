<!DOCTYPE HTML>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Polerones.com: Portada</title>
<link href="css/screen.css" rel="stylesheet" type="text/css" media="screen" />
<link href="css/print.css" rel="stylesheet" type="text/css" media="print" />
<script type="text/javascript" src="js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="js/jquery.filestyle.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("input[type=file]").filestyle({ 
		image: "img/botones/bot_seleccionar_archivo.png",
		imageheight : 38,
		imagewidth : 169,
		width : 185
	});
});
</script>
<meta name="keywords" content="" />
<meta name="description" content="" />
	<?php echo $this->element('inc_html5'); ?>
</head>
<body>
	<?php echo $this->element('inc_header'); ?>

<!--FONOS-->
<div id="cont_fonos_header">
	<?php echo $this->element('inc_fonos'); ?>
</div>
<!--END FONOS-->

<!--MAIN: FONDO PARA CONTENIDOS-->
<div id="main">
	<section id="contenidos">
		
	<?php echo $content_for_layout; ?>
		
	</section>
	<!--END CONTENIDOS-->
</div>
<!--END DIV MAIN-->

</body>
</html>
