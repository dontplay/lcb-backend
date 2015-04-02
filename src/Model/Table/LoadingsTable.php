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
			->allowEmpty('id', 'create');

		return $validator;
	}

}
