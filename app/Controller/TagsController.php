<?php
class TagsController extends AppController
{
	public $uses = array('Tag');

	public $components = array('Session');

	public $helpers = array('Paginator', 'Js');

	public $paginate = array(
		'limit' => '10',
		'order' => array(
			'Tag.id' => 'ASC'
		),
	);

	public function isAuthorized($user){
		if (!parent::isAuthorized($user)) {
			$this->Session->setFlash('No tienes acceso a esta area!', 'default', array('class'=>'alert alert-error'));

			return $this->redirect('/');
		}
	}

	public function index() {
		$tags = $this->paginate('Tag');

		$this->set('title_for_layout', 'Tags');
		$this->set('tags', $tags);
	}

	public function add() {
		if (!empty($this->data)) {
			if ($this->Tag->save($this->data)) {
				$this->Session->setFlash('Se agreg&oacute; el nuevo tag!', 'default', array('class'=>'alert alert-success'));

				return $this->redirect('/tags/index');
			}
		}
		$this->set('title_for_layout', 'Agregar Tags');

		return $this->render();
	}

	public function edit($id) {
		if (empty($this->data)) {
			$tag = $this->Tag->findById($id);
			if (empty($tag)) {
				$this->Session->setFlash('Record Invalido!', 'default', array('class'=>'alert alert-error'));

				return $this->redirect('/tags');
			}

			$this->set('tag', $tag);
		} else {
			if ($this->Tag->save($this->data)) {
				$this->Session->setFlash('Se modific&oacute; el nuevo tag!', 'default', array('class'=>'alert alert-success'));

				return $this->redirect('/tags/index');
			}
		}
		$this->set('title_for_layout', 'Agregar Tags');

		return $this->render();
	}

	public function delete($id) {
		$this->autoRender = false;
		$tag = $this->Tag->findById($id);

		if (!empty($tag)) {
			$this->Tag->delete($id);

			$this->Session->setFlash('Se borr&oacute; el tag!', 'default', array('class'=>'alert alert-success'));

			return $this->redirect('/tags/index');
		} else {
			$this->Session->setFlash('No hay tag para borrar!', 'default', array('class'=>'alert alert-error'));

			return $this->redirect('/tags/index');
		}
	}
}