<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VesselOwnerCategories Controller
 *
 * @property App\Model\Table\VesselOwnerCategoriesTable $VesselOwnerCategories
 */
class VesselOwnerCategoriesController extends AppController {

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
			'contain' => ['Creators', 'Modifiers']
		];
		$this->set('vesselOwnerCategories', $this->paginate($this->VesselOwnerCategories));
        $this->set('_serialize', ['vesselOwnerCategories']);
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
			$vesselOwnerCategory = $this->VesselOwnerCategories->get($id, [
			//	'fields' => ['id','name','category_id', 'city_id']
			]);
			$this->set('vesselOwnerCategory', $vesselOwnerCategory);
	        $this->set('_serialize', ['vesselOwnerCategory']);
		}
		else {
			$vesselOwnerCategory = $this->VesselOwnerCategories->get($id, [
				'contain' => ['Creators', 'Modifiers', 'VesselOwners']
			]);
			$this->set('vesselOwnerCategory', $vesselOwnerCategory);
		}
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		if($this->request->params['_ext']){
	        $vesselOwnerCategory = $this->VesselOwnerCategories->newEntity($this->request->data);
	        if ($this->VesselOwnerCategories->save($vesselOwnerCategory, ['validate' => false])) {
	            $message = 'Saved';
	        } else {
	            $message = 'Error';
	        }
	        $this->set([
	            'data' => $this->request->data,
	            'message' => $message,
	            'vesselOwnerCategory' => $vesselOwnerCategory,
	            '_serialize' => ['message', 'vesselOwnerCategory', 'data']
	        ]);
		}
		else {
			$vesselOwnerCategory = $this->VesselOwnerCategories->newEntity($this->request->data);
			if ($this->request->is('post')) {
				if ($this->VesselOwnerCategories->save($vesselOwnerCategory)) {
					$this->Flash->success('The vesselOwnerCategory has been saved.');
					return $this->redirect(['action' => 'index']);
				} else {
					$this->Flash->error('The vesselOwnerCategory could not be saved. Please, try again.');
				}
			}
			$creators = $this->VesselOwnerCategories->Creators->find('list');
			$modifiers = $this->VesselOwnerCategories->Modifiers->find('list');
			$this->set(compact('vesselOwnerCategory', 'creators', 'modifiers'));
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
			$vesselOwnerCategory = $this->VesselOwnerCategories->get($id, [
				'contain' => []
			]);
			if ($this->request->is(['patch', 'post', 'put'])) {
				$vesselOwnerCategory = $this->VesselOwnerCategories->patchEntity($vesselOwnerCategory, $this->request->data);
				if ($this->VesselOwnerCategories->save($vesselOwnerCategory, ['validate' => false])) {
	                $message = 'Saved';
				} else {
		            $message = 'Error';
				}
			}
	        $this->set([
	            'vesselOwnerCategory' => $vesselOwnerCategory,
	            'message' => $message,
	            'data' => $this->request->data,
	            '_serialize' => ['message','vesselOwnerCategory','data']
	        ]);
		}
		else {
			$vesselOwnerCategory = $this->VesselOwnerCategories->get($id, [
				'contain' => []
			]);
			if ($this->request->is(['patch', 'post', 'put'])) {
				$vesselOwnerCategory = $this->VesselOwnerCategories->patchEntity($vesselOwnerCategory, $this->request->data);
				if ($this->VesselOwnerCategories->save($vesselOwnerCategory)) {
					$this->Flash->success('The vessel owner category has been saved.');
					return $this->redirect(['action' => 'index']);
				} else {
					$this->Flash->error('The vessel owner category could not be saved. Please, try again.');
				}
			}
			$creators = $this->VesselOwnerCategories->Creators->find('list');
			$modifiers = $this->VesselOwnerCategories->Modifiers->find('list');
			$this->set(compact('vesselOwnerCategory', 'creators', 'modifiers'));
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
	        $vesselOwnerCategory = $this->VesselOwnerCategories->get($id);
	        $message = 'Deleted';
	        if (!$this->VesselOwnerCategories->delete($vesselOwnerCategory)) {
	            $message = 'Error';
	        }
	        $this->set([
	            'message' => $message,
	            '_serialize' => ['message']
	        ]);
		}
		else {		
			$vesselOwnerCategory = $this->VesselOwnerCategories->get($id);
			$this->request->allowMethod(['post', 'delete']);
			if ($this->VesselOwnerCategories->delete($vesselOwnerCategory)) {
				$this->Flash->success('The vessel owner category has been deleted.');
			} else {
				$this->Flash->error('The vessel owner category could not be deleted. Please, try again.');
			}
			return $this->redirect(['action' => 'index']);
		}
	}
}
