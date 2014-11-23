<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Orders Controller
 *
 * @property App\Model\Table\OrdersTable $Orders
 */
class OrdersController extends AppController {

/**
 * Index method
 *
 * @return void
 */
	public function index() {
		$this->paginate = [
			'contain' => ['Creators', 'Modifiers', 'Customers', 'VesselOwners', 'Statuses', 'Vessels']
		];
		$this->set('orders', $this->paginate($this->Orders));
	}

/**
 * View method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function view($id = null) {
		$order = $this->Orders->get($id, [
			'contain' => ['Creators', 'Modifiers', 'Customers', 'VesselOwners', 'Statuses', 'Vessels', 'Dischargings', 'Invoices', 'Loadings']
		]);
		$this->set('order', $order);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$order = $this->Orders->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->Orders->save($order)) {
				$this->Flash->success('The order has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The order could not be saved. Please, try again.');
			}
		}
		$creators = $this->Orders->Creators->find('list');
		$modifiers = $this->Orders->Modifiers->find('list');
		$customers = $this->Orders->Customers->find('list');
		$vesselOwners = $this->Orders->VesselOwners->find('list');
		$statuses = $this->Orders->Statuses->find('list');
		$vessels = $this->Orders->Vessels->find('list');
		$this->set(compact('order', 'creators', 'modifiers', 'customers', 'vesselOwners', 'statuses', 'vessels'));
	}

/**
 * Edit method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function edit($id = null) {
		$order = $this->Orders->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$order = $this->Orders->patchEntity($order, $this->request->data);
			if ($this->Orders->save($order)) {
				$this->Flash->success('The order has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The order could not be saved. Please, try again.');
			}
		}
		$creators = $this->Orders->Creators->find('list');
		$modifiers = $this->Orders->Modifiers->find('list');
		$customers = $this->Orders->Customers->find('list');
		$vesselOwners = $this->Orders->VesselOwners->find('list');
		$statuses = $this->Orders->Statuses->find('list');
		$vessels = $this->Orders->Vessels->find('list');
		$this->set(compact('order', 'creators', 'modifiers', 'customers', 'vesselOwners', 'statuses', 'vessels'));
	}

/**
 * Delete method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function delete($id = null) {
		$order = $this->Orders->get($id);
		$this->request->allowMethod(['post', 'delete']);
		if ($this->Orders->delete($order)) {
			$this->Flash->success('The order has been deleted.');
		} else {
			$this->Flash->error('The order could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}
}
