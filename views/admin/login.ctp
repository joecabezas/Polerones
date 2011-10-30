<?php
    if  ($session->check('Message.auth')) $session->flash('auth');
    echo $form->create('Admin', array('url' => array('controller' => 'admin', 'action' => 'login')));
    echo $form->input('name');
    echo $form->input('password');
    echo $form->end('Login');
?>
<br/>
<?php //echo pr($p); ?>
