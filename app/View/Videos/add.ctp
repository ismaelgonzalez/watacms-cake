<h4>Agregar Video</h4>
<?php
echo $this->Form->create('Video', array('type'=>'post'));
echo $this->Form->input('video', array('label' => 'Link del Video'));
echo $this->Form->input('title', array('label' => 'T&iacute;tulo'));
echo $this->Form->input('blurb', array('label' => 'Blurb', 'type' => 'text', "class" => "span6 input-large"));
echo $this->Form->input('section_id', array(
	'label' => 'Secci&oacute;n',
	'options' => array(
		$sections
	),
	'empty' => array(0 => '-- Elige una sección padre --'),
));

echo $this->Form->submit('Enviar', array('formnovalidate' => true));
echo $this->Form->end();
?>
<script>
	$(document).ready(function() {
		$('#VideoVideo').parent().prepend('<p><small class="alert alert-info">copiar la URL del video y pegarlo aqui</small></p>');
	});
</script>