<?php
class ArticlesController extends AppController
{
	public $uses = array('Article', 'Section', 'Video', 'Tag', 'Tagged');

	public $components = array('Session');

	public $helpers = array('Paginator', 'Js', 'Timeoptions', 'TinyMCE.TinyMCE', 'Status');

	public $paginate = array(
		'conditions' => array(
			'status' => 'A',
		),
		'limit' => '10',
		'order' => array(
			'Article.id' => 'DESC',
			'Article.publish_date' => 'DESC'
		),
	);

	public function isAuthorized($user){
		if ($user) {
			return true;
		}

		return false;
	}

	public function index() {
		//TO DO: mandar el status por parametro y modificar el paginate
		$articles = $this->paginate('Article');

		$this->set('title_for_layout', 'Notas más recientes');
		$this->set('articles', $articles);
	}

	public function add() {
		if (!empty($this->data)) {
			echo '<pre>';
			$article = $this->data;
			$filename = $this->Article->uploadPic($this->data);

			if ($filename) {
				$article['Article']['pic'] = $filename;
			}

			if ($this->Article->save($article)) {
				$this->Session->setFlash('Se agreg&oacute; la nueva nota!', 'default', array('class'=>'alert alert-success'));

				return $this->redirect('/articles/index');
			}
		}

		$sections = $this->Section->find('list');

		$this->set('sections', $sections);
		$this->set('title_for_layout', 'Agregar Notas');
	}

	public function edit($id) {
		$this->Article->recursive = -1;
		$article = $this->Article->findById($id);

		if(!$article){
			$this->Session->setFlash('ID invalido!', 'default', array('class'=>'alert alert-error'));

			return $this->redirect('/articles/index');
		}
		//if post do shit here
		if (!empty($this->data)) {
			echo '<pre>'; print_r($this->data); exit();
		}

		$sections = $this->Section->find('list');

		$tags = $this->Tagged->find('all', array(
			'conditions' => array(
				'model' => 'article',
				'model_id' => $id
			),
		));
		/*echo '<pre>';

		print_r($article);
		print_r($tags);
		exit();*/
		$this->set('article', $article);
		$this->set('sections', $sections);
		$this->set('tags', $tags);

	}

	public function delete($id) {
		$this->autoRender = false;
		$this->Article->Behaviors->detach('Taggable');

		$article = $this->Article->findById($id);

		if (!empty($article)) {
			$article['Article']['status'] = 'S';
			$this->Article->save($article);
			$this->Session->setFlash('Se desactiv&oacute; la nota con exito!', 'default', array('class'=>'alert alert-success'));

			return $this->redirect('/articles/index');
		} else {
			$this->Session->setFlash('No hay nota para borrar!', 'default', array('class'=>'alert alert-error'));

			return $this->redirect('/articles/index');
		}
	}

	public function reactivar($id) {
		$this->autoRender = false;
		$this->Article->Behaviors->detach('Taggable');

		$article = $this->Article->findById($id);

		if (!empty($article) && $article['Article']['status'] == 'S') {
			$article['Article']['status'] = 'A';
			$this->Article->save($article);
			$this->Session->setFlash('Se activ&oacute; la nota con exito!', 'default', array('class'=>'alert alert-success'));

			return $this->redirect('/articles/index');
		} else {
			$this->Session->setFlash('No hay nota para activar!', 'default', array('class'=>'alert alert-error'));

			return $this->redirect('/articles/index');
		}
	}

	public function testarr() {
		$this->autoRender = false;
		echo '<pre>';
		$array = array_unique(explode(',', str_replace(', ', ',', "6,'alison',3,3,'alison brie',2, 'alison','brie alison'")));

		print_r($array);

		print_r(array_unique($array));

		echo '<hr><br>';
		echo date('Ym');
	}
}