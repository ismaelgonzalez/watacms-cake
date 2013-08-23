<?php
class Album extends AppModel {
    public $useTable = 'album';

    public $validate = array(
        'name' => array(
            'rule' => 'notEmpty',
            'message' => 'El nombre del album es requerido!',
        ),
        'section_id' => array(
            'rule' => 'naturalNumber',
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

	public function beforeSave(){
		if (!empty($this->data[$this->alias]['published_date']) && !empty($this->data[$this->alias]['published_date'])) {
			$this->data[$this->alias]['published_date'] = date("Y-m-d", strtotime($this->data[$this->alias]['published_date']));

			if ($this->data[$this->alias]['published_time'] == 0) {
				$this->data[$this->alias]['published_time'] = date("H:i");
			} else {
				if (strstr($this->data[$this->alias]['published_time'], ":")) {
					$this->data[$this->alias]['published_time'] = date("H:i", strtotime($this->data[$this->alias]['published_time']));
				} else {
					$this->data[$this->alias]['published_time'] = date("H:i", strtotime($this->data[$this->alias]['published_time'].":00"));
				}
			}
		}

		return true;
	}
}