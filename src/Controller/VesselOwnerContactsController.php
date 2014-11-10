<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VesselOwnerContacts Controller
 *
 * @property App\Model\Table\VesselOwnerContactsTable $VesselOwnerContacts
 */
class VesselOwnerContactsController extends AppController {

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
			'contain' => ['Creators', 'Modifiers', 'VesselOwners']
		];
		$this->set('vesselOwnerContacts', $this->paginate($this->VesselOwnerContacts));
        $this->set('_serialize', ['vesselOwnerContacts']);
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
			$vesselOwnerContact = $this->VesselOwnerContacts->get($id);
			$this->set('vesselOwnerContact', $vesselOwnerContact);
	        $this->set('_serialize', ['vesselOwnerContact']);
		}
		else {
			$vesselOwnerContact = $this->VesselOwnerContacts->get($id, [
				'contain' => ['Creators', 'Modifiers', 'VesselOwners']
			]);
			$this->set('vesselOwnerContact', $vesselOwnerContact);
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
	        $vesselOwnerContact = $this->VesselOwnerContacts->get($id);
	        $message = 'Deleted';
	        if (!$this->VesselOwnerContacts->delete($vesselOwnerContact)) {
	            $message = 'Error';
	        }
	        $this->set([
	            'message' => $message,
	            '_serialize' => ['message']
	        ]);
		}
		else {		
			$vesselOwnerContact = $this->VesselOwnerContacts->get($id);
			$this->request->allowMethod(['post', 'delete']);
			if ($this->VesselOwnerContacts->delete($vesselOwnerContact)) {
				$this->Flash->success('The vesselOwnerContact has been deleted.');
			} else {
				$this->Flash->error('The vesselOwnerContact could not be deleted. Please, try again.');
			}
			return $this->redirect(['action' => 'index']);
		}
	}
}
