<?php
App::uses('AppModel', 'Model');
/**
 * Video Model
 *
 */
class Video extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'video';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'video' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Se necesita un url del video!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'El video necesita un t&iacute;tulo!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'section_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Este video necesita estar relacionado a una secci&oacute;n',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
