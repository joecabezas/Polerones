<?php debug($data) ?>
Buen día <?php echo $data['to']['name'] ?>,
 
Hemos respondido tu mensaje, y puedes ver la respuesta en el siguiente link:

<?php echo $html->link($html->url(array('controller' => 'projects', 'action' => 'conversacion', $data['to']['sufix'], 'clientes' => true), true));?>

<?php if($data['to']['hash']){ ?>
<!--siempre podras acceder a tu proyecto en polerones.com usando este link, pero para mayor seguridad, te recomendamos crear una clave-->
<?php } else { ?>
Para ver una lista con sus proyectos ingrese a: <?php echo $html->link($html->url('/admin', true));?>
<? } //endif ?>

Cariños

- Robot polerones.com -
