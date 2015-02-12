<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Loadings Controller
 *
 * @property App\Model\Table\LoadingsTable $Loadings
 */
class LoadingsController extends AppController {

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
			$this->set('loadings', $this->Loadings->find('all',['contain' => ['Ports', 'ShipmentTypes', 'PortAgents', 'LoiStatuses', 'BlStatuses', 'Orders']]));
			$this->set('_serialize', ['loadings']);
		}
		else {
			$this->paginate = [
				'contain' => ['Ports', 'ShipmentTypes', 'PortAgents', 'LoiStatuses', 'BlStatuses', 'Orders']
			];
			$this->set('loadings', $this->paginate($this->Loadings));
		}
	}

/**
 * View method
 *
 * @param string|null $id Loading id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function view($id = null) {
		$loading = $this->Loadings->get($id, [
			'contain' => ['Creators', 'Modifiers', 'Ports', 'ShipmentTypes', 'PortAgents', 'LoiStatuses', 'BlStatuses', 'Orders']
		]);
		$this->set('loading', $loading);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$loading = $this->Loadings->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->Loadings->save($loading)) {
				$this->Flash->success('The loading has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The loading could not be saved. Please, try again.');
			}
		}
		$creators = $this->Loadings->Creators->find('list');
		$modifiers = $this->Loadings->Modifiers->find('list');
		$ports = $this->Loadings->Ports->find('list');
		$shipmentTypes = $this->Loadings->ShipmentTypes->find('list');
		$portAgents = $this->Loadings->PortAgents->find('list');
		$loiStatuses = $this->Loadings->LoiStatuses->find('list');
		$blStatuses = $this->Loadings->BlStatuses->find('list');
		$orders = $this->Loadings->Orders->find('list');
		$this->set(compact('loading', 'creators', 'modifiers', 'ports', 'shipmentTypes', 'portAgents', 'loiStatuses', 'blStatuses', 'orders'));
	}

/**
 * Edit method
 *
 * @param string|null $id Loading id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function edit($id = null) {
		$loading = $this->Loadings->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$loading = $this->Loadings->patchEntity($loading, $this->request->data);
			if ($this->Loadings->save($loading)) {
				$this->Flash->success('The loading has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The loading could not be saved. Please, try again.');
			}
		}
		$creators = $this->Loadings->Creators->find('list');
		$modifiers = $this->Loadings->Modifiers->find('list');
		$ports = $this->Loadings->Ports->find('list');
		$shipmentTypes = $this->Loadings->ShipmentTypes->find('list');
		$portAgents = $this->Loadings->PortAgents->find('list');
		$loiStatuses = $this->Loadings->LoiStatuses->find('list');
		$blStatuses = $this->Loadings->BlStatuses->find('list');
		$orders = $this->Loadings->Orders->find('list');
		$this->set(compact('loading', 'creators', 'modifiers', 'ports', 'shipmentTypes', 'portAgents', 'loiStatuses', 'blStatuses', 'orders'));
	}

/**
 * Delete method
 *
 * @param string|null $id Loading id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function delete($id = null) {
		$loading = $this->Loadings->get($id);
		$this->request->allowMethod(['post', 'delete']);
		if ($this->Loadings->delete($loading)) {
			$this->Flash->success('The loading has been deleted.');
		} else {
			$this->Flash->error('The loading could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}

}
