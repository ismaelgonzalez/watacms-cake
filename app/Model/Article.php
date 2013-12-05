<?php
class Article extends AppModel
{
	public $useTable = 'article';

	public $actsAs = array('Taggable');

	public $validate = array(
		'title' => array(
			'required' => array(
				'rule' => 'notEmpty',
				'message' => 'El Título es requerido!',
			),
		),
		'section_id' => array(
			'rule' => 'naturalNumber',
			'message' => 'La sección del articulo es requerida!',
		),
		'published_date' => array(
            'rule' => 'notEmpty',
            'message' => 'La fecha de publicación es requerida!',
        ),
		'published_time' => array(
			'rule' => 'notEmpty',
			'message' => 'La hora de publicación es requerida!',
		),
	);

	public $belongsTo = array(
		'Section'
	);

	public $hasMany = array(
		'Tagged' => array(
			'foreignKey' => 'model_id'
		)
	);

	public function beforeSave(){
		//turn title into slug
		$slug = str_replace(" ", "-", strtolower($this->data[$this->alias]['title']));

		$this->data[$this->alias]['slug'] = $slug;

		//set published date & time
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

		if(empty($this->data[$this->alias]['pic']['name']) || $this->data[$this->alias]['pic']['name']!=0 ) {
			$this->data[$this->alias]['pic'] = null;
		}

		$user = $this->getCurrentUser();

		$this->data[$this->alias]['created_date'] = date('Y-m-d H:i:s');
		$this->data[$this->alias]['created_by'] = $user['id'];

		return true;
	}

	public function beforeFind() {
		$this->hasMany['Tagged']['conditions'] = array('Tagged.model' => 'article');
	}

	public function uploadPic($data){
		$pics = $data;

		$album_name = date('Ym');
		$pics_dir = WWW_ROOT.'fotos'.DS.'notas'.DS.$album_name;

		if(!is_dir($pics_dir)) {
			mkdir($pics_dir, 0775);
		}

		$allowed_types = array('image/gif','image/jpeg','image/pjpeg','image/png');

		$filename = false; //in case there is no file to be uploaded we return false.

		if ($pics[$this->alias]['pic']['name'] != '' && $pics[$this->alias]['pic']['error'] == 0) {	//make sure there is a file to upload and there is no error
			$filename = str_replace(' ', '_', $pics[$this->alias]['pic']['name']);

			$typeOK = false;

			foreach ($allowed_types as $type) {	//check to make sure file type is allowed
				if ($type == $pics[$this->alias]['pic']['type']) {
					$typeOK = true;
					break;
				}
			}

			if ($typeOK) {	//upload
				if(!move_uploaded_file($pics[$this->alias]['pic']['tmp_name'], $pics_dir.DS.$filename)) {
					return false;
				}
			}
		}

		return $filename;
	}
}