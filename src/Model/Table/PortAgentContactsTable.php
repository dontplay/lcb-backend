<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PortAgentContacts Model
 */
class PortAgentContactsTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('port_agent_contacts');
		$this->displayField('name');
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
		$this->belongsTo('PortAgents', [
			'alias' => 'PortAgents',
			'foreignKey' => 'port_agent_id'
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
