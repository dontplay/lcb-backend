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
 * Index method
 *
 * @return void
 */
	public function index() {
		$this->paginate = [
			'contain' => ['Creators', 'Modifiers']
		];
		$this->set('loiStatuses', $this->paginate($this->LoiStatuses));
	}

/**
 * View method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function view($id = null) {
		$loiStatus = $this->LoiStatuses->get($id, [
			'contain' => ['Creators', 'Modifiers', 'Loadings']
		]);
		$this->set('loiStatus', $loiStatus);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$loiStatus = $this->LoiStatuses->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->LoiStatuses->save($loiStatus)) {
				$this->Flash->success('The loi status has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The loi status could not be saved. Please, try again.');
			}
		}
		$creators = $this->LoiStatuses->Creators->find('list');
		$modifiers = $this->LoiStatuses->Modifiers->find('list');
		$this->set(compact('loiStatus', 'creators', 'modifiers'));
	}

/**
 * Edit method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function edit($id = null) {
		$loiStatus = $this->LoiStatuses->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$loiStatus = $this->LoiStatuses->patchEntity($loiStatus, $this->request->data);
			if ($this->LoiStatuses->save($loiStatus)) {
				$this->Flash->success('The loi status has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The loi status could not be saved. Please, try again.');
			}
		}
		$creators = $this->LoiStatuses->Creators->find('list');
		$modifiers = $this->LoiStatuses->Modifiers->find('list');
		$this->set(compact('loiStatus', 'creators', 'modifiers'));
	}

/**
 * Delete method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function delete($id = null) {
		$loiStatus = $this->LoiStatuses->get($id);
		$this->request->allowMethod(['post', 'delete']);
		if ($this->LoiStatuses->delete($loiStatus)) {
			$this->Flash->success('The loi status has been deleted.');
		} else {
			$this->Flash->error('The loi status could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}
}
