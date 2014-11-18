<?php

class UsersController extends AppController {

	public $name = 'Users';
	public $uses = array('User');
	public $components = array('Security');

	public function beforeFilter(){
		$this->Security->unlockActions = array('login', 'register', 'perfil');
		$this->Security->allowedControllers = array('Pages');
		$this->Security->allowedActions = array('display');
		$this->Security->validatePost = false;
		$this->Security->enabled = false;
		$this->Security->csrfCheck = false;
	}

	public function login(){
		if(!empty($this->request->data['Page']['username']) && !empty($this->request->data['Page']['senha'])){
			$user = $this->User->find('first', array(
				'conditions' => array(
					'User.username' => $this->request->data['Page']['username'],
					'User.password' => $password_confirmation = Security::hash($this->request->data['Page']['senha'], null, true)
				)
			));
			if(!empty($user)){
				$this->Session->write('current_user', $user);
				if($user['User']['role'] == "adm"){
					$this->redirect(array('controller' => 'Personalities', 'action' => 'index'));
				} else {
					$this->redirect('/');
				}
			} else {
				$this->Session->setFlash('Usuário inválido!');
				$this->redirect('/');
			}
		} else {
			$this->Session->setFlash('Preencha os dados corretamente!');
			$this->redirect('/');
		}
	}
	public function logout(){
		$this->Session->delete('current_user');
		$this->redirect('/');
	}

	public function register(){
		$this->layout = "institutional";

		$isPost = $this->request->isPost();

		if($isPost && !empty($this->request->data)){
			$this->request->data['User']['password'] = Security::hash($this->request->data['User']['password'], null, true);
			$this->request->data['User']['role'] = 'nor';
			$last = $this->User->save($this->request->data);
			if($last){
				$current_user = $this->User->find('first', array('conditions' => array('User.id' => $this->User->id)));
				$this->Session->write('current_user', $current_user);
				$this->redirect(array('action' => 'perfil'));
			} else {
				//'erro'
			}
		}
	}

	public function perfil(){
		$this->layout = "institutional";

		$current_user = $this->Session->read('current_user');
		if(is_null($current_user)){
			$this->redirect('/');
		}

		$isPost = $this->request->isPost();
		if($isPost && !empty($this->request->data)){
			if(!empty($this->request->data['User']['imagem_perfil']['name'])){
				$nome_imagem = $this->User->upload($this->request->data['User']['imagem_perfil'], 'img/perfil');

				$this->User->id = $current_user['User']['id'];
				if($this->User->saveField('imagem_perfil', $nome_imagem)){
					$current_user = $this->User->find('first', array('conditions' => array('User.id' => $current_user['User']['id'])));
					$this->Session->write('current_user', $current_user);

					$this->redirect(array('controller' => 'Surveys', 'action' => 'index'));
				} else {
					$this->Session->setFlash("Erro ao salvar");
				}
			} else {
				$this->Session->setFlash("Insira uma imagem para upload");
			}
		}
	}

	public function minha_conta(){
		$this->layout = "perfil";
		$user = $this->Session->read('current_user');
		if(is_null($user)){
			$this->redirect(array('controller' => 'perfil', 'action' => 'index'));
		}

		$this->set('current_user', $user);

		$isPost = $this->request->isPost();
		if($isPost && !empty($this->request->data)){
			$this->request->data['User']['id'] = $user['User']['id'];
			$this->request->data['User']['password'] = Security::hash($this->request->data['User']['password'], null, true);
			$this->User->id = $user['User']['id'];
			if($this->User->save($this->request->data)){
				$current_user = $this->User->find('first', array('conditions' => array('User.id' => $user['User']['id'])));
				$this->Session->write('current_user', $current_user);

				$this->redirect(array('controller' => 'perfil', 'action' => 'index'));
			} else {
				$this->Session->setFlash("Erro ao salvar");
			}
		}
	}

	public function alterar_perfil(){
		$this->layout = "perfil";

		$current_user = $this->Session->read('current_user');
		if(is_null($current_user)){
			$this->redirect('/');
		}

		$this->set('current_user', $current_user);

		$isPost = $this->request->isPost();
		if($isPost && !empty($this->request->data)){
			if(!empty($this->request->data['User']['imagem_perfil']['name'])){
				$nome_imagem = $this->User->upload($this->request->data['User']['imagem_perfil'], 'img/perfil');

				$this->User->id = $current_user['User']['id'];
				if($this->User->saveField('imagem_perfil', $nome_imagem)){
					$current_user = $this->User->find('first', array('conditions' => array('User.id' => $current_user['User']['id'])));
					$this->Session->write('current_user', $current_user);

					$this->redirect(array('controller' => 'Perfil', 'action' => 'index'));
				} else {
					$this->Session->setFlash("Erro ao salvar");
				}
			} else {
				$this->Session->setFlash("Insira uma imagem para upload");
			}
		}
	}
}