<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * LoiStatuses Controller
 *
 * @property App\Model\Table\LoiStatusesTable $LoiStatuses
 */
class LoiStatusesController extends AppController {

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
			$this->set('loiStatuses', $this->LoiStatuses->find('all'));
			$this->set('_serialize', ['loiStatuses']);
		}
		else {
			$this->set('loiStatuses', $this->paginate($this->LoiStatuses));
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
			$loiStatus = $this->LoiStatuses->get($id);
			$this->set('loiStatus', $loiStatus);
			$this->set('_serialize', ['loiStatus']);
		} else {
			$loiStatus = $this->LoiStatuses->get($id, [
				'contain' => ['Creators', 'Modifiers']
			]);
			$this->set('loiStatus', $loiStatus);
			$this->set('_serialize', ['loiStatus']);
		}
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->params['_ext']) {
			$loiStatus = $this->LoiStatuses->newEntity($this->request->data);
			if ($this->LoiStatuses->save($loiStatus, ['validate' => false])) {
				$message = 'Saved';
			} else {
				$message = 'Error';
			}
			$this->set([
				'data' => $this->request->data,
				'message' => $message,
				'loiStatus' => $loiStatus,
				'_serialize' => ['message', 'loiStatus', 'data']
			]);
		} else {
			$loiStatus = $this->LoiStatuses->newEntity($this->request->data);
			if ($this->request->is('post')) {
				if ($this->LoiStatuses->save($loiStatus)) {
					$this->Flash->success('The loiStatus has been saved.');
					return $this->redirect(['action' => 'index']);
				} else {
					$this->Flash->error('The loiStatus could not be saved. Please, try again.');
				}
			}
			$creators = $this->LoiStatuses->Creators->find('list');
			$modifiers = $this->LoiStatuses->Modifiers->find('list');
			$this->set(compact('loiStatus', 'creators', 'modifiers'));
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
			$loiStatus = $this->LoiStatuses->get($id);
			if ($this->request->is(['patch', 'post', 'put'])) {
				$loiStatus = $this->LoiStatuses->patchEntity($loiStatus, $this->request->data);
				if ($this->LoiStatuses->save($loiStatus, ['validate' => false])) {
					$message = 'Saved';
				} else {
					$message = 'Error';
				}
			}
			$this->set([
				'loiStatus' => $loiStatus,
				'message' => $message,
				'data' => $this->request->data,
				'_serialize' => ['message','loiStatus','data']
			]);
		}
		else {
			$loiStatus = $this->LoiStatuses->get($id, [
				'contain' => []
			]);
			if ($this->request->is(['patch', 'post', 'put'])) {
				$loiStatus = $this->LoiStatuses->patchEntity($loiStatus, $this->request->data);
				if ($this->LoiStatuses->save($loiStatus)) {
					$this->Flash->success('The loiStatus has been saved.');
					return $this->redirect(['action' => 'index']);
				} else {
					$this->Flash->error('The loiStatus could not be saved. Please, try again.');
				}
			}
			$creators = $this->LoiStatuses->Creators->find('list');
			$modifiers = $this->LoiStatuses->Modifiers->find('list');
			$this->set(compact('loiStatus', 'creators', 'modifiers'));
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
			$loiStatus = $this->LoiStatuses->get($id);
			$message = 'Deleted';
			if (!$this->LoiStatuses->delete($loiStatus)) {
				$message = 'Error';
			}
			$this->set([
				'message' => $message,
				'_serialize' => ['message']
			]);
		}
		else {		
			$loiStatus = $this->LoiStatuses->get($id);
			$this->request->allowMethod(['post', 'delete']);
			if ($this->LoiStatuses->delete($loiStatus)) {
				$this->Flash->success('The loiStatus has been deleted.');
			} else {
				$this->Flash->error('The loiStatus could not be deleted. Please, try again.');
			}
			return $this->redirect(['action' => 'index']);
		}
	}
}
