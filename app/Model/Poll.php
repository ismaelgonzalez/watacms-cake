<?php
class Poll extends AppModel {
	public $useTable = 'poll';

	public $hasMany = array(
		'PollAnswer'
	);

	public $validate = array(
		'title' => array(
			'rule' => 'notEmpty',
			'message' => 'El nombre del título es requerido!',
		),
	);
}