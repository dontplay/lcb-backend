<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PortAgentContacts Controller
 *
 * @property App\Model\Table\PortAgentContactsTable $PortAgentContacts
 */
class PortAgentContactsController extends AppController {

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
			'contain' => ['Creators', 'Modifiers', 'PortAgents']
		];
		$this->set('portAgentContacts', $this->paginate($this->PortAgentContacts));
	}

/**
 * View method
 *
 * @param string|null $id Port Agent Contact id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function view($id = null) {
		if($this->request->params['_ext']){
			$portAgentContact = $this->PortAgentContacts->get($id);
			$this->set('portAgentContact', $portAgentContact);
	        $this->set('_serialize', ['portAgentContact']);
		}
		else {
			$portAgentContact = $this->PortAgentContacts->get($id, [
			'contain' => ['Creators', 'Modifiers', 'PortAgents']
		]);
			$this->set('portAgentContact', $portAgentContact);
		}
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$portAgentContact = $this->PortAgentContacts->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->PortAgentContacts->save($portAgentContact)) {
				$this->Flash->success('The port agent contact has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The port agent contact could not be saved. Please, try again.');
			}
		}
		$creators = $this->PortAgentContacts->Creators->find('list');
		$modifiers = $this->PortAgentContacts->Modifiers->find('list');
		$portAgents = $this->PortAgentContacts->PortAgents->find('list');
		$this->set(compact('portAgentContact', 'creators', 'modifiers', 'portAgents'));
	}

/**
 * Edit method
 *
 * @param string|null $id Port Agent Contact id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function edit($id = null) {
		$portAgentContact = $this->PortAgentContacts->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$portAgentContact = $this->PortAgentContacts->patchEntity($portAgentContact, $this->request->data);
			if ($this->PortAgentContacts->save($portAgentContact)) {
				$this->Flash->success('The port agent contact has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The port agent contact could not be saved. Please, try again.');
			}
		}
		$creators = $this->PortAgentContacts->Creators->find('list');
		$modifiers = $this->PortAgentContacts->Modifiers->find('list');
		$portAgents = $this->PortAgentContacts->PortAgents->find('list');
		$this->set(compact('portAgentContact', 'creators', 'modifiers', 'portAgents'));
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
	        $portAgentContact = $this->PortAgentContacts->get($id);
	        $message = 'Deleted';
	        if (!$this->PortAgentContacts->delete($portAgentContact)) {
	            $message = 'Error';
	        }
	        $this->set([
	            'message' => $message,
	            '_serialize' => ['message']
	        ]);
		}
		else {		
			$portAgentContact = $this->VesselOwnerContacts->get($id);
			$this->request->allowMethod(['post', 'delete']);
			if ($this->VesselOwnerContacts->delete($portAgentContact)) {
				$this->Flash->success('The portAgentContact has been deleted.');
			} else {
				$this->Flash->error('The portAgentContact could not be deleted. Please, try again.');
			}
			return $this->redirect(['action' => 'index']);
		}
	}

}
