<h4>Agregar Pic</h4>

<div class="well">
<?php
echo $this->Form->create('Pic', array('type'=>'file', 'id'=>'addPic'));

echo $this->Form->input('section_id', array(
	'label' => 'Secci&oacute;n',
	'options' => array(
		$sections
	),
	'empty' => array('-- Elige una sección --'),
));
?>
<div class="fileupload fileupload-new" data-provides="fileupload">
	<div class="fileupload-new thumbnail" style="width: 600px; height: 450px;"></div>
	<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 600px; max-height: 450px; line-height: 20px;"></div>
	<div>
		<span class="btn btn-file">
			<span class="fileupload-new">Seleccionar imagen</span>
			<span class="fileupload-exists">Cambiar</span>
			<input type="file" id="pic" name="data[Pic][pic]"/>
		</span>
		<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Quitar</a>
	</div>
</div>
<?php
echo $this->Form->input('title', array('label' => 'T&iacute;tulo'));
echo $this->Form->input('blurb', array('label' => 'Blurb', 'type' => 'text', "class" => "span6 input-large"));

echo $this->Form->submit('Enviar', array('formnovalidate' => true));
echo $this->Form->end();
?>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$(".fileupload").fileupload();
	});
</script>