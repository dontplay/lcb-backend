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
    }

/**
 * Index method
 *
 * @return void
 */
	public function index() {
        if ($this->RequestHandler->accepts(['json'])) {
	        $conditions = [
				'fields' => ['Countries.id', 'Countries.name']
			];
			$this->set('countries', $this->Countries->find('all',$conditions));
        }
        else {
	        $conditions = [
				'fields' => ['Countries.id', 'Countries.name']
			];
			$this->set('countries', $this->Countries->find('all',$conditions));
		}


        $this->set('_serialize', ['countries']);
	}

/**
 * View method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function view($id = null) {
		$country = $this->Countries->get($id, [
			'contain' => ['Creators', 'Modifiers', 'Cities', 'Ports']
		]);
		$this->set('country', $country);
        $this->set('_serialize', ['country']);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
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

/**
 * Edit method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function edit($id = null) {
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

/**
 * Delete method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function delete($id = null) {
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
