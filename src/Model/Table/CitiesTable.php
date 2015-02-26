<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cities Model
 */
class CitiesTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('cities');
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
		$this->belongsTo('Countries', [
			'foreignKey' => 'country_id',
		]);
		$this->hasMany('Customers', [
			'foreignKey' => 'city_id',
			'dependent' => true,
    	'cascadeCallbacks' => true
		]);
		$this->hasMany('VesselOwners', [
			'foreignKey' => 'city_id',
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
			->validatePresence('recstatus', 'create')
			->notEmpty('recstatus')
			->add('creator_id', 'valid', ['rule' => 'numeric'])
			->allowEmpty('creator_id')
			->add('modifier_id', 'valid', ['rule' => 'numeric'])
			->allowEmpty('modifier_id')
			->validatePresence('name', 'create')
			->notEmpty('name')
			->add('country_id', 'valid', ['rule' => 'numeric'])
			->validatePresence('country_id', 'create')
			->notEmpty('country_id');

		return $validator;
	}

}
