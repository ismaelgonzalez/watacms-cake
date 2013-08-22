<h4>Editar Album</h4>
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
	'type' => 'text',
	'label' => 'Fecha de Publicaci&oacute;n',
	'default' => $album['Album']['published_date'],
));
$time = $this->Timeoptions->getTimeOptions();

echo $this->Form->input('published_time', array(
	'label' => 'Hora de Publicaci&oacute;n',
	'type' => 'text',
	'default' => date("h:i A", strtotime($album['Album']['published_time'])),
));
echo $this->Form->submit('Enviar', array('formnovalidate' => true));
echo $this->Form->end();

?>
<script type="text/javascript">
	$(document).ready(function() {
		$("#AlbumPublishedDate").datepicker({dateFormat:"yy-mm-dd"});
	});
</script>