<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CustomerContacts Controller
 *
 * @property App\Model\Table\CustomerContactsTable $CustomerContacts
 */
class CustomerContactsController extends AppController {

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
			'contain' => ['Creators', 'Modifiers', 'Customers']
		];
		$this->set('customerContacts', $this->paginate($this->CustomerContacts));
		$this->set('_serialize', ['customerContacts']);
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
			$customerContact = $this->CustomerContacts->get($id);
			$this->set('customerContact', $customerContact);
	        $this->set('_serialize', ['customerContact']);
		}
		else {
			$customerContact = $this->CustomerContacts->get($id, [
				'contain' => ['Creators', 'Modifiers', 'Customers']
			]);
			$this->set('customerContact', $customerContact);
		}
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$customerContact = $this->CustomerContacts->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->CustomerContacts->save($customerContact)) {
				$this->Flash->success('The customer contact has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The customer contact could not be saved. Please, try again.');
			}
		}
		$creators = $this->CustomerContacts->Creators->find('list');
		$modifiers = $this->CustomerContacts->Modifiers->find('list');
		$customers = $this->CustomerContacts->Customers->find('list');
		$this->set(compact('customerContact', 'creators', 'modifiers', 'customers'));
	}

/**
 * Edit method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function edit($id = null) {
		$customerContact = $this->CustomerContacts->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$customerContact = $this->CustomerContacts->patchEntity($customerContact, $this->request->data);
			if ($this->CustomerContacts->save($customerContact)) {
				$this->Flash->success('The customer contact has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The customer contact could not be saved. Please, try again.');
			}
		}
		$creators = $this->CustomerContacts->Creators->find('list');
		$modifiers = $this->CustomerContacts->Modifiers->find('list');
		$customers = $this->CustomerContacts->Customers->find('list');
		$this->set(compact('customerContact', 'creators', 'modifiers', 'customers'));
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
	        $customerContact = $this->CustomerContacts->get($id);
	        $message = 'Deleted';
	        if (!$this->CustomerContacts->delete($customerContact)) {
	            $message = 'Error';
	        }
	        $this->set([
	            'message' => $message,
	            '_serialize' => ['message']
	        ]);
		}
		else {
			$customerContact = $this->CustomerContacts->get($id);
			$this->request->allowMethod(['post', 'delete']);
			if ($this->CustomerContacts->delete($customerContact)) {
				$this->Flash->success('The customer contact has been deleted.');
			} else {
				$this->Flash->error('The customer contact could not be deleted. Please, try again.');
			}
			return $this->redirect(['action' => 'index']);
		}
	}
}
