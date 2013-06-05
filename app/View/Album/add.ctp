<h3>Agregar un Album</h3>
<?php
echo $this->Form->create('Album', array('type'=>'post'));
echo $this->Form->input('section_id', array(
	'label' => 'Secci&oacute;n',
	'options' => array(
		$sections
	),
	'empty' => array(0 => '-- Elige una sección --'),
));
echo $this->Form->input('name', array('label' => 'Nombre'));
echo $this->Form->submit('Enviar', array('formnovalidate' => true));
echo $this->Form->end();

?>