<h4>Agregar un Album</h4>
<?php
echo $this->Form->create('Album', array('type'=>'post'));
echo $this->Form->input('section_id', array(
	'label' => 'Secci&oacute;n',
	'options' => array(
		$sections
	),
	'empty' => array('-- Elige una sección --'),
));
echo $this->Form->input('name', array('label' => 'Nombre'));
echo $this->Form->input('published_date', array(
	'type' => 'text',
	'label' => 'Fecha de Publicaci&oacute;n',
));

$time = $this->Timeoptions->getTimeOptions();

echo $this->Form->input('published_time', array(
	'label' => 'Hora de Publicaci&oacute;n',
	'type' => 'select',
	'options' => array(
		$time,
	),
	'empty' => array(0 => '-- Publicar Ahora --'),
));

echo $this->Form->submit('Enviar', array('formnovalidate' => true));
echo $this->Form->end();

?>
<script type="text/javascript">
	$(document).ready(function() {
		$("#AlbumPublishedDate").datepicker({dateFormat:"yy-mm-dd"});
	});
</script>
