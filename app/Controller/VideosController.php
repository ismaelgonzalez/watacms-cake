<?php
class VideosController extends AppController
{
	public $uses = array('Video', 'Section');

	public $components = array('Session');

	public $helpers = array('Paginator', 'Js');

	public $paginate = array(
		'conditions' => array(
			'Video.status' => 'A'
		),
		'limit' => '10',
		'order' => array(
			'Video.id' => 'DESC'
		),
	);

	public function isAuthorized($user){
		if ($user) {
			return true;
		}

		return false;
	}

	public function index() {
		$videos = $this->paginate('Video');

		$this->set('title_for_layout', 'Videos');
		$this->set('videos', $videos);
	}

	public function add() {
		if (!empty($this->data)) {
			if ($this->Video->save($this->data)) {
				$this->Session->setFlash('Se agreg&oacute; el nuevo video!', 'default', array('class' => 'alert alert-success'));

				return $this->redirect('/videos');
			} else {
				$this->Session->setFlash('Hubo un error al guardar los datos, intente de nuevo!', 'default', array('class' => 'alert alert-error'));
			}
		}

		$sections = $this->Section->find('list');
		$this->set('sections', $sections);
		$this->set('title_for_layout', 'Agregar Video');
	}

	public function edit($id) {
		$this->Video->recursive = -1;
		$video = $this->Video->findById($id);

		if (empty($video)) {
			$this->Session->setFlash('ID de video invalido!', 'default', array('class' => 'alert alert-error'));

			return $this->redirect('/videos');
		}

		if(!empty($this->data)) {
			if ($this->Video->save($this->data)) {
				$this->Session->setFlash('Se agreg&oacute; el nuevo video!', 'default', array('class' => 'alert alert-success'));

				return $this->redirect('/videos');
			} else {
				$this->Session->setFlash('Hubo un error al guardar los datos, intente de nuevo!', 'default', array('class' => 'alert alert-error'));
			}
		}

		$this->set('video', $video);
		$sections = $this->Section->find('list');
		$this->set('sections', $sections);
		$this->set('title_for_layout', 'Editar Video');
	}

	public function delete($id) {
		$this->autoRender = false;
		$this->Video->recursive = -1;
		$video = $this->Video->findById($id);

		if (empty($video)) {
			$this->Session->setFlash('ID de video invalido!', 'default', array('class' => 'alert alert-error'));

			return $this->redirect('/videos');
		}

		$video['Video']['status'] ='S';

		$this->Video->save($video);

		$this->Session->setFlash('Se borr&oacute; el video con exito!', 'default', array('class'=>'alert alert-success'));

		return $this->redirect('/videos');
	}
}