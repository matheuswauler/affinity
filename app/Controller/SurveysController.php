<?php

class SurveysController extends AppController {

	public $name = 'Surveys';
	public $uses = array('Survey', 'User');
	public $components = array('Security');

	public function beforeFilter(){
		$this->Security->unlockActions = array('index');
	}

	public function index(){
		$this->layout = "institutional";
	}

}