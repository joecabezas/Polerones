<p>Estimado administrador <?php echo $data['to']['name'] ?>,</p>

<p>Ha llegado un nuevo mensaje a traves de www.polerones.com</p>
<p>Los datos del mensaje son los siguientes:<p>

<ul>
	<li>Nombre: <?php echo $data['from']['name']; ?></li>
	<li>Email: <?php echo $data['from']['mail']; ?></li>
	<li>Teléfono: <?php echo $data['from']['phone']; ?></li>
	<li>Comuna: <?php echo $data['from']['comuna']; ?></li>
	<li>Mensaje: <?php echo $data['from']['content']; ?></li>
</ul>

Cariños<br/>
- Robot polerones.com -
