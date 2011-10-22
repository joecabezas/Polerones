<p>Estimado administrador <?php echo $data['to']['name'] ?>,</p>
 
<p>Hay una nueva cotizacion, con ello, se ha creado un nuevo proyecto</p>

<p>Para responder inmediatamente ingrese a: <?php echo $html->link($html->url(array('controller' => 'projects', 'action' => 'conversacion', $data['config']['thread_id'], 'admin' => true), true));?></p>

<p>Para ver una lista con sus proyectos ingrese a: <?php echo $html->link($html->url('/admin', true));?></p>
<p></p>


Cariños<br/><br/>

- Robot polerones.com -
