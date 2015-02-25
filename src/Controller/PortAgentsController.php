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
		if($this->request->params['_ext']){
			$this->set('portAgents', $this->PortAgents->find('all',['contain' => ['PortAgentContacts'],'order'=>['PortAgents.name']]));
			$this->set('_serialize', ['portAgents']);
		} else {
			$this->paginate = [
				'contain' => ['PortAgentContacts']
			];
			$this->set('portAgents', $this->paginate($this->PortAgents));
		}
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
		}
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		if($this->request->params['_ext']) {
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
		if($this->request->params['_ext']){
	        $portAgent = $this->PortAgents->get($id);
	        $message = 'Deleted';
	        if (!$this->PortAgents->delete($portAgent)) {
	            $message = 'Error';
	        }
	        $this->set([
	            'message' => $message,
	            '_serialize' => ['message']
	        ]);
		}
	}

}
