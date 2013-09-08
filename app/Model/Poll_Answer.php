<?php
class PollAnswer extends AppModel {
	public $name = 'PollAnswer';

	public $useTable = 'poll_answers';

	public $belongsTo = array(
		'Poll'
	);

	public $validate = array(
		'answer' => array(
			'rule' => 'notEmpty',
			'message' => 'La respuesta es requerida!',
		),
		'poll_id'  => array(
			'rule' => 'notEmpty',
			'message' => 'Se necesita una encuesta para esta respuesta!',
		),
	);
}