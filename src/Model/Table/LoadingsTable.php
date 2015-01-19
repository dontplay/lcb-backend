<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Loadings Model
 */
class LoadingsTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('loadings');
		$this->displayField('order_id');
		$this->primaryKey('order_id');
		$this->addBehavior('Timestamp');
		$this->belongsTo('Creators', [
			'className' => 'Users',
			'foreignKey' => 'creator_id'
		]);
		$this->belongsTo('Modifiers', [
			'className' => 'Users',
			'foreignKey' => 'modifier_id'
		]);
		$this->belongsTo('Ports', [
			'alias' => 'Ports',
			'foreignKey' => 'port_id'
		]);
		$this->belongsTo('Ports2', [
			'className' => 'Ports',
			'foreignKey' => 'two_port_id'
		]);
		$this->belongsTo('ShipmentTypes', [
			'alias' => 'ShipmentTypes',
			'foreignKey' => 'shipment_type_id'
		]);
		$this->belongsTo('PortAgents', [
			'alias' => 'PortAgents',
			'foreignKey' => 'port_agent_id'
		]);
		$this->belongsTo('LoiStatuses', [
			'alias' => 'LoiStatuses',
			'foreignKey' => 'loi_status_id'
		]);
		$this->belongsTo('BlStatuses', [
			'alias' => 'BlStatuses',
			'foreignKey' => 'bl_status_id'
		]);
		$this->belongsTo('Orders', [
			'alias' => 'Orders',
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
			->add('recstatus', 'valid', ['rule' => 'boolean'])
			->requirePresence('recstatus', 'create')
			->notEmpty('recstatus')
			->add('creator_id', 'valid', ['rule' => 'numeric'])
			->allowEmpty('creator_id')
			->add('modifier_id', 'valid', ['rule' => 'numeric'])
			->allowEmpty('modifier_id')
			->add('port_id', 'valid', ['rule' => 'numeric'])
			->requirePresence('port_id', 'create')
			->notEmpty('port_id')
			->add('rate', 'valid', ['rule' => 'numeric'])
			->requirePresence('rate', 'create')
			->notEmpty('rate')
			->add('freight', 'valid', ['rule' => 'numeric'])
			->requirePresence('freight', 'create')
			->notEmpty('freight')
			->requirePresence('shipment_size', 'create')
			->notEmpty('shipment_size')
			->add('shipment_type_id', 'valid', ['rule' => 'numeric'])
			->requirePresence('shipment_type_id', 'create')
			->notEmpty('shipment_type_id')
			->add('add_comm', 'valid', ['rule' => 'numeric'])
			->requirePresence('add_comm', 'create')
			->notEmpty('add_comm')
			->add('broking_dollar', 'valid', ['rule' => 'numeric'])
			->requirePresence('broking_dollar', 'create')
			->notEmpty('broking_dollar')
			->add('broking_percentage', 'valid', ['rule' => 'numeric'])
			->requirePresence('broking_percentage', 'create')
			->notEmpty('broking_percentage')
			->requirePresence('payment_terms', 'create')
			->notEmpty('payment_terms')
			->add('demurrage_rate', 'valid', ['rule' => 'numeric'])
			->requirePresence('demurrage_rate', 'create')
			->notEmpty('demurrage_rate')
			->requirePresence('nomination_clause', 'create')
			->notEmpty('nomination_clause')
			->add('dueDate', 'valid', ['rule' => 'datetime'])
			->requirePresence('dueDate', 'create')
			->notEmpty('dueDate')
			->add('eta', 'valid', ['rule' => 'datetime'])
			->requirePresence('eta', 'create')
			->notEmpty('eta')
			->requirePresence('comment', 'create')
			->notEmpty('comment')
			->add('port_agent_id', 'valid', ['rule' => 'numeric'])
			->requirePresence('port_agent_id', 'create')
			->notEmpty('port_agent_id')
			->add('stow_plan', 'valid', ['rule' => 'numeric'])
			->requirePresence('stow_plan', 'create')
			->notEmpty('stow_plan')
			->add('dead_freight', 'valid', ['rule' => 'numeric'])
			->requirePresence('dead_freight', 'create')
			->notEmpty('dead_freight')
			->add('discount_freight', 'valid', ['rule' => 'numeric'])
			->requirePresence('discount_freight', 'create')
			->notEmpty('discount_freight')
			->add('qty_loaded', 'valid', ['rule' => 'numeric'])
			->requirePresence('qty_loaded', 'create')
			->notEmpty('qty_loaded')
			->add('commLoading', 'valid', ['rule' => 'datetime'])
			->requirePresence('commLoading', 'create')
			->notEmpty('commLoading')
			->requirePresence('status', 'create')
			->notEmpty('status')
			->add('completionDate', 'valid', ['rule' => 'datetime'])
			->requirePresence('completionDate', 'create')
			->notEmpty('completionDate')
			->add('blDate', 'valid', ['rule' => 'datetime'])
			->requirePresence('blDate', 'create')
			->notEmpty('blDate')
			->add('loi_status_id', 'valid', ['rule' => 'numeric'])
			->requirePresence('loi_status_id', 'create')
			->notEmpty('loi_status_id')
			->add('bl_status_id', 'valid', ['rule' => 'numeric'])
			->requirePresence('bl_status_id', 'create')
			->notEmpty('bl_status_id')
			->add('order_id', 'valid', ['rule' => 'numeric'])
			->requirePresence('order_id', 'create')
			->notEmpty('order_id');

		return $validator;
	}

}
