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
			if ($this->Photo->uploadPhotos($this->data)) {
				$this->Session->setFlash('Se agregaron las nuevas fotos al album!', 'default', array('class'=>'alert alert-success'));

				return $this->redirect('/album/index');
			} else {
				$this->Session->setFlash('Hubo un error al subir la imagen :S', 'default', array('class'=>'alert alert-error'));
			}
		}
	}

	public function edit($id) {
		if (empty($this->data)) {
			$foto = $this->Photo->findById($id);

			if (empty($foto)) {
				$this->Session->setFlash('Numero de ID invalido!', 'default', array('class'=>'alert alert-error'));

				return $this->redirect('/album/index');
			}

			$this->set('foto', $foto);
		} else {

			if ($this->data['Photo']['pic']['error'] == 0) {
				$filename = $this->Photo->editPhoto($this->data);
				if ($filename) {
					$this->Session->setFlash('Se modific&oacute; la foto con exito!', 'default', array('class'=>'alert alert-success'));

					return $this->redirect('/album/index');
				} else {
					$this->Session->setFlash('Hubo un error al subir la imagen :S', 'default', array('class'=>'alert alert-error'));
				}
			}else {
				if ($this->Photo->editDataNoPhoto($this->data)) {
					$this->Session->setFlash('Se modific&oacute; la foto con exito!', 'default', array('class'=>'alert alert-success'));

					return $this->redirect('/album/index');
				} else {
					$this->Session->setFlash('No se pudieron guardar los cambios :S', 'default', array('class'=>'alert alert-error'));
				}
			}
		}

		$albums = $this->Album->find('list');

		$this->set('albums', $albums);
		$this->set('title_for_layout', 'Editar Foto');

		return $this->render();
	}

	public function delete($id) {
		$this->autoRender = false;
		$this->Photo->recursive = -1;
        $photo = $this->Photo->findById($id);

        if (!empty($photo)) {
            if ($this->Photo->delete($id)) {
                $this->Session->setFlash('Se borr&oacute; la foto con exito!', 'default', array('class'=>'alert alert-success'));

                return $this->redirect('/album/view/'.$photo['Photo']['album_id']);
            } else {
                $this->Session->setFlash('No se pudo borrar esta foto :(', 'default', array('class'=>'alert alert-error'));

                return $this->redirect('/album/view/'.$photo['Photo']['album_id']);
            }
        } else {
            $this->Session->setFlash('No existe una foto con este ID :@', 'default', array('class'=>'alert alert-error'));

            return $this->redirect('/album/view/'.$photo['Photo']['album_id']);
        }
	}
}