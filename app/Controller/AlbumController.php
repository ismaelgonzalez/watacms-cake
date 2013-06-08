<?php
class AlbumController extends AppController {
    public $uses = array('Album', 'Section');

    public $components = array('Session');

    public $helpers = array('Paginator', 'Js');

    public $paginate = array(
        'limit' => '10',
        'order' => array(
            'Album.id' => 'ASC'
        ),
    );

    public function index() {
        $albums = $this->paginate('Album');

        $this->set('title_for_layout', 'Albums de fotos');
        $this->set('albums', $albums);

		return $this->render();
    }

	public function add() {
		if (!empty($this->data)) {
			if ($this->Album->save($this->data)) {
				$this->Session->setFlash('Se agreg&oacute; el nuevo album!', 'default', array('class'=>'message success-message'));

				return $this->redirect('/album/index');
			}
		}

		$sections = $this->Section->find('list');

		$this->set('sections', $sections);
		$this->set('title_for_layout', 'Agregar Albums');

		return $this->render();
	}

	public function edit($id) {
		if (empty($this->data)) {
			$album = $this->Album->findById($id);

			if (empty($album)) {
				$this->Session->setFlash('Numero de ID invalido!');

				return $this->redirect('/album/index');
			}

			$this->set('album', $album);
		} else {
			if ($this->Album->save($this->data)) {
				$this->Session->setFlash('Se modific&oacute; el album con exito!', 'default', array('class'=>'message success-message'));

				return $this->redirect('/album/index');
			}
		}

		$sections = $this->Section->find('list');

		$this->set('sections', $sections);
		$this->set('title_for_layout', 'Editar Album');

		return $this->render();
	}

	public function delete($id) {
		$this->autoRender = false;
		$album = $this->Album->findById($id);

		if (!empty($album)) {
			$this->Album->delete($id);
			$this->Session->setFlash('Se borr&oacute; la secci&oacute;n con exito!', 'default', array('class'=>'message success-message'));

			return $this->redirect('/album/index');
		} else {
			$this->Session->setFlash('No existe un album con este ID');

			return $this->redirect('/album/index');
		}



	}
}