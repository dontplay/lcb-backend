<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Events Controller
 *
 * @property App\Model\Table\EventsTable $Events
 */
class EventsController extends AppController {

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
			'contain' => ['Creators', 'Modifiers']
		];
		$this->set('events', $this->paginate($this->Events));
		$this->set('_serialize', ['events']);
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
			'contain' => ['Creators', 'Modifiers']
		]);
		$this->set('event', $event);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->params['_ext']) {
			$events = $this->Events->newEntities($this->request->data);
			foreach ($events as $event) {
				if ($this->Events->save($event, ['validate' => false])) {
					$message = 'Saved';
				}
			}
			$this->set([
				'data' => $this->request->data,
				'message' => $message,
				'_serialize' => ['message', 'data']
			]);
		} else {
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
			$this->set(compact('event', 'creators', 'modifiers'));
		}
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
		$this->set(compact('event', 'creators', 'modifiers'));
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
