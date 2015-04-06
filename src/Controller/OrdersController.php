<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Orders Controller
 *
 * @property App\Model\Table\OrdersTable $Orders
 */
class OrdersController extends AppController {

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
			$this->set('orders', $this->Orders->find('all',['order' => ['Orders.id DESC'],
				                                               'contain' => [
					                                                'Users','Customers','VesselOwners',
					                                                'Statuses', 'Vessels',
																													'Loadings'=>[
																																				'PortAgents','PortAgents2',
																																				'Ports','Ports2','LoiStatuses',
																																				'LoiStatuses2','BlStatuses','BlStatuses2',
																																				'ShipmentTypes'
																																			],
																													'Dischargings'=>['PortAgents','PortAgents2','Ports','Ports2'],
																													'Invoices','Events'
				                                                ]
				                                                ]));
			$this->set('_serialize', ['orders']);
		}
	}

	/**
 * Index method for view page
 *
 * @return void
 */
	public function index_order() {
		if ($this->request->params['_ext']) {
			$this->set('orders', $this->Orders->find('all',[
				                                    'order' => ['Orders.id DESC'],
				                                    'contain' => [
					                                    'Users'=>['fields'=>['id','username']],
					                                    'Customers'=>['fields'=>['id','name']],
					                                    'VesselOwners'=>['fields'=>['id','name']], 
					                                    'Statuses'=>['fields'=>['id','name']], 
					                                    'Vessels'=>['fields'=>['id','name']],
					                                    'Loadings'=>[
					                                                 'Ports'=>['fields'=>['id','name']],
					                                                 'Ports2'=>['fields'=>['id','name']],
					                                                 'fields'=>['id','demurrage_rate','freight','order_id']
					                                                ],
					                                    'Dischargings'=>[
					                                                  'Ports'=>['fields'=>['id','name']],
					                                                  'Ports2'=>['fields'=>['id','name']],
					                                                  'fields'=>['id','order_id']
					                                                ]
				                                    ],
				                                    'fields'=>['id','fixtureDate','laycanStartDate','laycanEndDate',
				                                               'customer_id','vessel_owner_id','status_id','vessel_id','user_id']
				                                    ]));
			$this->set('_serialize', ['orders']);
		}
	}

	/**
 * Index method for Events
 *
 * @return void
 */
	public function order_events() {
		if ($this->request->params['_ext']) {
			$this->set('orders', $this->Orders->Events->find('all'));
			$this->set('_serialize', ['orders']);
		}
	}

/**
 * View method
 *
 * @param string|null $id Order id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function view($id = null) {
		if($this->request->params['_ext']){
			$order = $this->Orders->get($id, [
							'contain' => 
					[
						'Users','Customers',
						'VesselOwners', 'Statuses', 'Vessels',
						'Loadings'=>[
													'PortAgents','PortAgents2',
													'Ports','Ports2','LoiStatuses',
													'LoiStatuses2','BlStatuses','BlStatuses2',
													'ShipmentTypes'
												],
						'Dischargings'=>['PortAgents','PortAgents2','Ports','Ports2'],
						'Invoices','Events'
					]
			]);
			$this->set('order', $order);
			$this->set('_serialize', ['order']);
		}
	}

/**
 * View Order method
 *
 * @param string|null $id Order id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function view_order($id = null) {
		if($this->request->params['_ext']){
			$order = $this->Orders->get($id, [
				'contain' => 
				[
					'Statuses','Customers','VesselOwners','Vessels',
					'Loadings'=>[
												'PortAgents','PortAgents2',
												'Ports','Ports2','LoiStatuses','LoiStatuses2',
												'BlStatuses','BlStatuses2','ShipmentTypes'
											],
					'Dischargings'=>['PortAgents','PortAgents2','Ports','Ports2'],
					'Invoices','Events','Users'
				]
			]);
			$this->set('order', $order);
			$this->set('_serialize', ['order']);
		}
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		if($this->request->params['_ext']){
			$order = $this->Orders->newEntity($this->request->data, ['validate' => false]);
			if ($this->Orders->save($order)) {
				$message = 'Saved';
			} else {
				$message = 'Error';
				$error = $order->errors();
			}
			$this->set([
				'data' => $this->request->data,
				'message' => $message,
				'order' => $order,
				'error' => $error,
				'_serialize' => ['message', 'order', 'data','error']
			]);
		}
	}

/**
 * Edit method
 *
 * @param string|null $id Order id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function edit($id = null) {
		if($this->request->params['_ext']){
			$order = $this->Orders->get($id, [
							'contain' => 
					[
						'Users','Customers',
						'VesselOwners', 'Statuses', 'Vessels',
						'Loadings'=>[
													'PortAgents','PortAgents2',
													'Ports','Ports2','LoiStatuses',
													'LoiStatuses2','BlStatuses','BlStatuses2',
													'ShipmentTypes'
												],
						'Dischargings'=>['PortAgents','PortAgents2','Ports','Ports2'],
						'Invoices','Events'
					]
			]);
			if ($this->request->is(['patch', 'post', 'put'])) {
				$order = $this->Orders->patchEntity($order, $this->request->data, ['validate' => false]);
				if ($this->Orders->save($order)) {
					$message = 'Saved';
				}
				else {
					$message = 'Error';
					$error = $order->errors();
				}
			}
			$this->set([
				'order' => $order,
				'message' => $message,
				'data' => $this->request->data,
				'error' => $error,
				'_serialize' => ['message','order','data','error']
			]);
		}
}

/**
 * Delete method
 *
 * @param string|null $id Order id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function delete($id = null) {
		$order = $this->Orders->get($id);
		$this->request->allowMethod(['post', 'delete']);
		if ($this->Orders->delete($order)) {
			$this->Flash->success('The order has been deleted.');
		} else {
			$this->Flash->error('The order could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}

}
