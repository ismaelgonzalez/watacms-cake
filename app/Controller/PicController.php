<?php
class PicController extends AppController {
    public $uses = array('Pic', 'Section');

    public $components = array('Session');

    public $helpers = array('Paginator', 'Js');

    public $paginate = array(
        'limit' => '10',
        'order' => array(
            'Pic.id' => 'ASC'
        ),
    );

    public function index() {
        $pics = $this->paginate('Pic');

        $this->set('title_for_layout', 'Lista de Ultimas fotos');
        $this->set('pics', $pics);

        return $this->render();
    }

	public function add(){
		if (!empty($this->data)) {
			if ($this->Pic->uploadPic($this->data)) {
				$this->Session->setFlash('Se agreg&oacute; el nuevo Pic!', 'default', array('class'=>'alert alert-success'));

				return $this->redirect('/pic/index');
			} else {
				$this->Session->setFlash('Hubo un error al subir la imagen :S', 'default', array('class'=>'alert alert-error'));
			}
		}

		$sections = $this->Section->find('list');

		$this->set('sections', $sections);
		$this->set('title_for_layout', 'Agregar Pics');

		return $this->render();
	}

	public function edit($id) {
		if (empty($this->data)) {
			$pic = $this->Pic->findById($id);

			if (empty($pic)) {
				$this->Session->setFlash('Numero de ID invalido!', 'default', array('class'=>'alert alert-error'));

				return $this->redirect('/pic/index');
			}

			$this->set('pic', $pic);
		} else {
            //echo '<pre>'; print_r($this->data); exit();
            if ($this->data['Pic']['pic']['error'] == 0) {
                if ($this->Pic->uploadPic($this->data)) {
                    $this->Session->setFlash('Se agreg&oacute; el nuevo Pic!', 'default', array('class'=>'alert alert-success'));

                    return $this->redirect('/pic/index');
                } else {
                    $this->Session->setFlash('Hubo un error al subir la imagen :S', 'default', array('class'=>'alert alert-error'));
                }
            }else {
                if ($this->Pic->editDataNoPic($this->data)) {
                    $this->Session->setFlash('Se modific&oacute; el pic con exito!', 'default', array('class'=>'alert alert-success'));

                    return $this->redirect('/pic/index');
                } else {
                    $this->Session->setFlash('No se pudieron guardar los cambios :S', 'default', array('class'=>'alert alert-error'));
                }
            }
		}

		$sections = $this->Section->find('list');

		$this->set('sections', $sections);
		$this->set('title_for_layout', 'Editar Pic');

		return $this->render();
	}
}