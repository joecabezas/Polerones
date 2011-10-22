<?php $config = Configure::read('Joe'); ?>
<?php foreach($productos as $p){ ?>
<PRODUCTO

	titulo ="<?php echo $p['Producto']['name']; ?>" 

	material = "<?php echo $p['Material']['name']; ?>" 
	tallas="S M L XL"
	
	comentario= "<?php echo $p['Producto']['descripcion']; ?>"
	tecnica= "<?php echo $p['Tecnica']['name']; ?>"

	imagenfront_chica=  "<?php echo $config['root']; ?>img/uploads/small/<?php echo $p['Producto']['foto_delantera']; ?>"
	imagenfront_grande= "<?php echo $config['root']; ?>img/uploads/big/<?php echo $p['Producto']['foto_delantera']; ?>"

	imagenback_chica=   "<?php echo $config['root']; ?>img/uploads/small/<?php echo $p['Producto']['foto_trasera']; ?>"
	imagenback_grande=  "<?php echo $config['root']; ?>img/uploads/big/<?php echo $p['Producto']['foto_trasera']; ?>"
	
	<?php if($p['Producto']['foto_detalle']) { ?>
	imagen_detail=      "<?php echo $config['root']; ?>img/uploads/detail/<?php echo $p['Producto']['foto_detalle']; ?>"
	<?php } //endif ?>
/>
<?php } //endforeach ?>
