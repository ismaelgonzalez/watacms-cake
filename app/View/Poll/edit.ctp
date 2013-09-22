<h4>Editar Encuesta</h4>

<div class="well">
	<?php
	echo $this->Form->create('Poll', array('id'=>'addPoll'));
	echo $this->Form->input('id', array('default' => $poll['Poll']['id']));
	echo $this->Form->input('title', array('label' => 'T&iacute;tulo', 'default' => $poll['Poll']['title']));

	//poll answers
	for ($i=0; $i<sizeof($poll['PollAnswer']); $i++) {
		echo "<div class='clearfix' style='margin-bottom: 15px'>
				<label for='PollAnswerAnswer".$poll['PollAnswer'][$i]['id']."'>Respuesta</label>
				<div class='form-horizontal'>
					<input name='data[PollAnswer][answer_".$poll['PollAnswer'][$i]['id']."]' type='text' value='".$poll['PollAnswer'][$i]['answer']."' id='PollAnswerAnswer".$poll['PollAnswer'][$i]['id']."'>
					<a class='btn btn-danger' href='javascript:borrarRespuesta(".$poll['PollAnswer'][$i]['id'].")' data-toggle='tooltip' title='Borrar Respuesta'><i class='icon-remove-sign'></i></a>
				</div>
			</div>";
	}

	echo $this->Form->submit('Enviar', array('formnovalidate' => true));
	echo $this->Form->end();
	?>
	<p>
		<a href="/poll/index" class="btn btn-info">Regresar</a>
	</p>
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