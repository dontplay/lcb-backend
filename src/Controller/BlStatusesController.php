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
 * Index method
 *
 * @return void
 */
	public function index() {
		$this->paginate = [
			'contain' => ['Creators', 'Modifiers']
		];
		$this->set('blStatuses', $this->paginate($this->BlStatuses));
	}

/**
 * View method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function view($id = null) {
		$blStatus = $this->BlStatuses->get($id, [
			'contain' => ['Creators', 'Modifiers', 'Loadings']
		]);
		$this->set('blStatus', $blStatus);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$blStatus = $this->BlStatuses->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->BlStatuses->save($blStatus)) {
				$this->Flash->success('The bl status has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The bl status could not be saved. Please, try again.');
			}
		}
		$creators = $this->BlStatuses->Creators->find('list');
		$modifiers = $this->BlStatuses->Modifiers->find('list');
		$this->set(compact('blStatus', 'creators', 'modifiers'));
	}

/**
 * Edit method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function edit($id = null) {
		$blStatus = $this->BlStatuses->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$blStatus = $this->BlStatuses->patchEntity($blStatus, $this->request->data);
			if ($this->BlStatuses->save($blStatus)) {
				$this->Flash->success('The bl status has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The bl status could not be saved. Please, try again.');
			}
		}
		$creators = $this->BlStatuses->Creators->find('list');
		$modifiers = $this->BlStatuses->Modifiers->find('list');
		$this->set(compact('blStatus', 'creators', 'modifiers'));
	}

/**
 * Delete method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function delete($id = null) {
		$blStatus = $this->BlStatuses->get($id);
		$this->request->allowMethod(['post', 'delete']);
		if ($this->BlStatuses->delete($blStatus)) {
			$this->Flash->success('The bl status has been deleted.');
		} else {
			$this->Flash->error('The bl status could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}
}
