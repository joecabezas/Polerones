<!DOCTYPE html>
<html lang="en">
<head>
	<title>Polerones.com | <?php echo $title_for_layout?></title>

	<meta charset=utf-8>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	
	<?php
		//echo $html->charset();
		echo $html->meta('favicon.ico', '/favicon.ico', array('type' => 'icon'));
		//echo $html->css('cake.generic');
		echo $html->css('style');
		//echo $html->css('reset');
		//echo $html->css('general');
		//echo $html->css('grid');
		//echo $html->css('polerones');

		echo $html->script('modernizr-2.0.6.min');
		
		//scripts personalizadas
		echo $scripts_for_layout;
	?>
	
</head>
<body>
	<div id="container">
    <header>
    </header>
    
	<?php echo $content_for_layout; ?>
	
    <footer>
    </footer>
  </div> <!--! end of #container -->


  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.6.2.min.js"><\/script>')</script>


  <!-- scripts concatenated and minified via ant build script-->
  <script defer src="js/plugins.js"></script>
  <script defer src="js/script.js"></script>
  <!-- end scripts-->


  <script> // Change UA-XXXXX-X to be your site's ID
    window._gaq = [['_setAccount','UAXXXXXXXX1'],['_trackPageview'],['_trackPageLoadTime']];
    Modernizr.load({
      load: ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js'
    });
  </script>


  <!--[if lt IE 7 ]>
    <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
  <![endif]-->
  
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>