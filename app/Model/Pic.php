<?php
class Pic extends AppModel {
    public $useTable = 'pic';

	public $actsAs = array('Thumb');

	public $belongsTo = array(
		'Section'
	);

	public $validate = array(
		'titulo' => array(
			'rule' => 'notEmpty',
			'message' => 'El nombre del título es requerido!',
		),
		'section_id' => array(
			'rule' => 'naturalNumber',
			'message' => 'La sección del pic es requerida!',
		),
	);

	public function beforeDelete(){
		App::uses('File', 'Utility');

		$data = $this->find('first', array(
			'conditions' => array(
				'Pic.id' => $this->id
			),
		));
		$file = new File(WWW_ROOT . 'fotos/pics/'.$data[$this->alias]['pic'], false, 0777);
		$thumb = new File(WWW_ROOT . 'fotos/pics/thumbs/'.$data[$this->alias]['pic'], false, 0777);


		if(is_file(WWW_ROOT . 'fotos/pics/'.$data[$this->alias]['pic'])){
			echo '<br>file exists';
		}
		if(is_file(WWW_ROOT . 'fotos/pics/thumbs/'.$data[$this->alias]['pic'])){
			echo '<br>thumb exists';
		}

		if($file->delete() && $thumb->delete()) {
			return true;
		} else {
			return false;
		}
	}
	
	public function uploadPic($data){
		$pics = $data;

		$pics_dir = WWW_ROOT.'fotos'.DS.'pics';

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
					if(!move_uploaded_file($pics[$this->alias]['pic']['tmp_name'], $pics_dir.DS.$filename) || !$this->make_thumb($filename, $options=array('files_dir' => $pics_dir)) ) {
						return false;
					}
				}
		}


		return $filename;

	}

    public function editDataNoPic($data) {
        $pic = array(
            $this->alias => array(
                'id' => $data[$this->alias]['id'],
                'section_id' => $data[$this->alias]['section_id'],
                'title' => $data[$this->alias]['title'],
                'blurb' => $data[$this->alias]['blurb'],
            )
        );

        if (!$this->save($pic)) {
            error_log(__CLASS__.'/'.__FUNCTION__.' could not save data');
            return false;
        }

        return true;
    }
}