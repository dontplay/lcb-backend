<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Vessels Controller
 *
 * @property App\Model\Table\VesselsTable $Vessels
 */
class VesselsController extends AppController {

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
			$this->set('vessels', $this->Vessels->find('all'));
		}
		else {
			$this->set('vessels', $this->Vessels->find('all'));
		}
		$this->set('_serialize', ['vessels']);
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
			$vessel = $this->Vessels->get($id);
			$this->set('vessel', $vessel);
			$this->set('_serialize', ['vessel']);
		}
		else {
			$vessel = $this->Vessels->get($id, [
				'contain' => ['Creators', 'Modifiers', 'VesselOwners']
			]);
			$this->set('vessel', $vessel);
		}
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		if($this->request->params['_ext']){
			$vessel = $this->Vessels->newEntity($this->request->data);
			if ($this->Vessels->save($vessel, ['validate' => false])) {
				$message = 'Saved';
			} else {
				$message = 'Error';
			}
			$this->set([
				'data' => $this->request->data,
				'message' => $message,
				'vessel' => $vessel,
				'_serialize' => ['message', 'vessel', 'data']
			]);
		}
		else {
			$vessel = $this->Vessels->newEntity($this->request->data);
			if ($this->request->is('post')) {
				if ($this->Vessels->save($vessel)) {
					$this->Flash->success('The vessel has been saved.');
					return $this->redirect(['action' => 'index']);
				} else {
					$this->Flash->error('The vessel could not be saved. Please, try again.');
				}
			}
			$creators = $this->Vessels->Creators->find('list');
			$modifiers = $this->Vessels->Modifiers->find('list');
			$this->set(compact('vessel', 'creators', 'modifiers'));
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
			$vessel = $this->Vessels->get($id, [
				'contain' => []
			]);
			if ($this->request->is(['patch', 'post', 'put'])) {
				$vessel = $this->Vessels->patchEntity($vessel, $this->request->data);
				if ($this->Vessels->save($vessel, ['validate' => false])) {
					$message = 'Saved';
				} else {
					$message = 'Error';
				}
			}
			$this->set([
				'vessel' => $vessel,
				'message' => $message,
				'data' => $this->request->data,
				'_serialize' => ['message','vessel','data']
			]);
		}
		else {
			$vessel = $this->Vessels->get($id, [
				'contain' => []
			]);
			if ($this->request->is(['patch', 'post', 'put'])) {
				$vessel = $this->Vessels->patchEntity($vessel, $this->request->data);
				if ($this->Vessels->save($vessel, ['validate' => false])) {
					$this->Flash->success('The vessel has been saved.');
					return $this->redirect(['action' => 'index']);
				} else {
					$this->Flash->error('The vessel could not be saved. Please, try again.');
				}
			}
			$creators = $this->Vessels->Creators->find('list');
			$modifiers = $this->Vessels->Modifiers->find('list');
			$this->set(compact('vessel', 'creators', 'modifiers'));
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
			$vessel = $this->Vessels->get($id);
			$message = 'Deleted';
			if (!$this->Vessels->delete($vessel)) {
				$message = 'Error';
			}
			$this->set([
				'message' => $message,
				'_serialize' => ['message']
			]);
		}
		else {		
			$vessel = $this->Vessels->get($id);
			$this->request->allowMethod(['post', 'delete']);
			if ($this->Vessels->delete($vessel)) {
				$this->Flash->success('The vessel has been deleted.');
			} else {
				$this->Flash->error('The vessel could not be deleted. Please, try again.');
			}
			return $this->redirect(['action' => 'index']);
		}
	}
}
