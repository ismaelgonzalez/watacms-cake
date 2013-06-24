<?php
class PhotoController extends AppController {
	public $uses = array('Album', 'Photo');

	public $components = array('Session');

	public $helpers = array('Paginator', 'Js');

	public $paginate = array(
		'limit' => '10',
		'order' => array(
			'Photo.id' => 'ASC'
		),
	);

	public function add($id = 0) {

		if ($id > 0) {
			$albums = $this->Album->find('list', array(
				'conditions' => array('Album.id' => $id),
				'order' => array('Album.id DESC'),
			));
		} else {
			$albums = $this->Album->find('list', array(
				'order' => array('Album.id DESC'),
			));
		}

		$this->set('albums', $albums);
		$this->set('album_id', $id);

		if (!empty($this->data)) {
			echo '<pre>';
			//print_r($this->data);
			//echo '</pre>';
			//exit();
			if ($this->Photo->uploadPhotos($this->data)) {
				$this->Session->setFlash('Se agregaron las nuevas fotos al album!', 'default', array('class'=>'message success-message'));

				return $this->redirect('/album/index');
			} else {
				$this->Session->setFlash('Hubo un error al subir la imagen :S');
			}
		}
	}
}