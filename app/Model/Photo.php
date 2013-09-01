<?php
class Photo extends AppModel {
	public $useTable = 'photo';

	public $belongsTo = array(
		'Album'
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
		$photos = $data;
		$album_id = $photos[$this->alias]['album_id'];

		$album_dir = WWW_ROOT.'fotos'.DS.$album_id;

		if(!is_dir($album_dir)) {
			mkdir($album_dir);
		}

		$allowed_types = array('image/gif','image/jpeg','image/pjpeg','image/png');

		for ($i = 1; $i <= 5; $i++) {

			if ($photos[$this->alias]['pic'.$i]['name'] != '' && $photos[$this->alias]['pic'.$i]['error'] == 0) {	//make sure there is a file to upload and there is no error
				$filename = str_replace(' ', '_', $photos[$this->alias]['pic'.$i]['name']);

				$typeOK = false;

				foreach ($allowed_types as $type) {	//check to make sure file type is allowed
					if ($type == $photos[$this->alias]['pic'.$i]['type']) {
						$typeOK = true;
						break;
					}
				}

				if ($typeOK) {	//upload
					if(!move_uploaded_file($photos[$this->alias]['pic'.$i]['tmp_name'], $album_dir.DS.$filename)) {
						return false;
					}
				}

				//$photo = array();
				$photo = array(
					$this->alias => array(
						'album_id' => $photos[$this->alias]['album_id'],
						'title' => $photos[$this->alias]['title'.$i],
						'blurb' => $photos[$this->alias]['blurb'.$i],
						'pic' => $filename,
					)
				);

				$this->create($photo);
				if (!$this->save($photo)) {
					error_log(__CLASS__.'/'.__FUNCTION__.' could not save data');
					return false;
				}
			}
		}

		return true;
	}

	public function editDataNoPhoto($data) {
		$foto = array(
			$this->alias => array(
				'id' => $data[$this->alias]['id'],
				'album_id' => $data[$this->alias]['album_id'],
				'title' => $data[$this->alias]['title'],
				'blurb' => $data[$this->alias]['blurb'],
			)
		);

		if (!$this->save($foto)) {
			error_log(__CLASS__.'/'.__FUNCTION__.' could not save data');
			return false;
		}

		return true;
	}
}