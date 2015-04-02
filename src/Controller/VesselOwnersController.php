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
			$this->set('vesselOwners', $this->VesselOwners->find('all',['contain' => ['VesselOwnerContacts', 'Cities'],'order'=>['VesselOwners.name']]));
			$this->set('_serialize', ['vesselOwners']);
		}
		else {
			$this->paginate = [
				'contain' => ['VesselOwnerContacts', 'Cities']
			];
			$this->set('vesselOwners', $this->paginate($this->VesselOwners));
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
		if($this->request->params['_ext']){
			$vesselOwner = $this->VesselOwners->get($id, [
				'contain' => ['VesselOwnerContacts']
			]);
			$this->set('vesselOwner', $vesselOwner);
			$this->set('_serialize', ['vesselOwner']);
		}
		else {
			$vesselOwner = $this->VesselOwners->get($id, [
				'contain' => ['Creators', 'Modifiers', 'VesselOwnerContacts', 'Cities', 'Vessels']
			]);
			$this->set('vesselOwner', $vesselOwner);
		}
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		if($this->request->params['_ext']){
			$vesselOwner = $this->VesselOwners->newEntity($this->request->data);
			if ($this->VesselOwners->save($vesselOwner)) {
				$message = 'Saved';
			} else {
				$message = 'Error';
				$error = $vesselOwner->errors();
			}
			$this->set([
				'data' => $this->request->data,
				'message' => $message,
				'vesselOwner' => $vesselOwner,
				'error' => $error,
				'_serialize' => ['message', 'vesselOwner', 'data','error']
			]);
		}
		else {
			$vesselOwner = $this->VesselOwners->newEntity($this->request->data);
			if ($this->request->is('post')) {
				if ($this->VesselOwners->save($vesselOwner)) {
					$this->Flash->success('The vesselOwner has been saved.');
					return $this->redirect(['action' => 'index']);
				} else {
					$this->Flash->error('The vesselOwner could not be saved. Please, try again.');
				}
			}
			$creators = $this->VesselOwners->Creators->find('list');
			$modifiers = $this->VesselOwners->Modifiers->find('list');
			$cities = $this->VesselOwners->Cities->find('list');
			$this->set(compact('vesselOwner', 'creators', 'modifiers', 'cities'));
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
		if($this->request->params['_ext']){
			$vesselOwner = $this->VesselOwners->get($id, [
				'contain' => ['VesselOwnerContacts']
			]);
			if ($this->request->is(['patch', 'post', 'put'])) {
				$vesselOwner = $this->VesselOwners->patchEntity($vesselOwner, $this->request->data);
				if ($this->VesselOwners->save($vesselOwner)) {
					$message = 'Saved';
				}
				else {
					$message = 'Error';
					$error = $vesselOwner->errors();
				}
			}
			$this->set([
				'vesselOwner' => $vesselOwner,
				'message' => $message,
				'data' => $this->request->data,
				'error' => $error,
				'_serialize' => ['message','vesselOwner','data','error']
			]);
		}
		else {
			$vesselOwner = $this->VesselOwners->get($id, [
				'contain' => ['VesselOwnerContacts']
			]);
			if ($this->request->is(['patch', 'post', 'put'])) {
				$vesselOwner = $this->VesselOwners->patchEntity($vesselOwner, $this->request->data, ['validate' => false]);
				if ($this->VesselOwners->save($vesselOwner)) {
					$this->Flash->success('The vesselOwner has been saved.');
					return $this->redirect(['action' => 'index']);
				} else {
					$this->Flash->error('The vesselOwner could not be saved. Please, try again.');
				}
			}
			$creators = $this->VesselOwners->Creators->find('list');
			$modifiers = $this->VesselOwners->Modifiers->find('list');
			$cities = $this->VesselOwners->Cities->find('list');
			$this->set(compact('vesselOwner', 'creators', 'modifiers','cities'));
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
		if($this->request->params['_ext']){
			$vesselOwner = $this->VesselOwners->get($id);
			$message = 'Deleted';
			if (!$this->VesselOwners->delete($vesselOwner)) {
				$message = 'Error';
			}
			$this->set([
				'message' => $message,
				'_serialize' => ['message']
			]);
		}
		else {		
			$vesselOwner = $this->VesselOwners->get($id);
			$this->request->allowMethod(['post', 'delete']);
			if ($this->VesselOwners->delete($vesselOwner)) {
				$this->Flash->success('The vesselOwner has been deleted.');
			} else {
				$this->Flash->error('The vesselOwner could not be deleted. Please, try again.');
			}
			return $this->redirect(['action' => 'index']);
		}
	}
}
