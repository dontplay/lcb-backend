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
			'foreignKey' => 'creator_id',
		]);
		$this->belongsTo('Modifiers', [
			'className' => 'Users',
			'foreignKey' => 'modifier_id',
		]);
		$this->belongsTo('Customers', [
			'foreignKey' => 'customer_id',
		]);
		$this->belongsTo('VesselOwners', [
			'foreignKey' => 'vessel_owner_id',
		]);
		$this->belongsTo('Statuses', [
			'foreignKey' => 'status_id',
		]);
		$this->belongsTo('Vessels', [
			'foreignKey' => 'vessel_id',
		]);
		$this->hasMany('Dischargings', [
			'foreignKey' => 'order_id',
		]);
		$this->hasMany('Invoices', [
			'foreignKey' => 'order_id',
		]);
		$this->hasMany('Loadings', [
			'foreignKey' => 'order_id',
		]);
	}

/**
 * Default validation rules.
 *
 * @param \Cake\Validation\Validator $validator
 * @return \Cake\Validation\Validator
 */
	public function validationDefault(Validator $validator) {
		$validator
			->add('id', 'valid', ['rule' => 'numeric'])
			->allowEmpty('id', 'create')
			->add('recstatus', 'valid', ['rule' => 'numeric'])
			->validatePresence('recstatus', 'create')
			->notEmpty('recstatus')
			->add('creator_id', 'valid', ['rule' => 'numeric'])
			->allowEmpty('creator_id')
			->add('modifier_id', 'valid', ['rule' => 'numeric'])
			->allowEmpty('modifier_id')
			->add('fixtureDate', 'valid', ['rule' => 'date'])
			->validatePresence('fixtureDate', 'create')
			->notEmpty('fixtureDate')
			->add('laycanStartDate', 'valid', ['rule' => 'date'])
			->validatePresence('laycanStartDate', 'create')
			->notEmpty('laycanStartDate')
			->add('laycanEndDate', 'valid', ['rule' => 'date'])
			->validatePresence('laycanEndDate', 'create')
			->notEmpty('laycanEndDate')
			->add('customer_id', 'valid', ['rule' => 'numeric'])
			->validatePresence('customer_id', 'create')
			->notEmpty('customer_id')
			->add('vessel_owner_id', 'valid', ['rule' => 'numeric'])
			->validatePresence('vessel_owner_id', 'create')
			->notEmpty('vessel_owner_id')
			->add('status_id', 'valid', ['rule' => 'numeric'])
			->validatePresence('status_id', 'create')
			->notEmpty('status_id')
			->add('vessel_id', 'valid', ['rule' => 'numeric'])
			->validatePresence('vessel_id', 'create')
			->notEmpty('vessel_id');

		return $validator;
	}

}
