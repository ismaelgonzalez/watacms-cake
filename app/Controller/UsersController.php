<?php
class UsersController extends AppController
{
	public $uses = array('User');

	var $components = array(
		'Auth' => array(
			'authorize' => array('Controller'),
			'authenticate' => array(
				'Form' => array(
					'fields' => array(
						'username' => 'email',
						'password' => 'password'
					),
				),
			),
		),
		'Session'
	);

	public $helpers = array('Paginator', 'Js');

	public $paginate = array(
		'conditions' => array(
			'User.status' => 'A',
		),
		'limit' => '10',
		'order' => array(
			'User.id' => 'DESC'
		),
	);

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('login', 'logout');
	}

	public function isAuthorized($user) {
		if ($this->action === 'add' || $this->action === 'delete') {
			return parent::isAuthorized($user);
		}

		return true;
	}

	public function index() {
		$users = $this->paginate('User');

		$this->set('title_for_layout', 'Administración de Usuarios');
		$this->set('users', $users);
	}

	public function login() {
		$this->layout = 'login';

		if($this->request->is('post')) {
			if ($this->Auth->login()) {

				return $this->redirect($this->Auth->redirect());
			}
			$this->Session->setFlash(__('Email o passowrd incorrectos, por favor intente de nuevo.'), 'default', array('class' => 'alert alert-error'));
		}

		$this->set('title_for_layout', 'Accesa a tu cuenta');
	}

	public function logout() {
		return $this->redirect($this->Auth->logout());
	}

	public function add() {
		if (!empty($this->data)) {
			$this->User->create();
			if ($this->User->save($this->data)) {
				$this->Session->setFlash('Se agreg&oacute; el nuevo usuario!', 'default', array('class' => 'alert alert-success'));

				return $this->redirect('/users');
			}

			$this->Session->setFlash('No se pudo agregar al usuario, intente de nuevo :(', 'default', array('class' => 'alert alert-error'));
		}

		$this->set('title_for_layout', 'Agregar Usuarios');
	}

	public function edit($id) {
		if ($id != $this->Auth->user('id') && $this->Auth->user('role') != 'admin') {
			$this->Session->setFlash('No tienes autorizacion para editar este perfil, folo el tuyo', 'default', array('class' => 'alert alert-error'));

			return $this->redirect('/users');
		}

		//aqui ya se edita tu perfil
		if (!empty($this->data)) {
			//update profile
			if (isset($this->data['User']['first_name'])) {
				if ($this->User->save($this->data)) {
					$this->Session->setFlash('Se actualiz&oacute; el perfil de usuario!', 'default', array('class' => 'alert alert-success'));

					return $this->redirect('/users');
				}
			}
			//update password
			if (isset($this->data['User']['password'])) {
				if ($this->User->save($this->data)) {
					$this->Session->setFlash('Se actualiz&oacute; la contraseña!', 'default', array('class' => 'alert alert-success'));

					return $this->redirect('/users');
				} else {
					$this->Session->setFlash('Hubo un error al guardar tu contraseña! Revisa el tab de Cambiar Contraseña', 'default', array('class' => 'alert alert-error'));
				}
			}
		}

		//default stuff
		$user = $this->User->findById($id);
		$this->set('user', $user);
		$this->set('title_for_layout', 'Administración de Usuarios');
	}

	public function delete($id) {
		$this->autoRender = false;

		$user = $this->User->findById($id);

		if ($user) {
			$del_user['User']['status'] = 'S';
			$del_user['User']['id'] = $user['User']['id'];
			$this->User->save($del_user);

			$this->Session->setFlash('Se dio de baja al usuario con éxito!', 'default', array('class' => 'alert alert-success'));

			return $this->redirect('/users');
		}


	}
}