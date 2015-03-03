<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Exception\ForbiddenException;
use \JWT;
use Cake\Utility\Security;


/**
 * Users Controller
 *
 * @property App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController {

	public function login() {
        if (!$this->request->is('post')) {
            return;
        }
        $user = $this->Auth->identify();
        if ($this->request->is('json')) {
            $token = $message = 'Error';
            if ($user) {
                $token = JWT::encode(array('record' => $user), Security::salt());
                $message = 'Saved';
            } else {
                $message = 'Error';
            }
            $this->set([
                'token' => $token,
                'message' => $message,
                '_serialize' => ['token', 'message']
            ]);
            return;
        }
        if ($user) {
            $this->Auth->setUser($user);
            return $this->redirect($this->Auth->redirectUrl());
        }
        $this->Flash->error(__('Invalid username or password, try again'));
    }
    
	public function logout() {
	    return $this->redirect($this->Auth->logout());
	}

/**
 * Initialize method
 *
 * @return void
 */

	public function initialize() {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

/**
 * Index method
 *
 * @return void
 */

	public function index() {
		if ($this->request->params['_ext']) {
			$this->set('users', $this->Users->find('all',['contain' => ['Creators','Modifiers']]));
			$this->set('_serialize', ['users']);
		}
		else {
			$this->paginate = [
				'contain' => ['Creators', 'Modifiers']
			];
			$this->set('users', $this->paginate($this->Users));
	    }
    }

/**
 * View method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function view($id) {
		$user = $this->Users->get($id, [
			'contain' => ['Creators', 'Modifiers']
		]);
		$this->set('user', $user);
        $this->set('_serialize', ['user']);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->params['_ext']) {
			$user = $this->Users->newEntity($this->request->data);
			if ($this->Users->save($user)) {
				$message = 'Saved';
        $error = '';
			} else {
				$message = 'Error';
        $error = $user->errors();
			}
			$this->set([
				'data' => $this->request->data,
				'message' => $message,
				'user' => $user,
        'error' => $error,
				'_serialize' => ['message', 'user', 'data','error']
			]);
		} else {
			$user = $this->Users->newEntity($this->request->data);
			if ($this->request->is('post')) {
				if ($this->Users->save($user)) {
					$this->Flash->success('The user has been saved.');
					return $this->redirect(['action' => 'index']);
				} else {
					$this->Flash->error('The user could not be saved. Please, try again.');
				}
			}
			$creators = $this->Users->Creators->find('list');
			$modifiers = $this->Users->Modifiers->find('list');
			$this->set(compact('user', 'creators', 'modifiers'));
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
  		$user = $this->Users->get($id);
  		if ($this->request->is(['patch', 'post', 'put'])) {
  			$user = $this->Users->patchEntity($user, $this->request->data);
  			if ($this->Users->save($user)) {
        $message = 'Saved';
        $error = '';
      } else {
        $message = 'Error';
        $error = $user->errors();
      }
      $this->set([
        'data' => $this->request->data,
        'message' => $message,
        'user' => $user,
        'error' => $error,
        '_serialize' => ['message', 'user', 'data','error']
      ]);
    } 
  } else {
      $user = $this->Users->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
          $user = $this->Users->patchEntity($user, $this->request->data);
          if ($this->Users->save($user)) {
            $this->Flash->success('The user has been saved.');
            return $this->redirect(['action' => 'index']);
          } else {
            $this->Flash->error('The user could not be saved. Please, try again.');
          }
        }
  		$creators = $this->Users->Creators->find('list');
  		$modifiers = $this->Users->Modifiers->find('list');
  		$this->set(compact('user', 'creators', 'modifiers'));
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
		$user = $this->Users->get($id);
		$this->request->allowMethod(['post', 'delete']);
		if ($this->Users->delete($user)) {
			$this->Flash->success('The user has been deleted.');
		} else {
			$this->Flash->error('The user could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}
}
