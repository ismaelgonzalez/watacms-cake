<h4>Agregar Encuesta</h4>

<div class="well">
	<?php
	echo $this->Form->create('Poll', array('id'=>'addPoll'));

	echo $this->Form->input('title', array('label' => 'T&iacute;tulo'));

	//poll answers
	echo $this->Form->input('PollAnswer.answer1', array('label' => 'Respuesta'));
	echo $this->Form->input('PollAnswer.answer2', array('label' => 'Respuesta'));
	echo $this->Form->input('PollAnswer.answer3', array('label' => 'Respuesta'));
	echo $this->Form->input('PollAnswer.answer4', array('label' => 'Respuesta'));
	echo $this->Form->input('PollAnswer.answer5', array('label' => 'Respuesta'));


	echo $this->Form->submit('Enviar', array('formnovalidate' => true));
	echo $this->Form->end();
	?>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$(".fileupload").fileupload();
	});
</script>