<?php
class Tag extends AppModel
{
	public $useTable = 'tag';

	public $validate = array(
		'tag' => array(
			'rule' => 'notEmpty',
			'message' => 'El nombre del tag es requerido!',
		),
	);

	public $hasMany = array(
		'Tagged'
	);
}