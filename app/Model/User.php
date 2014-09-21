<?php

class User extends AppModel {
	public $components = array('Security');

	var $validate = array(
		'password_confirm' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'required' => true,
				'message' => 'Confime sua senha.'
			),
			'minLength' => array(
				'rule' => array('minLength', 6),
				'required' => true,
				'message' => 'Sua senha precisa conter pelo menos 6 caracteres.'
			),
			'passwordConfirmation' => array(
				'rule' => array('passwordConfirmation'),
				'message' => 'As duas senhas não conferem.'
			)
		),
	);

	public function passwordConfirmation($data){
		$password = $this->data['User']['password'];
		$password_confirmation = Security::hash($this->data['User']['password_confirm'], null, true);

		if($password === $password_confirmation){
			return true;
		}else{
			return false;
		}
	}
}