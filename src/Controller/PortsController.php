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
		$port = $this->Ports->get($id, [
		//	'contain' => ['Creators', 'Modifiers', 'Countries', 'Dischargings', 'Loadings']
		]);
		$this->set('port', $port);
        $this->set('_serialize', ['port']);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		//$port = $this->Ports->newEntity($this->request->data);
		//if ($this->request->is('post')) {
		//	if ($this->Ports->save($port)) {
		//		$this->Flash->success('The port has been saved.');
		//		return $this->redirect(['action' => 'index']);
		//	} else {
		//		$this->Flash->error('The port could not be saved. Please, try again.');
		//	}
		//}
        $port = $this->Ports->newEntity($this->request->data);
        if ($this->Ports->save($port, ['validate' => false])) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            'port' => $port,
            '_serialize' => ['message', 'recipe']
        ]);
		$creators = $this->Ports->Creators->find('list');
		$modifiers = $this->Ports->Modifiers->find('list');
		$countries = $this->Ports->Countries->find('list');
		$this->set(compact('port', 'creators', 'modifiers', 'countries'));
	}

/**
 * Edit method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function edit($id = null) {
		$port = $this->Ports->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$port = $this->Ports->patchEntity($port, $this->request->data);
			pr($port);
			if ($this->Ports->save($port)) {
                $message = 'Saved';
				//$this->Flash->success('The port has been saved.');
				//return $this->redirect(['action' => 'index']);
			} else {
	            $message = 'Error';
				//$this->Flash->error('The port could not be saved. Please, try again.');
			}
		}
		$creators = $this->Ports->Creators->find('list');
		$modifiers = $this->Ports->Modifiers->find('list');
		$countries = $this->Ports->Countries->find('list');
		$this->set(compact('port', 'creators', 'modifiers', 'countries'));
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
	}

/**
 * Delete method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function delete($id = null) {
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
