<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Statuses Controller
 *
 * @property App\Model\Table\StatusesTable $Statuses
 */
class StatusesController extends AppController {

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
			$this->set('statuses', $this->Statuses->find('all'));
			$this->set('_serialize', ['statuses']);
		}
		else {
			$this->set('statuses', $this->paginate($this->Statuses));
		}
		
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
			$status = $this->Statuses->get($id);
			$this->set('status', $status);
			$this->set('_serialize', ['status']);
		} else {
			$status = $this->Statuses->get($id, [
				'contain' => ['Creators', 'Modifiers']
			]);
			$this->set('status', $status);
			$this->set('_serialize', ['status']);
		}
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->params['_ext']) {
			$status = $this->Statuses->newEntity($this->request->data);
			if ($this->Statuses->save($status, ['validate' => false])) {
				$message = 'Saved';
			} else {
				$message = 'Error';
			}
			$this->set([
				'data' => $this->request->data,
				'message' => $message,
				'status' => $status,
				'_serialize' => ['message', 'status', 'data']
			]);
		} else {
			$status = $this->Statuses->newEntity($this->request->data);
			if ($this->request->is('post')) {
				if ($this->Statuses->save($status)) {
					$this->Flash->success('The status has been saved.');
					return $this->redirect(['action' => 'index']);
				} else {
					$this->Flash->error('The status could not be saved. Please, try again.');
				}
			}
			$creators = $this->Statuses->Creators->find('list');
			$modifiers = $this->Statuses->Modifiers->find('list');
			$this->set(compact('status', 'creators', 'modifiers'));
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
			$status = $this->Statuses->get($id);
			if ($this->request->is(['patch', 'post', 'put'])) {
				$status = $this->Statuses->patchEntity($status, $this->request->data);
				if ($this->Statuses->save($status, ['validate' => false])) {
					$message = 'Saved';
				} else {
					$message = 'Error';
				}
			}
			$this->set([
				'status' => $status,
				'message' => $message,
				'data' => $this->request->data,
				'_serialize' => ['message','status','data']
			]);
		}
		else {
			$status = $this->Statuses->get($id, [
				'contain' => []
			]);
			if ($this->request->is(['patch', 'post', 'put'])) {
				$status = $this->Statuses->patchEntity($status, $this->request->data);
				if ($this->Statuses->save($status)) {
					$this->Flash->success('The status has been saved.');
					return $this->redirect(['action' => 'index']);
				} else {
					$this->Flash->error('The status could not be saved. Please, try again.');
				}
			}
			$creators = $this->Statuses->Creators->find('list');
			$modifiers = $this->Statuses->Modifiers->find('list');
			$this->set(compact('status', 'creators', 'modifiers'));
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
			$status = $this->Statuses->get($id);
			$message = 'Deleted';
			if (!$this->Statuses->delete($status)) {
				$message = 'Error';
			}
			$this->set([
				'message' => $message,
				'_serialize' => ['message']
			]);
		}
		else {		
			$status = $this->Statuses->get($id);
			$this->request->allowMethod(['post', 'delete']);
			if ($this->Statuses->delete($status)) {
				$this->Flash->success('The status has been deleted.');
			} else {
				$this->Flash->error('The status could not be deleted. Please, try again.');
			}
			return $this->redirect(['action' => 'index']);
		}
	}
}
