<h4>Editar Foto</h4>

<div class="well">
	<?php
	echo $this->Form->create('Photo', array('type'=>'file', 'id'=>'addPhoto'));
	echo $this->Form->input('id', array('value'=> $foto['Photo']['id']));
	echo $this->Form->input('album_id', array(
		'label' => 'Album',
		'options' => array(
			$albums
		),
		'default' => $foto["Photo"]["album_id"],
		//'empty' => array('-- Elige una sección --'),
	));
	?>
	<div class="fileupload fileupload-new" data-provides="fileupload">
		<div class="fileupload-new thumbnail" style="width: 600px; height: 450px;"><img src="/fotos/<?php echo $foto["Photo"]["album_id"].DS.$foto["Photo"]["pic"]; ?>" /></div>
		<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 600px; max-height: 450px; line-height: 20px;"></div>
		<div>
		<span class="btn btn-file">
			<span class="fileupload-new">Cambiar Imagen</span>
			<span class="fileupload-exists">Cambiar</span>
			<input type="file" id="pic" name="data[Photo][pic]"/>
		</span>
			<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Quitar</a>
		</div>
	</div>
	<?php
	echo $this->Form->input('title', array('label' => 'T&iacute;tulo', 'default' => $foto["Photo"]["title"]));
	echo $this->Form->input('blurb', array('label' => 'Blurb', 'type' => 'text', "class" => "span6 input-large", 'default' => $foto["Photo"]["blurb"]));

	echo $this->Form->submit('Enviar', array('formnovalidate' => true));
	?>
	<p style="margin-top: 10px;"><a href="/album/view/<?php echo $foto["Photo"]["album_id"]; ?>" class="btn btn-info">Regresar</a></p>
	<?php
	echo $this->Form->end();
	?>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$(".fileupload").fileupload();
	});
</script>