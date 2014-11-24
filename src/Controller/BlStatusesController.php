<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * BlStatuses Controller
 *
 * @property App\Model\Table\BlStatusesTable $BlStatuses
 */
class BlStatusesController extends AppController {

/**
 * Initialize method
 *
 * @return void
 */
	public function initialize() {
		parent::initialize();
		$this->loadComponent('RequestHandler');
		$this->response->header('Access-Control-Allow-Origin', '*');
		$this->response->header('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE');
	}

/**
 * Index method
 *
 * @return void
 */
	public function index() {
		if ($this->request->params['_ext']) {
			$conditions = [
			//	'fields' => ['BlStatuses.id', 'BlStatuses.name']
			];
			$this->set('blStatuses', $this->BlStatuses->find('all', $conditions));
		}
		else {
			$this->set('blStatuses', $this->BlStatuses->find('all'));
		}
		$this->set('_serialize', ['blStatuses']);
	}

/**
 * View method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function view($id = null) {
		if ($this->request->params['_ext']) {
			$blStatus = $this->BlStatuses->get($id);
			$this->set('blStatus', $blStatus);
			$this->set('_serialize', ['blStatus']);
		} else {
			$blStatus = $this->BlStatuses->get($id, [
				'contain' => ['Creators', 'Modifiers']
			]);
			$this->set('blStatus', $blStatus);
			$this->set('_serialize', ['blStatus']);
		}
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->params['_ext']) {
			$blStatus = $this->BlStatuses->newEntity($this->request->data);
			if ($this->BlStatuses->save($blStatus, ['validate' => false])) {
				$message = 'Saved';
			} else {
				$message = 'Error';
			}
			$this->set([
				'data' => $this->request->data,
				'message' => $message,
				'blStatus' => $blStatus,
				'_serialize' => ['message', 'blStatus', 'data']
			]);
		} else {
			$blStatus = $this->BlStatuses->newEntity($this->request->data);
			if ($this->request->is('post')) {
				if ($this->BlStatuses->save($blStatus)) {
					$this->Flash->success('The blStatus has been saved.');
					return $this->redirect(['action' => 'index']);
				} else {
					$this->Flash->error('The blStatus could not be saved. Please, try again.');
				}
			}
			$creators = $this->BlStatuses->Creators->find('list');
			$modifiers = $this->BlStatuses->Modifiers->find('list');
			$this->set(compact('blStatus', 'creators', 'modifiers'));
		}
	}

/**
 * Edit method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function edit($id = null) {
		if ($this->request->params['_ext']) {
			$blStatus = $this->BlStatuses->get($id);
			if ($this->request->is(['patch', 'post', 'put'])) {
				$blStatus = $this->BlStatuses->patchEntity($blStatus, $this->request->data);
				if ($this->BlStatuses->save($blStatus, ['validate' => false])) {
					$message = 'Saved';
				} else {
					$message = 'Error';
				}
			}
			$this->set([
				'blStatus' => $blStatus,
				'message' => $message,
				'data' => $this->request->data,
				'_serialize' => ['message','blStatus','data']
			]);
		}
		else {
			$blStatus = $this->BlStatuses->get($id, [
				'contain' => []
			]);
			if ($this->request->is(['patch', 'post', 'put'])) {
				$blStatus = $this->BlStatuses->patchEntity($blStatus, $this->request->data);
				if ($this->BlStatuses->save($blStatus)) {
					$this->Flash->success('The blStatus has been saved.');
					return $this->redirect(['action' => 'index']);
				} else {
					$this->Flash->error('The blStatus could not be saved. Please, try again.');
				}
			}
			$creators = $this->BlStatuses->Creators->find('list');
			$modifiers = $this->BlStatuses->Modifiers->find('list');
			$this->set(compact('blStatus', 'creators', 'modifiers'));
		}
	}

/**
 * Delete method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function delete($id = null) {
		if ($this->request->params['_ext']) {
			$blStatus = $this->BlStatuses->get($id);
			$message = 'Deleted';
			if (!$this->BlStatuses->delete($blStatus)) {
				$message = 'Error';
			}
			$this->set([
				'message' => $message,
				'_serialize' => ['message']
			]);
		}
		else {		
			$blStatus = $this->BlStatuses->get($id);
			$this->request->allowMethod(['post', 'delete']);
			if ($this->BlStatuses->delete($blStatus)) {
				$this->Flash->success('The blStatus has been deleted.');
			} else {
				$this->Flash->error('The blStatus could not be deleted. Please, try again.');
			}
			return $this->redirect(['action' => 'index']);
		}
	}
}
