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
		echo '<pre>'; print_r($this->data);
		if (!empty($this->data['Album']['published_date']) && ! empty($this->data['Album']['published_date'])) {

			$this->data['Album']['published_date'] = date("Y-m-d", strtotime($this->data['Album']['published_date']));

			if ($this->data['Album']['published_time'] == 0) {
				$this->data['Album']['published_time'] = date("H:i");
			} else {
				if (strstr("time", ":")) {
					echo "I should be here";
					$this->data['Album']['published_time'] = date("H:i", strtotime($this->data['Album']['published_time']));
				} else {
					$this->data['Album']['published_time'] = date("H:i", strtotime($this->data['Album']['published_time'].":00"));
				}
			}
		}

		exit();
		return true;
	}
}