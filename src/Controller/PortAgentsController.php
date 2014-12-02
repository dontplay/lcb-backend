<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PortAgents Controller
 *
 * @property App\Model\Table\PortAgentsTable $PortAgents
 */
class PortAgentsController extends AppController {

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
			'contain' => ['PortAgentContacts']
		];
		$this->set('portAgents', $this->paginate($this->PortAgents));
		$this->set('_serialize', ['portAgents']);
	}

/**
 * View method
 *
 * @param string|null $id Port Agent id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function view($id = null) {
		if($this->request->params['_ext']){
			$portAgent = $this->PortAgents->get($id, [
				'contain' => ['portAgentContacts']
			]);
			$this->set('portAgent', $portAgent);
			$this->set('_serialize', ['portAgent']);
		} else {
		$portAgent = $this->PortAgents->get($id, [
			'contain' => ['Creators', 'Modifiers', 'Dischargings', 'Loadings', 'PortAgentContacts']
		]);
		$this->set('portAgent', $portAgent);
		}
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		if($this->request->params['_ext']){
			$portAgent = $this->PortAgents->newEntity($this->request->data);
			if ($this->PortAgents->save($portAgent, ['validate' => false])) {
				$message = 'Saved';
			} else {
				$message = 'Error';
			}
			$this->set([
				'data' => $this->request->data,
				'message' => $message,
				'portAgent' => $portAgent,
				'_serialize' => ['message', 'portAgent', 'data']
			]);
		} else {
			$portAgent = $this->PortAgents->newEntity($this->request->data);
			if ($this->request->is('post')) {
				if ($this->PortAgents->save($portAgent)) {
					$this->Flash->success('The port agent has been saved.');
					return $this->redirect(['action' => 'index']);
				} else {
					$this->Flash->error('The port agent could not be saved. Please, try again.');
				}
			}
			$creators = $this->PortAgents->Creators->find('list');
			$modifiers = $this->PortAgents->Modifiers->find('list');
			$this->set(compact('portAgent', 'creators', 'modifiers'));
		}
	}

/**
 * Edit method
 *
 * @param string|null $id Port Agent id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function edit($id = null) {
		if($this->request->params['_ext']){
			$portAgent = $this->PortAgents->get($id, [
				'contain' => ['portAgentContacts']
			]);
			if ($this->request->is(['patch', 'post', 'put'])) {
				$portAgent = $this->PortAgents->patchEntity($portAgent, $this->request->data);
				if ($this->PortAgents->save($portAgent, ['validate' => false])) {
					$message = 'Saved';
				}
				else {
					$message = 'Error';
				}
			}
			$this->set([
				'portAgent' => $portAgent,
				'message' => $message,
				'data' => $this->request->data,
				'_serialize' => ['message','portAgent','data']
			]);
		} else {
			$portAgent = $this->PortAgents->get($id, [
				'contain' => []
			]);
			if ($this->request->is(['patch', 'post', 'put'])) {
				$portAgent = $this->PortAgents->patchEntity($portAgent, $this->request->data);
				if ($this->PortAgents->save($portAgent)) {
					$this->Flash->success('The port agent has been saved.');
					return $this->redirect(['action' => 'index']);
				} else {
					$this->Flash->error('The port agent could not be saved. Please, try again.');
				}
			}
			$creators = $this->PortAgents->Creators->find('list');
			$modifiers = $this->PortAgents->Modifiers->find('list');
			$this->set(compact('portAgent', 'creators', 'modifiers'));
		}
	}

/**
 * Delete method
 *
 * @param string|null $id Port Agent id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function delete($id = null) {
		$portAgent = $this->PortAgents->get($id);
		$this->request->allowMethod(['post', 'delete']);
		if ($this->PortAgents->delete($portAgent)) {
			$this->Flash->success('The port agent has been deleted.');
		} else {
			$this->Flash->error('The port agent could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}

}
