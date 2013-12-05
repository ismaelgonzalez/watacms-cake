<?php
class Tagged extends AppModel
{
	public $useTable = 'tagged';

	public $belongsTo = array('Tag');
}