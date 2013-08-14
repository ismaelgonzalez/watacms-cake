<h4>Agregar Secci&oacute;n</h4>
<?php
echo $this->Form->create('Section', array('type'=>'post'));
echo $this->Form->input('sub_id', array(
	'label' => 'Secci&oacute;n Principal',
	'options' => array(
		$parents
	),
	'empty' => array(0 => '-- Elige una sección padre --'),
));
echo $this->Form->input('name', array('label' => 'Nombre'));
echo $this->Form->submit('Enviar', array('formnovalidate' => true));
echo $this->Form->end();

?>