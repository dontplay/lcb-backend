<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use ADmad\JwtAuth\Auth\JwtAuthenticate;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

/**
 * Initialization hook method.
 *
 * Use this method to add common initialization code like loading components.
 *
 * @return void
 */
	public function initialize() {
		$this->loadComponent('Flash');
		$this->loadComponent('RequestHandler');
		$this->loadComponent('Auth');
		$this->response->header('Access-Control-Allow-Origin', '*');
		$this->response->header('Access-Control-Allow-Methods', '*');

	}

	public function beforeFilter(Event $event) {
	    parent::beforeFilter($event);
	    
	    $this->Auth->config('authenticate', [
	        'ADmad/JwtAuth.Jwt' => [
	            'parameter' => '_token',
	            'userModel' => 'Users',
	            'scope' => ['Users.recstatus' => 1],
	            'fields' => [
	                'id'=>'id'
	            ]
	        ],
	        'Form' => [
                	'fields' => ['username' => 'username', 'password' => 'password']
            ]
	    ]);
	    // Allow users to register and logout.
	    // You should not add the "login" action to allow list. Doing so would
	    // cause problems with normal functioning of AuthComponent.
	    $this->Auth->allow(['add', 'logout','login']);
	}
}