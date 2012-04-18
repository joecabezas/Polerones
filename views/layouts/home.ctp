<!DOCTYPE HTML>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Polerones.com: Portada</title>
<link href="css/screen.css" rel="stylesheet" type="text/css" media="screen" />
<link href="css/print.css" rel="stylesheet" type="text/css" media="print" />
<script type="text/javascript" src="js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="js/jquery.jcarousel.min.js"></script>

<!-- Google Analytics -->
<script type="text/javascript">

	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-346430-1']);
	_gaq.push(['_setDomainName', 'polerones.com']);
	_gaq.push(['_setAllowLinker', true]);
	_gaq.push(['_trackPageview']);

	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();

</script>

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

<?php echo $this->element('inc_html5'); ?>

</head>
<body>

<?php echo $this->element('inc_header'); ?>

<!--FONOS-->
<div id="cont_fonos_header">

<?php echo $this->element('inc_fonos'); ?>

</div>
<!--END FONOS-->

<!--BANNER HOME-->
<div id="banner_home">
	<ul>
		<li id="banner_home_01">
			<p>En Polerones.com imprimimos tus recuerdos, inmortalizándolos para simpre.<br/><br/>Cotiza hoy con nosotros y ten tu polerón antes de fin de año.</p>
			<a href="<?php echo $html->url('/contacto') ?>">
				<button title="Cotizar" type="button">Cotizar</button>
			</a>
		</li>
	</ul>
</div>
<!--END BANNER HOME-->

<!--MAIN: FONDO PARA CONTENIDOS-->
<div id="main" class="home">
    <section id="contenidos">
        
        <!--TIPS-->
        <div id="tips">
            <ul>
                <li class="tips_01">
                    <h2>Envíanos tu diseño</h2>
                    <div class="imagen"><img src="img/html/img_envianos.gif" width="57" height="104" align="Envíanos tu diseño" title="Envíanos tu diseño"></div>
                    <p>Envíanos tu diseño o solicita nuestra asesoría, tenemos una carta de 60 colores para elegir . revisa nuestro catálogo, hacemos despachos a regiones.</p>
                </li>
                <li class="tips_02">
                    <h2>Recibe nuestra cotización</h2>
                    <div class="imagen"><img src="img/html/img_recibe.gif" width="57" height="104" align="Recibe nuestra cotización" title="Recibe nuestra cotización"></div>
                    <p>Solicita tu cotización y descuento por cantidades sobre 30 polerones te regalamos uno.</p>
                </li>
                <li class="tips_03">
                    <h2>Creamos tus polerones</h2>
                    <div class="imagen"><img src="img/html/img_creamos.gif" width="170" height="115" align="Recibe nuestra cotización" title="Recibe nuestra cotización"></div>
                    <p>Podemos hacer el polerón de tu Curso, Empresa o  Grupo al gusto y medida de cada uno, contamos con 10 años de experiencia fabricando ropa deportiva para colegios, Nuestros  trabajos son garantizados en un 100%, ello nos obliga a usar materiales de la mejor calidad.</p>
                </li>
                <li class="tips_04">
                    <h2>Visitamos tu colegio sin compromiso</h2>
                    <div class="imagen"><img src="img/html/img_creamos.gif" width="170" height="115" align="Recibe nuestra cotización" title="Recibe nuestra cotización"></div>
                    <p> Podemos ir a tu Curso o Empresa y  llevarte la carta de colores,  las  muestras  y tallas para que prueben  la de cada uno y además vean la  calidad de nuestros productos en  cuanto a confección y variedad de  telas. Solicita  tu cotización. </p>
                </li>
                <!--CARRUSEL
                <li class="tips_04" style="display: none;">
                    <h2>Visitamos tu colegio sin compromiso</h2>
                    <div class="imagen"><img src="img/html/img_creamos.gif" width="170" height="115" align="Recibe nuestra cotización" title="Recibe nuestra cotización"></div>
                    <p> Podemos ir a tu Curso o Empresa y  llevarte la carta de colores,  las  muestras  y tallas para que prueben  la de cada uno y además vean la  calidad de nuestros productos en  cuanto a confección y variedad de  telas. Solicita  tu cotización. </p>
                </li>-->
            </ul>
        </div>
        <!--TIPS-->
        
        <!--OTROS SERVICIOS-->
        <section id="otros_servicios">
            <h2>Otros Servicios</h2>
            
            <article id="servicios_col01">
                <div class="imagen"><img src="img/fotos_banners/img_otros_servicios_01.jpg" width="444" height="260" alt="Otros servicios" title="Otros servicios"></div>
                <div class="contenido">
                    <p><img src="img/fotos_banners/img_otros_servicios_detalle.jpg" width="134" height="67" alt="detalle" title="detalle">Contamos con máquinas bordadoras industriales de ultima generación , matriceria propia. Ofrecemos el servicio de bordado para todo tipo de tela , ropa corporativa , colegios , comerciantes ,confeccionistas , empresas, particulares, etc.</p>
                </div>
            </article>
            
            <article id="servicios_col02">
                <div class="imagen"><img src="img/fotos_banners/img_otros_servicios_02.jpg" width="444" height="260" alt="Otros servicios" title="Otros servicios"></div>
                <div class="contenido">
                    <p>Confección y venta de  ropa corporativa  para Empresas, Colegios,  Grupos, Eventos, etc. Contamos con máquinas propias y profesionales para diseñar y bordar tu pedido, (...). Para más información click aquí.</p>
                </div>
            </article>
        </section>
        <!--END OTROS SERVICIOS-->
    </section>
    <!--END CONTENIDOS-->

</div>
<!--END DIV MAIN-->

</body>
</html>
