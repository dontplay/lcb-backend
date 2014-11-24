<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ShipmentTypes Controller
 *
 * @property App\Model\Table\ShipmentTypesTable $ShipmentTypes
 */
class ShipmentTypesController extends AppController {

/**
 * Index method
 *
 * @return void
 */
	public function index() {
		$this->paginate = [
			'contain' => ['Creators', 'Modifiers']
		];
		$this->set('shipmentTypes', $this->paginate($this->ShipmentTypes));
	}

/**
 * View method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function view($id = null) {
		$shipmentType = $this->ShipmentTypes->get($id, [
			'contain' => ['Creators', 'Modifiers']
		]);
		$this->set('shipmentType', $shipmentType);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$shipmentType = $this->ShipmentTypes->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->ShipmentTypes->save($shipmentType)) {
				$this->Flash->success('The shipment type has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The shipment type could not be saved. Please, try again.');
			}
		}
		$creators = $this->ShipmentTypes->Creators->find('list');
		$modifiers = $this->ShipmentTypes->Modifiers->find('list');
		$this->set(compact('shipmentType', 'creators', 'modifiers'));
	}

/**
 * Edit method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function edit($id = null) {
		$shipmentType = $this->ShipmentTypes->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$shipmentType = $this->ShipmentTypes->patchEntity($shipmentType, $this->request->data);
			if ($this->ShipmentTypes->save($shipmentType)) {
				$this->Flash->success('The shipment type has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The shipment type could not be saved. Please, try again.');
			}
		}
		$creators = $this->ShipmentTypes->Creators->find('list');
		$modifiers = $this->ShipmentTypes->Modifiers->find('list');
		$this->set(compact('shipmentType', 'creators', 'modifiers'));
	}

/**
 * Delete method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function delete($id = null) {
		$shipmentType = $this->ShipmentTypes->get($id);
		$this->request->allowMethod(['post', 'delete']);
		if ($this->ShipmentTypes->delete($shipmentType)) {
			$this->Flash->success('The shipment type has been deleted.');
		} else {
			$this->Flash->error('The shipment type could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}
}
