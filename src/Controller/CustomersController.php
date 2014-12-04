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
	}
}