<?php
class Video extends AppModel
{
	public $useTable = 'video';

	public $belongsTo = array(
		'Section'
	);

	public $validate = array(
		'video' => array(
			'rule' => 'notEmpty',
			'message' => 'Tienes que agregar un video!',
		),
		'section_id' => array(
			'rule' => 'naturalNumber',
			'message' => 'La sección del video es requerida!',
		),
	);
}