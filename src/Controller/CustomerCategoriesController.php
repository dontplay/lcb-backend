<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CustomerCategories Controller
 *
 * @property App\Model\Table\CustomerCategoriesTable $CustomerCategories
 */
class CustomerCategoriesController extends AppController {

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
		$this->set('customerCategories', $this->paginate($this->CustomerCategories));
        $this->set('_serialize', ['customerCategories']);
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
			$customerCategory = $this->CustomerCategories->get($id);
			$this->set('customerCategory', $customerCategory);
	        $this->set('_serialize', ['customerCategory']);
		}
		else {
			$customerCategory = $this->CustomerCategories->get($id, [
				'contain' => ['Creators', 'Modifiers', 'Customers']
			]);
			$this->set('customerCategory', $customerCategory);
		}
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		if($this->request->params['_ext']){
	        $customerCategory = $this->CustomerCategories->newEntity($this->request->data);
	        if ($this->CustomerCategories->save($customerCategory, ['validate' => false])) {
	            $message = 'Saved';
	        } else {
	            $message = 'Error';
	        }
	        $this->set([
	            'data' => $this->request->data,
	            'message' => $message,
	            'customerCategory' => $customerCategory,
	            '_serialize' => ['message', 'customerCategory', 'data']
	        ]);
		}
		else {
			$customerCategory = $this->CustomerCategories->newEntity($this->request->data);
			if ($this->request->is('post')) {
				if ($this->CustomerCategories->save($customerCategory)) {
					$this->Flash->success('The customerCategory has been saved.');
					return $this->redirect(['action' => 'index']);
				} else {
					$this->Flash->error('The customerCategory could not be saved. Please, try again.');
				}
			}
			$creators = $this->CustomerCategories->Creators->find('list');
			$modifiers = $this->CustomerCategories->Modifiers->find('list');
			$this->set(compact('customerCategory', 'creators', 'modifiers'));
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
			$customerCategory = $this->CustomerCategories->get($id, [
				'contain' => []
			]);
			if ($this->request->is(['patch', 'post', 'put'])) {
				$customerCategory = $this->CustomerCategories->patchEntity($customerCategory, $this->request->data);
				if ($this->CustomerCategories->save($customerCategory, ['validate' => false])) {
	                $message = 'Saved';
				} else {
		            $message = 'Error';
				}
			}
	        $this->set([
	            'customerCategory' => $customerCategory,
	            'message' => $message,
	            'data' => $this->request->data,
	            '_serialize' => ['message','customerCategory','data']
	        ]);
		}
		else {
			$customerCategory = $this->CustomerCategories->get($id, [
				'contain' => []
			]);
			if ($this->request->is(['patch', 'post', 'put'])) {
				$customerCategory = $this->CustomerCategories->patchEntity($customerCategory, $this->request->data);
				if ($this->CustomerCategories->save($customerCategory)) {
					$this->Flash->success('The vessel owner category has been saved.');
					return $this->redirect(['action' => 'index']);
				} else {
					$this->Flash->error('The vessel owner category could not be saved. Please, try again.');
				}
			}
			$creators = $this->CustomerCategories->Creators->find('list');
			$modifiers = $this->CustomerCategories->Modifiers->find('list');
			$this->set(compact('customerCategory', 'creators', 'modifiers'));
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
	        $customerCategory = $this->CustomerCategories->get($id);
	        $message = 'Deleted';
	        if (!$this->CustomerCategories->delete($customerCategory)) {
	            $message = 'Error';
	        }
	        $this->set([
	            'message' => $message,
	            '_serialize' => ['message']
	        ]);
		}
		else {		
			$customerCategory = $this->CustomerCategories->get($id);
			$this->request->allowMethod(['post', 'delete']);
			if ($this->CustomerCategories->delete($customerCategory)) {
				$this->Flash->success('The vessel owner category has been deleted.');
			} else {
				$this->Flash->error('The vessel owner category could not be deleted. Please, try again.');
			}
			return $this->redirect(['action' => 'index']);
		}
	}
}