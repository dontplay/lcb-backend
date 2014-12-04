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
			'foreignKey' => 'order_id'
		]);
		$this->hasMany('Invoices', [
			'alias' => 'Invoices',
			'foreignKey' => 'order_id'
		]);
		$this->hasMany('Loadings', [
			'alias' => 'Loadings',
			'foreignKey' => 'order_id'
		]);
		$this->hasMany('Events', [
			'alias' => 'Events',
			'foreignKey' => 'order_id'
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
			->allowEmpty('id', 'create')
			->add('recstatus', 'valid', ['rule' => 'numeric'])
			->requirePresence('recstatus', 'create')
			->notEmpty('recstatus')
			->add('creator_id', 'valid', ['rule' => 'numeric'])
			->allowEmpty('creator_id')
			->add('modifier_id', 'valid', ['rule' => 'numeric'])
			->allowEmpty('modifier_id')
			->add('fixtureDate', 'valid', ['rule' => 'datetime'])
			->requirePresence('fixtureDate', 'create')
			->notEmpty('fixtureDate')
			->add('laycanStartDate', 'valid', ['rule' => 'datetime'])
			->requirePresence('laycanStartDate', 'create')
			->notEmpty('laycanStartDate')
			->add('laycanEndDate', 'valid', ['rule' => 'datetime'])
			->requirePresence('laycanEndDate', 'create')
			->notEmpty('laycanEndDate')
			->add('customer_id', 'valid', ['rule' => 'numeric'])
			->requirePresence('customer_id', 'create')
			->notEmpty('customer_id')
			->add('vessel_owner_id', 'valid', ['rule' => 'numeric'])
			->requirePresence('vessel_owner_id', 'create')
			->notEmpty('vessel_owner_id')
			->add('status_id', 'valid', ['rule' => 'numeric'])
			->requirePresence('status_id', 'create')
			->notEmpty('status_id')
			->add('vessel_id', 'valid', ['rule' => 'numeric'])
			->requirePresence('vessel_id', 'create')
			->notEmpty('vessel_id')
			->add('user_id', 'valid', ['rule' => 'numeric'])
			->requirePresence('user_id', 'create')
			->notEmpty('user_id');

		return $validator;
	}

}
