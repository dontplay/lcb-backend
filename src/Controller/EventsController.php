<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Events Controller
 *
 * @property \App\Model\Table\EventsTable $Events
 */
class EventsController extends AppController {

/**
 * Index method
 *
 * @return void
 */
	public function index() {
		if ($this->request->params['_ext']) {
			$this->set('events', $this->Events->find('all',['contain' => ['Vessels', 'Orders']]));
			$this->set('_serialize', ['events']);
		}
		else {
			$this->paginate = [
				'contain' => ['Creators', 'Modifiers', 'Vessels', 'Orders']
			];
			$this->set('events', $this->paginate($this->Events));
			$this->set('_serialize', ['events']);
		}
	}

/**
 * View method
 *
 * @param string|null $id Event id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function view($id = null) {
		$event = $this->Events->get($id, [
			'contain' => ['Creators', 'Modifiers', 'Vessels', 'Orders']
		]);
		$this->set('event', $event);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$event = $this->Events->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->Events->save($event)) {
				$this->Flash->success('The event has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The event could not be saved. Please, try again.');
			}
		}
		$creators = $this->Events->Creators->find('list');
		$modifiers = $this->Events->Modifiers->find('list');
		$users = $this->Events->Vessels->find('list');
		$orders = $this->Events->Orders->find('list');
		$this->set(compact('event', 'creators', 'modifiers', 'users', 'orders'));
	}

/**
 * Edit method
 *
 * @param string|null $id Event id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function edit($id = null) {
		$event = $this->Events->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$event = $this->Events->patchEntity($event, $this->request->data);
			if ($this->Events->save($event)) {
				$this->Flash->success('The event has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The event could not be saved. Please, try again.');
			}
		}
		$creators = $this->Events->Creators->find('list');
		$modifiers = $this->Events->Modifiers->find('list');
		$users = $this->Events->Vessels->find('list');
		$orders = $this->Events->Orders->find('list');
		$this->set(compact('event', 'creators', 'modifiers', 'users', 'orders'));
	}

/**
 * Delete method
 *
 * @param string|null $id Event id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function delete($id = null) {
		$event = $this->Events->get($id);
		$this->request->allowMethod(['post', 'delete']);
		if ($this->Events->delete($event)) {
			$this->Flash->success('The event has been deleted.');
		} else {
			$this->Flash->error('The event could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}

}
