<?php

class PersonalitiesController extends AppController {

	public $uses = array('Personality');

	public $name = 'Personalities';

	public function beforeFilter(){
		$user = $this->Session->read('current_user');
		if(is_null($user)){
			$this->Session->setFlash('Você precisa estar logado para acessar esta área.');
			$this->redirect('/');
		}
		if($user['User']['role'] != 'adm'){
			$this->Session->setFlash('Você não tem permissão para acessar esta área.');
			$this->redirect('/');
		}
		$this->layout = "administrativo";
	}

	public function index(){
		$user = $this->Session->read('current_user');
		$this->set('current_user', $user);
		
		$dados = $this->Personality->find('all');
		$this->set('dados', $dados);
	}

	public function create(){
		$isPost = $this->request->isPost();

		if($isPost && !empty($this->request->data)){
			$last = $this->Personality->save($this->request->data);
			if($last){
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Erro ao inserir item.');
			}
		}
	}

	public function edit(){
		$item = $this->Personality->find('first', array(
			'conditions' => array('Personality.id' => $this->request->params['pass'][0])
		));
		$this->set('item', $item);

		$isPost = $this->request->isPost();
		if($isPost && !empty($this->request->data)){
			$this->Personality->id = $this->request->params['pass'][0];
			$last = $this->Personality->save($this->request->data);
			if($last){
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Erro ao editar item.');
			}
		}
	}

	public function delete(){
		if($this->Personality->delete($this->request->params['pass'][0])){
			$this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash('Erro ao deletar item.');
		}
	}

}