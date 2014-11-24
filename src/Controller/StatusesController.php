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
 * Index method
 *
 * @return void
 */
	public function index() {
		$this->paginate = [
			'contain' => ['Creators', 'Modifiers']
		];
		$this->set('statuses', $this->paginate($this->Statuses));
	}

/**
 * View method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function view($id = null) {
		$status = $this->Statuses->get($id, [
			'contain' => ['Creators', 'Modifiers', 'Orders']
		]);
		$this->set('status', $status);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
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

/**
 * Edit method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function edit($id = null) {
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

/**
 * Delete method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function delete($id = null) {
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
