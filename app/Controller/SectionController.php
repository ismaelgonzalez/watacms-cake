<?php
class SectionController extends AppController {

	public $uses = array('Section');

	public $components = array('Session');

	public $helpers = array('Paginator', 'Js');

	public $paginate = array(
		'limit' => '10',
		'order' => array(
			'Section.id' => 'ASC'
		),
	);

	public function isAuthorized($user){
		if (!parent::isAuthorized($user)) {
			$this->Session->setFlash('No tienes acceso a esta area!', 'default', array('class'=>'alert alert-error'));

			return $this->redirect('/');
		}

		return true;
	}

	public function index() {
		$sections = $this->paginate('Section');

		for ($i = 0; $i < count($sections); $i++) {
			if ($sections[$i]['Section']['sub_id'] > 0) {
				$parent_section = $this->Section->getParentSection($sections[$i]['Section']['sub_id']);
				$sections[$i]['Section']['parent_section'] = $parent_section;
			}
		}

		$this->set('title_for_layout', 'Secciones');
		$this->set('sections', $sections);
	}

	public function add() {
		if (!empty($this->data)) {
			if ($this->Section->save($this->data)) {
				$this->Session->setFlash('Se agreg&oacute; la nueva secci&oacute;n!', 'default', array('class'=>'alert alert-success'));

				return $this->redirect('/section/index');
			}
		}

		$parents = $this->Section->getParents();
		$this->set('parents', $parents);
		$this->set('title_for_layout', 'Agregar Secciones');

		return $this->render();
	}

	public function edit($id) {
		if (empty($this->data)) {
			$section = $this->Section->findById($id);
			if (empty($section)) {
				$this->Session->setFlash('Record Invalido!', 'default', array('class'=>'alert alert-error'));

				return $this->redirect('/section');
			}

			$this->set('section', $section);
		} else {
			if ($this->Section->save($this->data)) {
				$this->Session->setFlash('Se modific&oacute; la secci&oacute;n con exito!', 'default', array('class'=>'alert alert-success'));

				return $this->redirect('/section/index');
			}
		}

		$parents = $this->Section->getParents();
		$this->set('parents', $parents);
		$this->set('title_for_layout', 'Editar Secciones');

		return $this->render();
	}

	public function delete($id) {
		$this->autoRender = false;
		$section = $this->Section->findById($id);

		if (!empty($section)) {
			$this->Section->delete($id);
			$this->Session->setFlash('Se borr&oacute; la secci&oacute;n con exito!', 'default', array('class'=>'alert alert-success'));

			return $this->redirect('/section/index');
		} else {
			$this->Session->setFlash('No hay secci&oacute;n para borrar!', 'default', array('class'=>'alert alert-error'));

			return $this->redirect('/section/index');
		}

	}
}