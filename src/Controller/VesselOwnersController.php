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
		$this->paginate = [
			'contain' => ['VesselOwnerCategories', 'VesselOwnerContacts', 'Cities']
		];
		$this->set('vesselOwners', $this->paginate($this->VesselOwners));
        $this->set('_serialize', ['vesselOwners']);
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
			//	'fields' => ['id','name','category_id', 'city_id']
			]);
			$this->set('vesselOwner', $vesselOwner);
	        $this->set('_serialize', ['vesselOwner']);
		}
		else {
			$vesselOwner = $this->VesselOwners->get($id, [
				'contain' => ['Creators', 'Modifiers', 'VesselOwnerCategories', 'VesselOwnerContacts', 'Cities', 'Vessels']
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
	        $vesselOwner = $this->VesselOwners->newEntity($this->request->data, [
	        //	'associated' => ['VesselOwnerContacts']
	        ]);
	        if ($this->VesselOwners->save($vesselOwner, ['validate' => false])) {
	            $message = 'Saved';
	        } else {
	            $message = 'Error';
	        }
	        $this->set([
	            'data' => $this->request->data,
	            'message' => $message,
	            'vesselOwner' => $vesselOwner,
	            '_serialize' => ['message', 'vesselOwner', 'data']
	        ]);
	        //debug($this->VesselOwners);
	        //debug($vesselOwner);
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
			$categories = $this->VesselOwners->Categories->find('list');
			$cities = $this->VesselOwners->Cities->find('list');
			$this->set(compact('vesselOwner', 'creators', 'modifiers', 'categories', 'cities'));
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
				'contain' => []
			]);
			if ($this->request->is(['patch', 'post', 'put'])) {
				$vesselOwner = $this->VesselOwners->patchEntity($vesselOwner, $this->request->data);
				if ($this->VesselOwners->save($vesselOwner, ['validate' => false])) {
	                $message = 'Saved';
				} else {
		            $message = 'Error';
				}
			}
	        $this->set([
	        	'vesselOwner' => $vesselOwner,
	            'message' => $message,
	            'data' => $this->request->data,
	            '_serialize' => ['message','vesselOwner','data']
	        ]);
		}
		else {
			$vesselOwner = $this->VesselOwners->get($id, [
				'contain' => []
			]);
			if ($this->request->is(['patch', 'post', 'put'])) {
				$vesselOwner = $this->VesselOwners->patchEntity($vesselOwner, $this->request->data);
				if ($this->VesselOwners->save($vesselOwner, ['validate' => false])) {
					$this->Flash->success('The vesselOwner has been saved.');
					return $this->redirect(['action' => 'index']);
				} else {
					$this->Flash->error('The vesselOwner could not be saved. Please, try again.');
				}
			}
			$creators = $this->VesselOwners->Creators->find('list');
			$modifiers = $this->VesselOwners->Modifiers->find('list');
			$categories = $this->VesselOwners->Categories->find('list');
			$cities = $this->VesselOwners->Cities->find('list');
			$this->set(compact('vesselOwner', 'creators', 'modifiers', 'categories', 'cities'));
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
