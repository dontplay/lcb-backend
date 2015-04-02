<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Invoices Model
 */
class InvoicesTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('invoices');
		$this->displayField('id');
		$this->primaryKey('id');
		$this->addBehavior('Timestamp');
		$this->belongsTo('Createds', [
			'className' => 'Users',
			'foreignKey' => 'created_id'
		]);
		$this->belongsTo('Modifieds', [
			'className' => 'Users',
			'foreignKey' => 'modified_id'
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
