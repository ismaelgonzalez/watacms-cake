<h4>Editar Secci&oacute;n</h4>
<?php
echo $this->Form->create('Section', array('type'=>'post'));
echo $this->Form->input('id', array('value' => $section['Section']['id']));
echo $this->Form->input('sub_id', array(
	'label' => 'Secci&oacute;n Principal',
	'options' => array(
		$parents
	),
	'empty' => array(0 => '-- Elige una sección padre --'),
	'default' => $section['Section']['sub_id'],
));
echo $this->Form->input('name', array(
	'label' => 'Nombre',
	'default' => $section['Section']['name']
));
echo $this->Form->submit('Enviar', array('formnovalidate' => true));
echo $this->Form->end();

?>