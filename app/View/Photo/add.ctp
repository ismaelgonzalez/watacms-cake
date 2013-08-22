<h4>Agregar Fotos</h4>
<?php
echo $this->Form->create('Photo', array('type'=>'file'));
echo $this->Form->input('album_id', array(
	'label' => 'Album',
	'options' => array(
		$albums
	),
	'default' => $album_id,
	'disabled' => (sizeof($albums) == 1 ? true : false),
	'empty' => array(0 => '-- Elige un album --'),
));
echo $this->Form->input('pic1', array('label' => 'Foto', 'type' => 'file'));
echo $this->Form->input('title1', array('label' => 'T&iacute;tulo'));
echo $this->Form->input('blurb1', array('label' => 'Blurb', 'type' => 'textarea'));

echo $this->Form->input('pic2', array('label' => 'Foto', 'type' => 'file'));
echo $this->Form->input('title2', array('label' => 'T&iacute;tulo'));
echo $this->Form->input('blurb2', array('label' => 'Blurb', 'type' => 'textarea'));

echo $this->Form->input('pic3', array('label' => 'Foto', 'type' => 'file'));
echo $this->Form->input('title3', array('label' => 'T&iacute;tulo'));
echo $this->Form->input('blurb3', array('label' => 'Blurb', 'type' => 'textarea'));

echo $this->Form->input('pic4', array('label' => 'Foto', 'type' => 'file'));
echo $this->Form->input('title4', array('label' => 'T&iacute;tulo'));
echo $this->Form->input('blurb4', array('label' => 'Blurb', 'type' => 'textarea'));

echo $this->Form->input('pic5', array('label' => 'Foto', 'type' => 'file'));
echo $this->Form->input('title5', array('label' => 'T&iacute;tulo'));
echo $this->Form->input('blurb5', array('label' => 'Blurb', 'type' => 'textarea'));

echo $this->Form->submit('Enviar', array('formnovalidate' => true));
echo $this->Form->end();

?>