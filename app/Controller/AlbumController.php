<?php
class AlbumController extends AppController {
    public $uses = array('Album', 'Section', 'Photo');

    public $components = array('Session');

    public $helpers = array('Paginator', 'Js', 'Timeoptions');

    public $paginate = array(
        'conditions' => array(
            'status' => 'A',
        ),
        'limit' => '10',
        'order' => array(
            'Album.id' => 'ASC'
        ),
    );

	public function isAuthorized($user){
		if ($user) {
			return true;
		}

		return false;
	}

    public function index() {
        $albums = $this->paginate('Album');

        $this->set('title_for_layout', 'Albums de fotos');
        $this->set('albums', $albums);

		return $this->render();
    }

	public function add() {
		if (!empty($this->data)) {
			if ($this->Album->save($this->data)) {
				$this->Session->setFlash('Se agreg&oacute; el nuevo album!', 'default', array('class'=>'alert alert-success'));

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
			$this->Album->recursive = -1;
			$album = $this->Album->findById($id);

			if (empty($album)) {
				$this->Session->setFlash('Numero de ID invalido!', 'default', array('class'=>'alert alert-error'));

				return $this->redirect('/album/index');
			}

			$this->set('album', $album);
		} else {
			if ($this->Album->save($this->data)) {
				$this->Session->setFlash('Se modific&oacute; el album con exito!', 'default', array('class'=>'alert alert-success'));

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

		$this->Album->recursive = -1;
		$album = $this->Album->findById($id);

		if (!empty($album)) {
            $album['Album']['status'] = 'S';
            $this->Album->save($album);
			$this->Session->setFlash('Se borr&oacute; el album con exito!', 'default', array('class'=>'alert alert-success'));

			return $this->redirect('/album/index');
		} else {
			$this->Session->setFlash('No existe un album con este ID', 'default', array('class'=>'alert alert-error'));

			return $this->redirect('/album/index');
		}
	}

	public function view($id){
		$album = $this->Album->findById($id);
		$fotos = $this->Photo->findAllByAlbumId($id);

		$this->set('album', $album);
		$this->set('fotos', $fotos);
	}
}