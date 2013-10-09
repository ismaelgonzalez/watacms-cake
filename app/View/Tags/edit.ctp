<h4>Editar Tag</h4>
<?php
echo $this->Form->create('Tag', array('type'=>'post'));
echo $this->Form->input('id', array('value' => $tag['Tag']['id']));
echo $this->Form->input('tag', array(
	'label' => 'Tag',
	'default' => $tag['Tag']['tag']
));
echo $this->Form->submit('Enviar', array('formnovalidate' => true));
echo $this->Form->end();

?>