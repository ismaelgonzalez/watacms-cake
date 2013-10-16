<h4>Agregar Usuarios</h4>
<?php
echo $this->Form->create('User', array('type'=>'post'));
echo $this->Form->input('first_name', array('label' => 'Nombre'));
echo $this->Form->input('last_name', array('label' => 'Apellido'));
echo $this->Form->input('email', array('label' => 'Email'));
echo $this->Form->input('password', array('label' => 'Password'));
echo $this->Form->input('role', array(
	'label' => 'Rol',
	'options' => array(
		'admin' => 'Admin',
		'author' => 'Autor'
	),
	'empty' => array('-- Elija una opción --'),
));
echo $this->Form->submit('Enviar', array('formnovalidate' => true));
echo $this->Form->end();
?>