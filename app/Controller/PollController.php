<?php
class PollController extends AppController {
	public $uses = array('Poll', 'PollAnswer');

	public $components = array('Session');

	public $helpers = array('Paginator', 'Js');

	public $paginate = array(
		'conditions' => array(
			'Poll.status' => 'A',
		),
		'limit' => '10',
		'order' => array(
			'Poll.id' => 'DESC'
		),
	);

	public function isAuthorized($user){
		if ($user) {
			return true;
		}

		return false;
	}

	public function index() {
		$polls = $this->paginate('Poll');

		$this->set('title_for_layout', 'Lista de Ultimas Encuestas');
		$this->set('polls', $polls);

		return $this->render();
	}

	public function add() {
		if (!empty($this->data)) {
			$poll_answer = $this->data['answer'];
			if ($this->Poll->save($this->data)) {
				$poll_id = $this->Poll->getLastInsertID();
				foreach ($poll_answer as $answer) {
					$pa = array(
						'PollAnswer' => array(
							'answer' => $answer,
							'poll_id' => $poll_id,
						),
					);

					$this->PollAnswer->create();
					if (!$this->PollAnswer->save($pa)) {
						$this->Session->setFlash('Error al guardar la respuesta a la encuesta!:S', 'default', array('class'=>'alert alert-error'));

						return $this->redirect('/poll/index');
					}
				}
				$this->Session->setFlash('Se agreg&oacute; la nueva encuesta!', 'default', array('class'=>'alert alert-success'));

				return $this->redirect('/poll/index');
			} else {
				$this->Session->setFlash('Error al guardar la nueva encuesta!:(', 'default', array('class'=>'alert alert-error'));

				return $this->redirect('/poll/index');
			}
		}
		$this->set('title_for_layout', 'Agregar Encuesta');

		return $this->render();
	}

	public function edit($id) {
		if (empty($this->data)) {
			$poll = $this->Poll->findById($id);
			if (empty($poll)) {
				$this->Session->setFlash('Numero de ID invalido!', 'default', array('class'=>'alert alert-error'));

				return $this->redirect('/poll/index');
			}

			$this->set('poll', $poll);
		}else{
			$poll_info = $this->data['Poll'];

			if (!$this->Poll->save($poll_info)) {
				$this->Session->setFlash('Hubo un error al guardar los datos! :(', 'default', array('class'=>'alert alert-error'));

				return $this->redirect('/poll/index');
			}

			$poll_answers = $this->data['PollAnswer'];

			foreach ($poll_answers as $key=>$value) {
				$a_id = str_replace('_', '', strstr($key, '_'));
				$answer = array(
					'PollAnswer' => array(
						'id' => $a_id,
						'answer' => $value,
					),
				);

				if (!$this->PollAnswer->save($answer)) {
					$this->Session->setFlash('Hubo un error al guardar los datos! :(', 'default', array('class'=>'alert alert-error'));

					return $this->redirect('/poll/index');
				}
			}

			$this->Session->setFlash('Se edit&oacute; la encuesta con &eacute;xito!', 'default', array('class'=>'alert alert-success'));

			return $this->redirect('/poll/index');
		}

	}

	public function delete($id) {
		$this->autoRender = false;
		$this->Poll->recursive = -1;
		$poll = $this->Poll->findById($id);

		if (empty($poll)) {
			$this->Session->setFlash('Numero de ID invalido!', 'default', array('class'=>'alert alert-error'));

			return $this->redirect('/poll/index');
		} else {
			$poll['Poll']['status'] = 'S';

			if ($this->Poll->save($poll)) {
				$this->Session->setFlash('Se borr&oacute; la encuesta con exito!', 'default', array('class'=>'alert alert-success'));

				return $this->redirect('/poll/index');
			} else {
				$this->Session->setFlash('Hubo un error al guardar los datos! :(', 'default', array('class'=>'alert alert-error'));

				return $this->redirect('/poll/index');
			}
		}
	}
}