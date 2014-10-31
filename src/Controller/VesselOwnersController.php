<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VesselOwners Controller
 *
 * @property App\Model\Table\VesselOwnersTable $VesselOwners
 */
class VesselOwnersController extends AppController {

/**
 * Index method
 *
 * @return void
 */
	public function index() {
		$this->paginate = [
			'contain' => ['Creators', 'Modifiers', 'Categories', 'Cities']
		];
		$this->set('vesselOwners', $this->paginate($this->VesselOwners));
	}

/**
 * View method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function view($id = null) {
		$vesselOwner = $this->VesselOwners->get($id, [
			'contain' => ['Creators', 'Modifiers', 'Categories', 'Cities', 'Vessels']
		]);
		$this->set('vesselOwner', $vesselOwner);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$vesselOwner = $this->VesselOwners->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->VesselOwners->save($vesselOwner)) {
				$this->Flash->success('The vessel owner has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The vessel owner could not be saved. Please, try again.');
			}
		}
		$creators = $this->VesselOwners->Creators->find('list');
		$modifiers = $this->VesselOwners->Modifiers->find('list');
		$categories = $this->VesselOwners->Categories->find('list');
		$cities = $this->VesselOwners->Cities->find('list');
		$this->set(compact('vesselOwner', 'creators', 'modifiers', 'categories', 'cities'));
	}

/**
 * Edit method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function edit($id = null) {
		$vesselOwner = $this->VesselOwners->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$vesselOwner = $this->VesselOwners->patchEntity($vesselOwner, $this->request->data);
			if ($this->VesselOwners->save($vesselOwner)) {
				$this->Flash->success('The vessel owner has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The vessel owner could not be saved. Please, try again.');
			}
		}
		$creators = $this->VesselOwners->Creators->find('list');
		$modifiers = $this->VesselOwners->Modifiers->find('list');
		$categories = $this->VesselOwners->Categories->find('list');
		$cities = $this->VesselOwners->Cities->find('list');
		$this->set(compact('vesselOwner', 'creators', 'modifiers', 'categories', 'cities'));
	}

/**
 * Delete method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function delete($id = null) {
		$vesselOwner = $this->VesselOwners->get($id);
		$this->request->allowMethod(['post', 'delete']);
		if ($this->VesselOwners->delete($vesselOwner)) {
			$this->Flash->success('The vessel owner has been deleted.');
		} else {
			$this->Flash->error('The vessel owner could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}
}
