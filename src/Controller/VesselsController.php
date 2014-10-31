<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Vessels Controller
 *
 * @property App\Model\Table\VesselsTable $Vessels
 */
class VesselsController extends AppController {

/**
 * Initialize method
 *
 * @return void
 */

	public function initialize() {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

/**
 * Index method
 *
 * @return void
 */

	public function index() {
		$this->paginate = [
			'contain' => ['Creators', 'Modifiers', 'VesselOwners']
		];
		$this->set('vessels', $this->paginate($this->Vessels));
        $this->set('_serialize', ['vessels']);
    }

/**
 * View method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function view($id = null) {
		$vessel = $this->Vessels->get($id, [
			'contain' => ['Creators', 'Modifiers', 'VesselOwners']
		]);
		$this->set('vessel', $vessel);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$vessel = $this->Vessels->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->Vessels->save($vessel)) {
				$this->Flash->success('The vessel has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The vessel could not be saved. Please, try again.');
			}
		}
		$creators = $this->Vessels->Creators->find('list');
		$modifiers = $this->Vessels->Modifiers->find('list');
		$vesselOwners = $this->Vessels->VesselOwners->find('list');
		$this->set(compact('vessel', 'creators', 'modifiers', 'vesselOwners'));
	}

/**
 * Edit method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function edit($id = null) {
		$vessel = $this->Vessels->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$vessel = $this->Vessels->patchEntity($vessel, $this->request->data);
			if ($this->Vessels->save($vessel)) {
				$this->Flash->success('The vessel has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The vessel could not be saved. Please, try again.');
			}
		}
		$creators = $this->Vessels->Creators->find('list');
		$modifiers = $this->Vessels->Modifiers->find('list');
		$vesselOwners = $this->Vessels->VesselOwners->find('list');
		$this->set(compact('vessel', 'creators', 'modifiers', 'vesselOwners'));
	}

/**
 * Delete method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function delete($id = null) {
		$vessel = $this->Vessels->get($id);
		$this->request->allowMethod(['post', 'delete']);
		if ($this->Vessels->delete($vessel)) {
			$this->Flash->success('The vessel has been deleted.');
		} else {
			$this->Flash->error('The vessel could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}
}
