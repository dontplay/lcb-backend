<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Cities Controller
 *
 * @property App\Model\Table\CitiesTable $Cities
 */
class CitiesController extends AppController {

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
			$conditions = [
			//	'fields' => ['Cities.id', 'Cities.name']
				'contain' => ['Countries']
			];
			$this->set('cities', $this->Cities->find('all', $conditions));
		}
		else {
			$this->set('cities', $this->Cities->find('all'));
		}
		$this->set('_serialize', ['cities']);
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
			$city = $this->Cities->get($id);
			$this->set('city', $city);
			$this->set('_serialize', ['city']);
		} else {
			$city = $this->Cities->get($id, [
				'contain' => ['Creators', 'Modifiers', 'Cities', 'Ports']
			]);
			$this->set('city', $city);
			$this->set('_serialize', ['city']);
		}
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->params['_ext']) {
			$city = $this->Cities->newEntity($this->request->data);
			if ($this->Cities->save($city, ['validate' => false])) {
				$message = 'Saved';
			} else {
				$message = 'Error';
			}
			$this->set([
				'data' => $this->request->data,
				'message' => $message,
				'city' => $city,
				'_serialize' => ['message', 'city', 'data']
			]);
		} else {
			$city = $this->Cities->newEntity($this->request->data);
			if ($this->request->is('post')) {
				if ($this->Cities->save($city)) {
					$this->Flash->success('The city has been saved.');
					return $this->redirect(['action' => 'index']);
				} else {
					$this->Flash->error('The city could not be saved. Please, try again.');
				}
			}
			$creators = $this->Cities->Creators->find('list');
			$modifiers = $this->Cities->Modifiers->find('list');
			$this->set(compact('city', 'creators', 'modifiers'));
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
			$city = $this->Cities->get($id);
			if ($this->request->is(['patch', 'post', 'put'])) {
				$city = $this->Cities->patchEntity($city, $this->request->data);
				if ($this->Cities->save($city, ['validate' => false])) {
					$message = 'Saved';
				} else {
					$message = 'Error';
				}
			}
			$this->set([
				'city' => $city,
				'message' => $message,
				'data' => $this->request->data,
				'_serialize' => ['message','city','data']
			]);
		}
		else {
			$city = $this->Cities->get($id, [
				'contain' => []
			]);
			if ($this->request->is(['patch', 'post', 'put'])) {
				$city = $this->Cities->patchEntity($city, $this->request->data);
				if ($this->Cities->save($city)) {
					$this->Flash->success('The city has been saved.');
					return $this->redirect(['action' => 'index']);
				} else {
					$this->Flash->error('The city could not be saved. Please, try again.');
				}
			}
			$creators = $this->Cities->Creators->find('list');
			$modifiers = $this->Cities->Modifiers->find('list');
			$this->set(compact('city', 'creators', 'modifiers'));
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
			$city = $this->Cities->get($id);
			$message = 'Deleted';
			if (!$this->Cities->delete($city)) {
				$message = 'Error';
			}
			$this->set([
				'message' => $message,
				'_serialize' => ['message']
			]);
		}
		else {		
			$city = $this->Cities->get($id);
			$this->request->allowMethod(['post', 'delete']);
			if ($this->Cities->delete($city)) {
				$this->Flash->success('The city has been deleted.');
			} else {
				$this->Flash->error('The city could not be deleted. Please, try again.');
			}
			return $this->redirect(['action' => 'index']);
		}
	}
}