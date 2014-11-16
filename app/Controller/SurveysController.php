<?php

class SurveysController extends AppController {

	public $name = 'Surveys';
	public $uses = array('Survey', 'User', 'UserSurvey');
	public $components = array('Security');

	public function beforeFilter(){
		$this->Security->unlockActions = array('index');

		$current_user = $this->Session->read('current_user');
		if(is_null($current_user)){
			$this->redirect('/');
		}
	}

	public function index(){
		$this->layout = "institutional";

		$current_user = $this->Session->read('current_user');
		$isPost = $this->request->isPost();

		if($isPost && !empty($this->request->data)){
			$resultado = array();
			$i = 0;
			
			$this->UserSurvey->deleteAll(array('UserSurvey.user_id' => $current_user['User']['id']));

			foreach($this->request->data['Survey'] as $key => $survey){
				$survey_id = explode('_', $key);
				$question = $this->Survey->find('first', array('conditions' => array('Survey.id' => $survey_id[1])));

				$resultado[$i]['UserSurvey']['user_id'] = $current_user['User']['id'];
				$resultado[$i]['UserSurvey']['personality_id'] = $question['Survey']['personality_id'];
				$resultado[$i]['UserSurvey']['survey_id'] = $survey_id[1];
				$resultado[$i]['UserSurvey']['answer'] = $survey;
				$i++;
			}
			if($this->UserSurvey->saveAll($resultado)){
				// $this->redirect('/');
				
				// Gera resultado
				$respostas = $this->UserSurvey->find('all', array(
					'fields' => array('UserSurvey.personality_id as personality_id', 'COUNT(UserSurvey.personality_id) as count'),
					'conditions' => array('UserSurvey.user_id' => $current_user['User']['id'], 'UserSurvey.answer' => 1),
					'group' => array('UserSurvey.personality_id'),
					'order' => array('count DESC')
				));
				
				if(!empty($respostas)){
					$this->User->id = $current_user['User']['id'];
					$this->User->saveField('personality_id', $respostas[0]['UserSurvey']['personality_id']);

					$user_update = $this->User->find('first', array(
						'conditions' => array('User.id' => $current_user['User']['id'])
					));
					$this->Session->write('current_user', $user_update);

					$this->redirect(array('controller' => 'perfil', 'action' => 'index'));
				} else {
					$this->Session->setFlash('Por favor, preencha o questionário');
				}
			} else {
				$this->Session->setFlash('Erro ao gravar questionário, por favor, preencha-o novamente.');
			}
		}

		$survey = $this->Survey->find('all', array(
			'order' => 'RAND()'
		));
		$this->set('survey', $survey);
	}

}