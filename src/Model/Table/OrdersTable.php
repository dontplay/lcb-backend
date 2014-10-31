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
			'foreignKey' => 'creator_id',
		]);
		$this->belongsTo('Modifiers', [
			'foreignKey' => 'modifier_id',
		]);
		$this->belongsTo('CustomerMasters', [
			'foreignKey' => 'customer_master_id',
		]);
		$this->belongsTo('ShipOwners', [
			'foreignKey' => 'ship_owner_id',
		]);
		$this->belongsTo('StatusMasters', [
			'foreignKey' => 'status_master_id',
		]);
		$this->belongsTo('VesselMasters', [
			'foreignKey' => 'vessel_master_id',
		]);
		$this->belongsTo('PortMasters', [
			'foreignKey' => 'port_master_id',
		]);
		$this->hasMany('Dischargings', [
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
			->add('fixture_date', 'valid', ['rule' => 'date'])
			->validatePresence('fixture_date', 'create')
			->notEmpty('fixture_date')
			->add('laycan', 'valid', ['rule' => 'numeric'])
			->validatePresence('laycan', 'create')
			->notEmpty('laycan')
			->add('customer_master_id', 'valid', ['rule' => 'numeric'])
			->validatePresence('customer_master_id', 'create')
			->notEmpty('customer_master_id')
			->add('ship_owner_id', 'valid', ['rule' => 'numeric'])
			->validatePresence('ship_owner_id', 'create')
			->notEmpty('ship_owner_id')
			->add('status_master_id', 'valid', ['rule' => 'numeric'])
			->validatePresence('status_master_id', 'create')
			->notEmpty('status_master_id')
			->add('vessel_master_id', 'valid', ['rule' => 'numeric'])
			->validatePresence('vessel_master_id', 'create')
			->notEmpty('vessel_master_id')
			->add('port_master_id', 'valid', ['rule' => 'numeric'])
			->validatePresence('port_master_id', 'create')
			->notEmpty('port_master_id');

		return $validator;
	}

}
