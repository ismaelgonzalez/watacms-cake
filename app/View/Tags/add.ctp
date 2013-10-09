<h4>Agregar Tag</h4>
<?php
echo $this->Form->create('Tag', array('type'=>'post'));
echo $this->Form->input('tag', array('label' => 'Tag'));
echo $this->Form->submit('Enviar', array('formnovalidate' => true));
echo $this->Form->end();

?>