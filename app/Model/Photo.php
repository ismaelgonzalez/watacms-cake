<?php
class Photo extends AppModel {
	public $useTable = 'photo';

	public $belongsTo = array(
		'album'
	);

	public $validate = array(
		'pic' => array(
			'rule' => 'notEmpty',
			'message' => 'Aún no has agregado la foto!',
		),
		'album_id' => array(
			'rule' => 'notEmpty',
			'message' => 'Necesitas escoger un album antes de guardar!',
		),
	);

	public function uploadPhotos($data) {
		//step1 create a folder based on the album_id, only create the folder if it doesn't exist
		$album_id = $data[$this->alias]['album_id'];

		$album_dir = WWW_ROOT.'fotos'.DS.$album_id;

		echo $album_dir;

		if(!is_dir($album_dir)) {
			mkdir($album_dir);
		}

		$allowed_types = array('image/gif','image/jpeg','image/pjpeg','image/png');

		for ($i = 1; $i <= 5; $i++) {
			 if ($data[$this->alias]['pic'.$i]['name'] != '') {	//make sure there is a file to upload
				 $filename = str_replace(' ', '_', $data[$this->alias]['pic'.$i]['name']);

				 $typeOK = false;

				 foreach ($allowed_types as $type) {	//check to make sure file type is allowed
					 if ($type == $data[$this->alias]['pic'.$i]['type']) {
						 $typeOK = true;
						 break;
					 }
				 }

				 if ($typeOK) {	//upload
					 //step2 upload the photos to this folder

				 }
				 //step3 add in record to db
			 }
		}



		//step4 return true if all good, false if there were errors
	}
}