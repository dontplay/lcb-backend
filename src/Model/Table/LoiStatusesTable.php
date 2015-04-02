<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LoiStatuses Model
 */
class LoiStatusesTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('loi_statuses');
		$this->displayField('name');
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
		$this->hasMany('Loadings', [
			'foreignKey' => 'loi_status_id',
			'dependent' => true,
    	'cascadeCallbacks' => true
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
			->add('recstatus', 'valid', ['rule' => 'boolean'])
			->requirePresence('recstatus', 'create')
			->notEmpty('recstatus')
			->add('creator_id', 'valid', ['rule' => 'numeric'])
			->allowEmpty('creator_id')
			->add('modifier_id', 'valid', ['rule' => 'numeric'])
			->allowEmpty('modifier_id')
			->requirePresence('name', 'create')
			->add('name',['unique' => ['rule' => 'validateUnique', 'provider' => 'table']])
			->notEmpty('name');

		return $validator;
	}

}
