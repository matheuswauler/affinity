<?php

class PerfilController extends AppController {

	public $name = 'Perfil';
	public $uses = array('User', 'Personalitie');

	public function beforeFilter(){
		$user = $this->Session->read('current_user');
		if(is_null($user)){
			$this->redirect('/');
		}
		if(is_null($user['User']['personality_id'])){
			$this->Session->setFlash('Preencha o questionário antes de prosseguir');
		}
		$this->layout = "perfil";
		$this->set('current_user', $user);
	}

	public function index(){
		$user = $this->Session->read('current_user');

		$personalidade = $this->Personalitie->find('first', array(
			'conditions' => array('Personalitie.id' => $user['User']['personality_id'])
		));
		$this->set('personalidade', $personalidade);

		$pessoas = $this->User->find('all', array(
			'conditions' => array(
				'User.personality_id' => $user['User']['personality_id'],
				'User.id !=' => $user['User']['id'],
			),
			'order' => 'RAND()',
			'limit' => 10
		));
		$this->set('pessoas', $pessoas);
	}

}