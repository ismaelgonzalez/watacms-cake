<h3>Editar Album</h3>
<?php
echo $this->Form->create('Album', array('type'=>'post'));
echo $this->Form->input('id', array('value' => $album['Album']['id']));
echo $this->Form->input('section_id', array(
	'label' => 'Secci&oacute;n',
	'options' => array(
		$sections
	),
	'default' => $album['Section']['id'],
));
echo $this->Form->input('name', array(
	'label' => 'Nombre',
	'default' => $album['Album']['name']
));
echo $this->Form->input('published_date', array(
    'label' => 'Fecha de Publicaci&oacute;n',
    'default' => $album['Album']['published_date'],
));
echo $this->Form->input('published_time', array(
    'label' => 'Hora de Publicaci&oacute;n',
    'default' => $album['Album']['published_time'],
));
echo $this->Form->submit('Enviar', array('formnovalidate' => true));
echo $this->Form->end();

?>