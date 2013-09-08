<h4>Editar Encuesta</h4>

<div class="well">
	<?php
	echo $this->Form->create('Poll', array('id'=>'addPoll'));
	echo $this->Form->input('id', array('default' => $poll['Poll']['id']));
	echo $this->Form->input('title', array('label' => 'T&iacute;tulo', 'default' => $poll['Poll']['title']));

	//poll answers
	for ($i=0; $i<sizeof($poll['PollAnswer']); $i++) {
		echo $this->Form->input('PollAnswer.answer_'.$poll['PollAnswer'][$i]['id'], array('label' => 'Respuesta', 'default'=>$poll['PollAnswer'][$i]['answer']));
	}

	echo $this->Form->submit('Enviar', array('formnovalidate' => true));
	echo $this->Form->end();
	?>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$(".fileupload").fileupload();
	});
</script>