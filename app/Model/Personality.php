<?php

class Personality extends AppModel {
	
	public $hasMany = array(
		'Surveys' => array(
			'className' => 'Survey'
		)
	);

}