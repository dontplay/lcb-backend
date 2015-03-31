<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Customers Model
 */
class CustomersTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('customers');
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
		$this->belongsTo('Cities', [
			'foreignKey' => 'city_id',
		]);
		$this->hasMany('CustomerContacts', [
			'foreignKey' => 'customer_id',
			'dependent' => true,
    	'cascadeCallbacks' => true
		]);
		$this->hasMany('Orders', [
			'foreignKey' => 'customer_id',
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
			->notEmpty('name')
			->requirePresence('address', 'create')
			->notEmpty('address')
			->add('pincode', 'valid', ['rule' => 'numeric'])
			->requirePresence('pincode', 'create')
			->notEmpty('pincode')
			->add('email', 'valid', ['rule' => 'email'])
			->requirePresence('email', 'create')
			->notEmpty('email')
			->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table'])
			->add('contact', 'valid', ['rule' => 'numeric'])
			->requirePresence('contact', 'create')
			->notEmpty('contact')
			->add('credit_period', 'valid', ['rule' => 'numeric'])
			->requirePresence('credit_period', 'create')
			->notEmpty('credit_period')
			->requirePresence('remarks', 'create')
			->notEmpty('remarks')
			->add('city_id', 'valid', ['rule' => 'numeric'])
			->requirePresence('city_id', 'create')
			->notEmpty('city_id');

		return $validator;
	}

}
