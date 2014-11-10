<?php

class SurveysController extends AppController {

	public $name = 'Surveys';
	public $uses = array('Survey', 'User');
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

		$survey = $this->Survey->find('all', array(
			'order' => 'RAND()'
		));

		$this->set('survey', $survey);
	}

}