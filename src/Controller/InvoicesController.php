<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Invoices Controller
 *
 * @property App\Model\Table\InvoicesTable $Invoices
 */
class InvoicesController extends AppController {

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
			'contain' => ['Createds', 'Modifieds', 'Orders']
		];
		$this->set('invoices', $this->paginate($this->Invoices));
	}

/**
 * View method
 *
 * @param string|null $id Invoice id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function view($id = null) {
		$invoice = $this->Invoices->get($id, [
			'contain' => ['Createds', 'Modifieds', 'Orders']
		]);
		$this->set('invoice', $invoice);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$invoice = $this->Invoices->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->Invoices->save($invoice)) {
				$this->Flash->success('The invoice has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The invoice could not be saved. Please, try again.');
			}
		}
		$createds = $this->Invoices->Createds->find('list');
		$modifieds = $this->Invoices->Modifieds->find('list');
		$orders = $this->Invoices->Orders->find('list');
		$this->set(compact('invoice', 'createds', 'modifieds', 'orders'));
	}

/**
 * Edit method
 *
 * @param string|null $id Invoice id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function edit($id = null) {
		$invoice = $this->Invoices->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$invoice = $this->Invoices->patchEntity($invoice, $this->request->data);
			if ($this->Invoices->save($invoice)) {
				$this->Flash->success('The invoice has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The invoice could not be saved. Please, try again.');
			}
		}
		$createds = $this->Invoices->Createds->find('list');
		$modifieds = $this->Invoices->Modifieds->find('list');
		$orders = $this->Invoices->Orders->find('list');
		$this->set(compact('invoice', 'createds', 'modifieds', 'orders'));
	}

/**
 * Delete method
 *
 * @param string|null $id Invoice id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function delete($id = null) {
		$invoice = $this->Invoices->get($id);
		$this->request->allowMethod(['post', 'delete']);
		if ($this->Invoices->delete($invoice)) {
			$this->Flash->success('The invoice has been deleted.');
		} else {
			$this->Flash->error('The invoice could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}

}
