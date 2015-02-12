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
			$this->set('shipmentTypes', $this->ShipmentTypes->find('all'));
			$this->set('_serialize', ['shipmentTypes']);
		}
		else {
			$this->set('shipmentTypes', $this->paginate($this->ShipmentTypes));
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
			$shipmentType = $this->ShipmentTypes->get($id);
			$this->set('shipmentType', $shipmentType);
			$this->set('_serialize', ['shipmentType']);
		} else {
			$shipmentType = $this->ShipmentTypes->get($id, [
				'contain' => ['Creators', 'Modifiers']
			]);
			$this->set('shipmentType', $shipmentType);
			$this->set('_serialize', ['shipmentType']);
		}
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->params['_ext']) {
			$shipmentType = $this->ShipmentTypes->newEntity($this->request->data);
			if ($this->ShipmentTypes->save($shipmentType, ['validate' => false])) {
				$message = 'Saved';
			} else {
				$message = 'Error';
			}
			$this->set([
				'data' => $this->request->data,
				'message' => $message,
				'shipmentType' => $shipmentType,
				'_serialize' => ['message', 'shipmentType', 'data']
			]);
		} else {
			$shipmentType = $this->ShipmentTypes->newEntity($this->request->data);
			if ($this->request->is('post')) {
				if ($this->ShipmentTypes->save($shipmentType)) {
					$this->Flash->success('The shipmentType has been saved.');
					return $this->redirect(['action' => 'index']);
				} else {
					$this->Flash->error('The shipmentType could not be saved. Please, try again.');
				}
			}
			$creators = $this->ShipmentTypes->Creators->find('list');
			$modifiers = $this->ShipmentTypes->Modifiers->find('list');
			$this->set(compact('shipmentType', 'creators', 'modifiers'));
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
			$shipmentType = $this->ShipmentTypes->get($id);
			if ($this->request->is(['patch', 'post', 'put'])) {
				$shipmentType = $this->ShipmentTypes->patchEntity($shipmentType, $this->request->data);
				if ($this->ShipmentTypes->save($shipmentType, ['validate' => false])) {
					$message = 'Saved';
				} else {
					$message = 'Error';
				}
			}
			$this->set([
				'shipmentType' => $shipmentType,
				'message' => $message,
				'data' => $this->request->data,
				'_serialize' => ['message','shipmentType','data']
			]);
		}
		else {
			$shipmentType = $this->ShipmentTypes->get($id, [
				'contain' => []
			]);
			if ($this->request->is(['patch', 'post', 'put'])) {
				$shipmentType = $this->ShipmentTypes->patchEntity($shipmentType, $this->request->data);
				if ($this->ShipmentTypes->save($shipmentType)) {
					$this->Flash->success('The shipmentType has been saved.');
					return $this->redirect(['action' => 'index']);
				} else {
					$this->Flash->error('The shipmentType could not be saved. Please, try again.');
				}
			}
			$creators = $this->ShipmentTypes->Creators->find('list');
			$modifiers = $this->ShipmentTypes->Modifiers->find('list');
			$this->set(compact('shipmentType', 'creators', 'modifiers'));
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
			$shipmentType = $this->ShipmentTypes->get($id);
			$message = 'Deleted';
			if (!$this->ShipmentTypes->delete($shipmentType)) {
				$message = 'Error';
			}
			$this->set([
				'message' => $message,
				'_serialize' => ['message']
			]);
		}
		else {		
			$shipmentType = $this->ShipmentTypes->get($id);
			$this->request->allowMethod(['post', 'delete']);
			if ($this->ShipmentTypes->delete($shipmentType)) {
				$this->Flash->success('The shipmentType has been deleted.');
			} else {
				$this->Flash->error('The shipmentType could not be deleted. Please, try again.');
			}
			return $this->redirect(['action' => 'index']);
		}
	}
}
