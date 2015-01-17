<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Dischargings Model
 */
class DischargingsTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('dischargings');
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
		$this->belongsTo('Ports', [
			'alias' => 'Ports',
			'foreignKey' => 'port_id'
		]);
		$this->belongsTo('Ports', [
			'alias' => 'Ports',
			'foreignKey' => 'two_port_id'
		]);
		$this->belongsTo('PortAgents', [
			'alias' => 'PortAgents',
			'foreignKey' => 'port_agent_id'
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
			->add('eta', 'valid', ['rule' => 'datetime'])
			->requirePresence('eta', 'create')
			->notEmpty('eta')
			->requirePresence('comment', 'create')
			->notEmpty('comment')
			->add('port_agent_id', 'valid', ['rule' => 'numeric'])
			->requirePresence('port_agent_id', 'create')
			->notEmpty('port_agent_id')
			->add('commDischarging', 'valid', ['rule' => 'datetime'])
			->requirePresence('commDischarging', 'create')
			->notEmpty('commDischarging')
			->requirePresence('status', 'create')
			->notEmpty('status')
			->add('completionDate', 'valid', ['rule' => 'datetime'])
			->requirePresence('completionDate', 'create')
			->notEmpty('completionDate')
			->add('order_id', 'valid', ['rule' => 'numeric'])
			->requirePresence('order_id', 'create')
			->notEmpty('order_id');

		return $validator;
	}

}
