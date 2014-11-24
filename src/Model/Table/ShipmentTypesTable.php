<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ShipmentTypes Model
 */
class ShipmentTypesTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('shipment_types');
		$this->displayField('name');
		$this->primaryKey('id');
		$this->addBehavior('Timestamp');

		$this->belongsTo('Createds', [
			'foreignKey' => 'created_id',
		]);
		$this->belongsTo('Modifieds', [
			'foreignKey' => 'modified_id',
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
			->validatePresence('recstatus', 'create')
			->notEmpty('recstatus')
			->add('created_id', 'valid', ['rule' => 'numeric'])
			->allowEmpty('created_id')
			->add('modified_id', 'valid', ['rule' => 'numeric'])
			->allowEmpty('modified_id')
			->validatePresence('name', 'create')
			->notEmpty('name');

		return $validator;
	}

}
