<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VesselOwnerContacts Controller
 *
 * @property App\Model\Table\VesselOwnerContactsTable $VesselOwnerContacts
 */
class VesselOwnerContactsController extends AppController {

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
			'contain' => ['Creators', 'Modifiers', 'VesselOwners']
		];
		$this->set('vesselOwnerContacts', $this->paginate($this->VesselOwnerContacts));
        $this->set('_serialize', ['vesselOwnerContacts']);
	}

/**
 * View method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function view($id = null) {
		if($this->request->params['_ext']){
			$vesselOwnerContact = $this->VesselOwnerContacts->get($id, [
			//	'fields' => ['id','name','category_id', 'city_id']
			]);
			$this->set('vesselOwnerContact', $vesselOwnerContact);
	        $this->set('_serialize', ['vesselOwnerContact']);
		}
		else {
			$vesselOwnerContact = $this->VesselOwnerContacts->get($id, [
				'contain' => ['Creators', 'Modifiers', 'VesselOwners']
			]);
			$this->set('vesselOwnerContact', $vesselOwnerContact);
		}
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$vesselOwnerContact = $this->VesselOwnerContacts->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->VesselOwnerContacts->save($vesselOwnerContact)) {
				$this->Flash->success('The vessel owner contact has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The vessel owner contact could not be saved. Please, try again.');
			}
		}
		$creators = $this->VesselOwnerContacts->Creators->find('list');
		$modifiers = $this->VesselOwnerContacts->Modifiers->find('list');
		$vesselOwners = $this->VesselOwnerContacts->VesselOwners->find('list');
		$this->set(compact('vesselOwnerContact', 'creators', 'modifiers', 'vesselOwners'));
	}

/**
 * Edit method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function edit($id = null) {
		$vesselOwnerContact = $this->VesselOwnerContacts->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$vesselOwnerContact = $this->VesselOwnerContacts->patchEntity($vesselOwnerContact, $this->request->data);
			if ($this->VesselOwnerContacts->save($vesselOwnerContact)) {
				$this->Flash->success('The vessel owner contact has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The vessel owner contact could not be saved. Please, try again.');
			}
		}
		$creators = $this->VesselOwnerContacts->Creators->find('list');
		$modifiers = $this->VesselOwnerContacts->Modifiers->find('list');
		$vesselOwners = $this->VesselOwnerContacts->VesselOwners->find('list');
		$this->set(compact('vesselOwnerContact', 'creators', 'modifiers', 'vesselOwners'));
	}

/**
 * Delete method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function delete($id = null) {
		$vesselOwnerContact = $this->VesselOwnerContacts->get($id);
		$this->request->allowMethod(['post', 'delete']);
		if ($this->VesselOwnerContacts->delete($vesselOwnerContact)) {
			$this->Flash->success('The vessel owner contact has been deleted.');
		} else {
			$this->Flash->error('The vessel owner contact could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}
}
