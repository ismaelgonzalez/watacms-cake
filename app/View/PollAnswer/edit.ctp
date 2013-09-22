<h4>Editar Respuestas de Encuesta</h4>

<div class="well">
	<?php
	echo "<h5>".$poll['Poll']['title']."</h5>";
	echo $this->Form->create('PollAnswer', array('id'=>'addPoll'));

	//poll answers
	for ($i=0; $i<sizeof($poll['PollAnswer']); $i++) {
		echo $this->Form->input('PollAnswer.answer_'.$poll['PollAnswer'][$i]['id'], array('label' => 'Respuesta', 'default'=>$poll['PollAnswer'][$i]['answer']));
	}

	echo $this->Form->submit('Enviar', array('formnovalidate' => true));
	echo $this->Form->end();
	?>
	<a href="/poll/index" class="btn btn-info">Regresar</a>
</div>


<script type="text/javascript">
	$(document).ready(function() {
		$("[data-toggle=tooltip]").tooltip({placement: 'right'});
	});

	function borrarRespuesta(answer_id) {
		$.ajax({
			type: "POST",
			url: '/poll_answer/delete/'+answer_id
		}).done(function(msg){
				if (msg) {
					$('#PollAnswerAnswer'+answer_id).parent().parent().hide();
				}
			});
	}
</script>