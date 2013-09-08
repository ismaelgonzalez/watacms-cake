<?php
class PollAnswerController extends AppController {
	public $uses = array('Poll', 'PollAnswer');

	public $components = array('Session');

	public $helpers = array('Paginator', 'Js');

	public function index(){
		$this->autoRender = false;
		return $this->redirect('/poll/index');
	}

	public function edit($poll_id){
		if(empty($this->data)){
			$poll_answer = $this->PollAnswer->findAllByPollId($poll_id);
			$poll = $this->Poll->findById($poll_id);

			if(empty($poll_answer)) {
				$this->Session->setFlash('Numero de ID invalido!', 'default', array('class'=>'alert alert-error'));

				return $this->redirect('/poll/index');
			}

			$this->set('answers', $poll_answer);
			$this->set('poll', $poll);
		} else {
			//we have a post
		}
	}

}