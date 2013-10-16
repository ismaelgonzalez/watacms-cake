<?php
App::uses('AuthComponent', 'Controller/Component');
class User extends AppModel
{
	public $useTable = 'user';

	public $validate = array(
		'email' => array(
			'required' => array(
				'rule' => 'notEmpty',
				'message' => 'El email es requerido'
			),
			'email' => array(
				'rule' => 'email',
				'message' => 'La dirección de Email tiene que ser válida',
			),
			'unique' => array(
				'rule' => 'isUnique',
				'message' => 'Esta dirección de correo ya se usó!',
				'on' => 'create'
			),
		),
		'password' => array(
			'required' => array(
				'rule' => 'notEmpty',
				'message' => 'Tu clave de acceso es requerida'
			),
			'minLength' => array(
				'rule' => array('minLength', 6),
				'message' => 'La contraseña debe contener por lo menos 6 caracteres.'
			),
		),
		'role' => array(
			'valid' => array(
				'rule' => array('inList', array('admin', 'author')),
				'message' => 'Por favor eliga un rol valido',
				'allowEmpty' => false
			),
		),
		'repass' => array(
			'equaltofield' => array(
				'rule' => array('checkpasswords', 'password'),
				'message' => 'Las contraseñas no concuerdan!',
				'on' => 'update',
			),
		),
	);

	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
	}

	public function checkpasswords() {
		if (strcmp($this->data['User']['password'], $this->data['User']['repass']) == 0) {

			return true;
		}

		return false;
	}
}