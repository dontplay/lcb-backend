<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Customers Controller
 *
 * @property App\Model\Table\CustomersTable $Customers
 */
class CustomersController extends AppController {

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
			'contain' => ['CustomerCategories', 'CustomerContacts', 'Cities']
		];
		$this->set('customers', $this->paginate($this->Customers));
		$this->set('_serialize', ['customers']);
	}

/**
 * View method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function view($id = null) {
		if ($this->request->params['_ext']) {
			$customer = $this->Customers->get($id, [
				'contain' => ['CustomerContacts']
			]);
			$this->set('customer', $customer);
			$this->set('_serialize', ['customer']);
		} else {
			$customer = $this->Customers->get($id, [
				'contain' => ['Creators', 'Modifiers', 'CustomerCategories', 'CustomerContacts', 'Cities', 'Vessels']
			]);
			$this->set('customer', $customer);
		}
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->params['_ext']) {
			$customer = $this->Customers->newEntity($this->request->data);
			if ($this->Customers->save($customer, ['validate' => false])) {
				$message = 'Saved';
			} else {
				$message = 'Error';
			}
			$this->set([
				'data' => $this->request->data,
				'message' => $message,
				'customer' => $customer,
				'_serialize' => ['message', 'customer', 'data']
			]);
		} else {
			$customer = $this->Customers->newEntity($this->request->data);
			if ($this->request->is('post')) {
				if ($this->Customers->save($customer)) {
					$this->Flash->success('The customer has been saved.');
					return $this->redirect(['action' => 'index']);
				} else {
					$this->Flash->error('The customer could not be saved. Please, try again.');
				}
			}
			$creators = $this->Customers->Creators->find('list');
			$modifiers = $this->Customers->Modifiers->find('list');
			$categories = $this->Customers->Categories->find('list');
			$cities = $this->Customers->Cities->find('list');
			$this->set(compact('customer', 'creators', 'modifiers', 'categories', 'cities'));
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
		if ($this->request->params['_ext']) {
			$customer = $this->Customers->get($id, [
				'contain' => ['CustomerContacts']
			]);
			if ($this->request->is(['patch', 'post', 'put'])) {
				$customer = $this->Customers->patchEntity($customer, $this->request->data);
				if ($this->Customers->save($customer, ['validate' => false])) {
					$message = 'Saved';
				} else {
					$message = 'Error';
				}
			}
			$this->set([
				'customer' => $customer,
				'message' => $message,
				'data' => $this->request->data,
				'_serialize' => ['message','customer','data']
			]);
		}
		else {
			$customer = $this->Customers->get($id, [
				'contain' => ['CustomerContacts']
			]);
			if ($this->request->is(['patch', 'post', 'put'])) {
				$customer = $this->Customers->patchEntity($customer, $this->request->data);
				if ($this->Customers->save($customer, ['validate' => false])) {
					$this->Flash->success('The customer has been saved.');
					return $this->redirect(['action' => 'index']);
				} else {
					$this->Flash->error('The customer could not be saved. Please, try again.');
				}
			}
			$creators = $this->Customers->Creators->find('list');
			$modifiers = $this->Customers->Modifiers->find('list');
			$categories = $this->Customers->Categories->find('list');
			$cities = $this->Customers->Cities->find('list');
			$this->set(compact('customer', 'creators', 'modifiers', 'categories', 'cities'));
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
		if ($this->request->params['_ext']) {
			$customer = $this->Customers->get($id);
			$message = 'Deleted';
			if (!$this->Customers->delete($customer)) {
				$message = 'Error';
			}
			$this->set([
				'message' => $message,
				'_serialize' => ['message']
			]);
		}
		else {		
			$customer = $this->Customers->get($id);
			$this->request->allowMethod(['post', 'delete']);
			if ($this->Customers->delete($customer)) {
				$this->Flash->success('The customer has been deleted.');
			} else {
				$this->Flash->error('The customer could not be deleted. Please, try again.');
			}
			return $this->redirect(['action' => 'index']);
		}
	}
}