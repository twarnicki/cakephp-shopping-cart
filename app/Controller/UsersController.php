<?php
App::uses('AppController', 'Controller');
class UsersController extends AppController {

////////////////////////////////////////////////////////////

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('login');
	}

////////////////////////////////////////////////////////////

	public function login() {
		if ($this->request->is('post')) {
			if($this->Auth->login()) {
				return $this->redirect($this->Auth->redirect());
			} else {
				$this->Session->setFlash('Login is incorrect');
			}
		}
	}

////////////////////////////////////////////////////////////

	public function logout() {
		$this->Session->setFlash('Good-Bye');
		return $this->redirect($this->Auth->logout());
	}

////////////////////////////////////////////////////////////

	public function admin_dashboard() {
	}

////////////////////////////////////////////////////////////

	public function admin_index() {
		$this->Paginator->settings = array(
			'User' => array(
				'recursive' => -1,
				'contain' => array(
				),
				'conditions' => array(
				),
				'order' => array(
					'Users.name' => 'ASC'
				),
				'limit' => 20,
				'paramType' => 'querystring',
			)
		);
		$users = $this->Paginator->paginate();
		$this->set(compact('users'));
	}

////////////////////////////////////////////////////////////

	public function admin_view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException('Invalid user');
		}
		$this->set('user', $this->User->read(null, $id));
	}

////////////////////////////////////////////////////////////

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('The user has been saved');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The user could not be saved. Please, try again.');
			}
		}
	}

////////////////////////////////////////////////////////////

	public function admin_edit($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException('Invalid user');
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('The user has been saved');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The user could not be saved. Please, try again.');
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
	}

////////////////////////////////////////////////////////////

	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException('Invalid user');
		}
		if ($this->User->delete()) {
			$this->Session->setFlash('User deleted');
			return $this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash('User was not deleted');
		return $this->redirect(array('action' => 'index'));
	}

////////////////////////////////////////////////////////////

}
