<h4>Agregar Encuesta</h4>

<div class="well">
	<?php
	echo $this->Form->create('Poll', array('id'=>'addPoll'));

	echo $this->Form->input('title', array('label' => 'T&iacute;tulo'));

	echo "<p><a id=\"addAnswer\" class=\"btn btn-success\"><i class=\"icon-plus\"></i></a> Agregar Respuesta a la Encuesta</p>";

	echo $this->Form->submit('Enviar', array('formnovalidate' => true));
	echo $this->Form->end();
	?>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$("#addAnswer").click(function(){
			$(this).before("<div class='clearfix'><label for='PollAnswerAnswer'>Respuesta</label><div class='input added'><input name='answer[]' type='text' id='PollAnswerAnswer'></div></div>");
		});
	});
</script>
