<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Countries Controller
 *
 * @property App\Model\Table\CountriesTable $Countries
 */
class CountriesController extends AppController {

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
			$this->set('countries', $this->Countries->find('all'));
			$this->set('_serialize', ['countries']);
		}
		else {
			$this->set('countries', $this->paginate($this->Countries));
		}
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
			$country = $this->Countries->get($id);
			$this->set('country', $country);
			$this->set('_serialize', ['country']);
		} else {
			$country = $this->Countries->get($id, [
				'contain' => ['Creators', 'Modifiers', 'Cities', 'Ports']
			]);
			$this->set('country', $country);
			$this->set('_serialize', ['country']);
		}
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->params['_ext']) {
			$country = $this->Countries->newEntity($this->request->data);
			if ($this->Countries->save($country, ['validate' => false])) {
				$message = 'Saved';
			} else {
				$message = 'Error';
			}
			$this->set([
				'data' => $this->request->data,
				'message' => $message,
				'country' => $country,
				'_serialize' => ['message', 'country', 'data']
			]);
		} else {
			$country = $this->Countries->newEntity($this->request->data);
			if ($this->request->is('post')) {
				if ($this->Countries->save($country)) {
					$this->Flash->success('The country has been saved.');
					return $this->redirect(['action' => 'index']);
				} else {
					$this->Flash->error('The country could not be saved. Please, try again.');
				}
			}
			$creators = $this->Countries->Creators->find('list');
			$modifiers = $this->Countries->Modifiers->find('list');
			$this->set(compact('country', 'creators', 'modifiers'));
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
			$country = $this->Countries->get($id);
			if ($this->request->is(['patch', 'post', 'put'])) {
				$country = $this->Countries->patchEntity($country, $this->request->data);
				if ($this->Countries->save($country, ['validate' => false])) {
					$message = 'Saved';
				} else {
					$message = 'Error';
				}
			}
			$this->set([
				'country' => $country,
				'message' => $message,
				'data' => $this->request->data,
				'_serialize' => ['message','country','data']
			]);
		}
		else {
			$country = $this->Countries->get($id, [
				'contain' => []
			]);
			if ($this->request->is(['patch', 'post', 'put'])) {
				$country = $this->Countries->patchEntity($country, $this->request->data);
				if ($this->Countries->save($country)) {
					$this->Flash->success('The country has been saved.');
					return $this->redirect(['action' => 'index']);
				} else {
					$this->Flash->error('The country could not be saved. Please, try again.');
				}
			}
			$creators = $this->Countries->Creators->find('list');
			$modifiers = $this->Countries->Modifiers->find('list');
			$this->set(compact('country', 'creators', 'modifiers'));
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
			$country = $this->Countries->get($id);
			$message = 'Deleted';
			if (!$this->Countries->delete($country)) {
				$message = 'Error';
			}
			$this->set([
				'message' => $message,
				'_serialize' => ['message']
			]);
		}
		else {		
			$country = $this->Countries->get($id);
			$this->request->allowMethod(['post', 'delete']);
			if ($this->Countries->delete($country)) {
				$this->Flash->success('The country has been deleted.');
			} else {
				$this->Flash->error('The country could not be deleted. Please, try again.');
			}
			return $this->redirect(['action' => 'index']);
		}
	}
}
