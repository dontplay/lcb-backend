<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Ports Controller
 *
 * @property App\Model\Table\PortsTable $Ports
 */
class PortsController extends AppController {

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
		$this->response->header('Access-Control-Allow-Headers', '*');
    }

/**
 * Index method
 *
 * @return void
 */
	public function index() {
		$this->paginate = [
			'contain' => ['Countries']
		];
		$this->set('ports', $this->paginate($this->Ports));
        $this->set('_serialize', ['ports']);
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
			$port = $this->Ports->get($id, [
				'fields' => ['id','name','category','country_id'],
			]);
			$this->set('port', $port);
	        $this->set('_serialize', ['port']);
		}
		else {
			$port = $this->Ports->get($id, [
				'contain' => ['Creators', 'Modifiers', 'Countries', 'Dischargings', 'Loadings']
			]);
			$this->set('port', $port);
		}
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		if($this->request->params['_ext']){
	        $port = $this->Ports->newEntity($this->request->data);
	        if ($this->Ports->save($port, ['validate' => false])) {
	            $message = 'Saved';
	        } else {
	            $message = 'Error';
	        }
	        $this->set([
	            'data' => $this->request->data,
	            'message' => $message,
	            'port' => $port,
	            '_serialize' => ['message', 'port', 'data']
	        ]);
		}
		else {
			$port = $this->Ports->newEntity($this->request->data);
			if ($this->request->is('post')) {
				if ($this->Ports->save($port)) {
					$this->Flash->success('The port has been saved.');
					return $this->redirect(['action' => 'index']);
				} else {
					$this->Flash->error('The port could not be saved. Please, try again.');
				}
			}
			$creators = $this->Ports->Creators->find('list');
			$modifiers = $this->Ports->Modifiers->find('list');
			$countries = $this->Ports->Countries->find('list');
			$this->set(compact('port', 'creators', 'modifiers', 'countries'));
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
			$port = $this->Ports->get($id, [
				'contain' => []
			]);
			if ($this->request->is(['patch', 'post', 'put'])) {
				$port = $this->Ports->patchEntity($port, $this->request->data);
				if ($this->Ports->save($port, ['validate' => false])) {
	                $message = 'Saved';
				} else {
		            $message = 'Error';
				}
			}
	        $this->set([
	        	'port' => $port,
	            'message' => $message,
	            'data' => $this->request->data,
	            '_serialize' => ['message','port','data']
	        ]);
		}
		else {
			$port = $this->Ports->get($id, [
				'contain' => []
			]);
			if ($this->request->is(['patch', 'post', 'put'])) {
				$port = $this->Ports->patchEntity($port, $this->request->data);
				if ($this->Ports->save($port, ['validate' => false])) {
					$this->Flash->success('The port has been saved.');
					return $this->redirect(['action' => 'index']);
				} else {
					$this->Flash->error('The port could not be saved. Please, try again.');
				}
			}
			$creators = $this->Ports->Creators->find('list');
			$modifiers = $this->Ports->Modifiers->find('list');
			$countries = $this->Ports->Countries->find('list');
			$this->set(compact('port', 'creators', 'modifiers', 'countries'));
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
	        $port = $this->Ports->get($id);
	        $message = 'Deleted';
	        if (!$this->Ports->delete($port)) {
	            $message = 'Error';
	        }
	        $this->set([
	            'message' => $message,
	            '_serialize' => ['message']
	        ]);
		}
		else {		
			$port = $this->Ports->get($id);
			$this->request->allowMethod(['post', 'delete']);
			if ($this->Ports->delete($port)) {
				$this->Flash->success('The port has been deleted.');
			} else {
				$this->Flash->error('The port could not be deleted. Please, try again.');
			}
			return $this->redirect(['action' => 'index']);
		}
	}
}
