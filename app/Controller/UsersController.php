<?php

class UsersController extends AppController {

	public $name = 'Users';
	public $uses = array('User');
	public $components = array('Security');

	public function beforeFilter(){
		$this->Security->unlockActions = array('register', 'perfil');
	}

	public function register(){
		$this->layout = "institutional";

		$isPost = $this->request->isPost();

		if($isPost && !empty($this->request->data)){
			$this->request->data['User']['password'] = Security::hash($this->request->data['User']['password'], null, true);
			$this->request->data['User']['role'] = 'nor';
			$last = $this->User->save($this->request->data);
			if($last){
				$this->redirect(array('action' => 'perfil'));
			} else {
				//'erro'
			}
		}
	}

	public function perfil(){
		$this->layout = "institutional";
	}
}