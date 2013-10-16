<h4>Editar Usuarios</h4>
<ul class="nav nav-tabs">
	<li class="active"><a href="#info" data-toggle="tab">Información General</a></li>
	<li><a href="#password" data-toggle="tab">Cambiar Contraseña</a></li>
</ul>
<div class="tab-content">
<?php
echo "<div id='info' class='tab-pane active'>";
echo $this->Form->create('User', array('type'=>'post'));
echo $this->Form->input('id', array('default' => $user['User']['id']));
echo $this->Form->input('first_name', array('label' => 'Nombre', 'default' => $user['User']['first_name']));
echo $this->Form->input('last_name', array('label' => 'Apellido', 'default' => $user['User']['last_name']));
echo $this->Form->input('email', array('label' => 'Email', 'default' => $user['User']['email']));
echo $this->Form->input('role', array(
	'label' => 'Rol',
	'options' => array(
		'admin' => 'Admin',
		'author' => 'Autor'
	),
	'empty' => array('-- Elija una opción --'),
	'default' => $user['User']['role']
));
echo $this->Form->submit('Enviar', array('formnovalidate' => true));
echo $this->Form->end();
echo "</div>";

echo "<div id='password' class='tab-pane'>";
echo $this->Form->create('User', array('type'=>'post'));
echo $this->Form->input('id', array('default' => $user['User']['id']));
echo $this->Form->input('password', array('label' => 'Contraseña'));
echo $this->Form->input('repass', array('label' => 'Confirmar Contraseña', 'type' => 'password'));
echo $this->Form->submit('Enviar', array('formnovalidate' => true));
echo $this->Form->end();
echo "</div>";
?>
</div>
<script>
	$(function(){
		$("#info a").click(function (e) {
			e.preventDefault();
			$(this).tab('show');
			$('#password').parent().removeClass('active');
			$(this).parent().addClass('active');
		});
		$("#password a").click(function (e) {
			e.preventDefault();
			$(this).tab('show');
			$('#info').parent().removeClass('active');
			$(this).parent().addClass('active');
		});
	});
</script>