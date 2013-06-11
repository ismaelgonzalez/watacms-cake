<?php
class Album extends AppModel {
    public $useTable = 'album';

    public $validate = array(
        'name' => array(
            'rule' => 'notEmpty',
            'message' => 'El nombre del album es requerido!',
        ),
        'section_id' => array(
            'rule' => 'notEmpty',
            'message' => 'La sección del album es requerida!',
        ),
        'published_date' => array(
            'rule' => 'notEmpty',
            'message' => 'La fecha de publicación es requerida!',
        ),
    );

	public $belongsTo = array(
		'Section'
	);
}