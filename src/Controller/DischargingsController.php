<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Dischargings Controller
 *
 * @property App\Model\Table\DischargingsTable $Dischargings
 */
class DischargingsController extends AppController {

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
		$this->paginate = [
			'contain' => ['Ports', 'PortAgents', 'Orders']
		];
		$this->set('dischargings', $this->paginate($this->Dischargings));
	}

/**
 * View method
 *
 * @param string|null $id Discharging id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function view($id = null) {
		$discharging = $this->Dischargings->get($id, [
			'contain' => ['Creators', 'Modifiers', 'Ports', 'PortAgents', 'Orders']
		]);
		$this->set('discharging', $discharging);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$discharging = $this->Dischargings->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->Dischargings->save($discharging)) {
				$this->Flash->success('The discharging has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The discharging could not be saved. Please, try again.');
			}
		}
		$creators = $this->Dischargings->Creators->find('list');
		$modifiers = $this->Dischargings->Modifiers->find('list');
		$ports = $this->Dischargings->Ports->find('list');
		$portAgents = $this->Dischargings->PortAgents->find('list');
		$orders = $this->Dischargings->Orders->find('list');
		$this->set(compact('discharging', 'creators', 'modifiers', 'ports', 'portAgents', 'orders'));
	}

/**
 * Edit method
 *
 * @param string|null $id Discharging id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function edit($id = null) {
		$discharging = $this->Dischargings->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$discharging = $this->Dischargings->patchEntity($discharging, $this->request->data);
			if ($this->Dischargings->save($discharging)) {
				$this->Flash->success('The discharging has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The discharging could not be saved. Please, try again.');
			}
		}
		$creators = $this->Dischargings->Creators->find('list');
		$modifiers = $this->Dischargings->Modifiers->find('list');
		$ports = $this->Dischargings->Ports->find('list');
		$portAgents = $this->Dischargings->PortAgents->find('list');
		$orders = $this->Dischargings->Orders->find('list');
		$this->set(compact('discharging', 'creators', 'modifiers', 'ports', 'portAgents', 'orders'));
	}

/**
 * Delete method
 *
 * @param string|null $id Discharging id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function delete($id = null) {
		$discharging = $this->Dischargings->get($id);
		$this->request->allowMethod(['post', 'delete']);
		if ($this->Dischargings->delete($discharging)) {
			$this->Flash->success('The discharging has been deleted.');
		} else {
			$this->Flash->error('The discharging could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}

}
