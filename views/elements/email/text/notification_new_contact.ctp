Estimado administrador <?php echo $data['to']['name'] ?>,
 
Hay una nueva cotizacion, con ello, se ha creado un nuevo proyecto

Para responder inmediatamente ingrese a: <?php echo $html->link($html->url(array('controller' => 'projects', 'action' => 'conversacion', $data['config']['thread_id'], 'admin' => true), true));?>

Para ver una lista con sus proyectos ingrese a: <?php echo $html->link($html->url('/admin', true));?>


Cariños

- Robot polerones.com -
