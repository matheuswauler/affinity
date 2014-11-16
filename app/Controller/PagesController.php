<?php
App::uses('AppController', 'Controller');

class PagesController extends AppController {

	public $uses = array('Page', 'User');

	public function beforeFilter(){
		$user = $this->Session->read('current_user');
		if(!is_null($user)){
			$this->redirect(array('controller' => 'perfil', 'action' => 'index'));
		}
	}

	public function display() {
		$this->layout = "institutional";

		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		$pages = $this->Page->find('all', array(
			'order' => array('Page.id ASC')
		));
		$this->set('pages', $pages);

		$adm_users = $this->User->find('all', array(
			'conditions' => array('User.role' => 'adm')
		));
		$this->set('adm_users', $adm_users);

		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}
}