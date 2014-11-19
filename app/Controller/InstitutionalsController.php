<?php

class InstitutionalsController extends AppController {

	public $uses = array('Institutional');

	public $name = 'Institutionals';

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
		
		$dados = $this->Institutional->find('all');
		$this->set('dados', $dados);
	}

	public function edit(){
		$item = $this->Institutional->find('first', array(
			'conditions' => array('Institutional.id' => $this->request->params['pass'][0])
		));
		$this->set('item', $item);

		$isPost = $this->request->isPost();
		if($isPost && !empty($this->request->data)){
			$this->Institutional->id = $this->request->params['pass'][0];
			$last = $this->Institutional->save($this->request->data);
			if($last){
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Erro ao editar item.');
			}
		}
	}

}