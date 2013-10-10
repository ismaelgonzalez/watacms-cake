<h4>Agregar Video</h4>
<?php
echo $this->Form->create('Video', array('type'=>'post'));
echo $this->Form->input('id', array('default' => $video['Video']['id']));
echo $this->Form->input('video', array(
	'label' => 'Link del Video',
	'default' => $video['Video']['video']
));
echo $this->Form->input('title', array(
	'label' => 'T&iacute;tulo',
	'default' => $video['Video']['title']
));
echo $this->Form->input('blurb', array(
	'label' => 'Blurb',
	'type' => 'text',
	"class" => "span6 input-large",
	'default' => $video['Video']['blurb']
));
echo $this->Form->input('section_id', array(
	'label' => 'Secci&oacute;n',
	'options' => array(
		$sections
	),
	'empty' => array(0 => '-- Elige una sección padre --'),
	'default' => $video['Video']['section_id']
));

echo $this->Form->submit('Enviar', array('formnovalidate' => true));
echo $this->Form->end();
?>
<script>
	$(document).ready(function() {
		$('#VideoVideo').parent().prepend('<p><small class="alert alert-info">copiar la URL del video y pegarlo aqui</small></p>');
	});
</script>