<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Orders Model
 */
class OrdersTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('orders');
		$this->displayField('id');
		$this->primaryKey('id');
		$this->addBehavior('Timestamp');
		$this->belongsTo('Creators', [
			'className' => 'Users',
			'foreignKey' => 'creator_id'
		]);
		$this->belongsTo('Modifiers', [
			'className' => 'Users',
			'foreignKey' => 'modifier_id'
		]);
		$this->belongsTo('Customers', [
			'alias' => 'Customers',
			'foreignKey' => 'customer_id'
		]);
		$this->belongsTo('VesselOwners', [
			'alias' => 'VesselOwners',
			'foreignKey' => 'vessel_owner_id'
		]);
		$this->belongsTo('Statuses', [
			'alias' => 'Statuses',
			'foreignKey' => 'status_id'
		]);
		$this->belongsTo('Vessels', [
			'alias' => 'Vessels',
			'foreignKey' => 'vessel_id'
		]);
		$this->belongsTo('Users', [
			'alias' => 'Users',
			'foreignKey' => 'user_id'
		]);
		$this->hasMany('Dischargings', [
			'alias' => 'Dischargings',
			'foreignKey' => 'order_id',
			'dependent' => true,
    	'cascadeCallbacks' => true
		]);
		$this->hasMany('Invoices', [
			'alias' => 'Invoices',
			'foreignKey' => 'order_id',
			'dependent' => true,
    	'cascadeCallbacks' => true
		]);
		$this->hasMany('Loadings', [
			'alias' => 'Loadings',
			'foreignKey' => 'order_id',
			'dependent' => true,
    	'cascadeCallbacks' => true
		]);
		$this->hasMany('Events', [
			'alias' => 'Events',
			'foreignKey' => 'order_id',
			'dependent' => true,
    	'cascadeCallbacks' => true
		]);

	}

/**
 * Default validation rules.
 *
 * @param \Cake\Validation\Validator $validator instance
 * @return \Cake\Validation\Validator
 */
	public function validationDefault(Validator $validator) {
		$validator
			->add('id', 'valid', ['rule' => 'numeric'])
			->allowEmpty('id', 'create');

		return $validator;
	}

}
