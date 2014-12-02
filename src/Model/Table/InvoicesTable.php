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
			->allowEmpty('id', 'create')
			->add('recstatus', 'valid', ['rule' => 'boolean'])
			->requirePresence('recstatus', 'create')
			->notEmpty('recstatus')
			->add('created_id', 'valid', ['rule' => 'numeric'])
			->allowEmpty('created_id')
			->add('modified_id', 'valid', ['rule' => 'numeric'])
			->allowEmpty('modified_id')
			->add('freight_due', 'valid', ['rule' => 'numeric'])
			->requirePresence('freight_due', 'create')
			->notEmpty('freight_due')
			->add('freightInvoicedDate', 'valid', ['rule' => 'datetime'])
			->requirePresence('freightInvoicedDate', 'create')
			->notEmpty('freightInvoicedDate')
			->add('freight_invoiced', 'valid', ['rule' => 'numeric'])
			->requirePresence('freight_invoiced', 'create')
			->notEmpty('freight_invoiced')
			->add('freightPaidDate', 'valid', ['rule' => 'datetime'])
			->requirePresence('freightPaidDate', 'create')
			->notEmpty('freightPaidDate')
			->add('freight_paid', 'valid', ['rule' => 'numeric'])
			->requirePresence('freight_paid', 'create')
			->notEmpty('freight_paid')
			->add('lpo', 'valid', ['rule' => 'numeric'])
			->requirePresence('lpo', 'create')
			->notEmpty('lpo')
			->add('lpc', 'valid', ['rule' => 'numeric'])
			->requirePresence('lpc', 'create')
			->notEmpty('lpc')
			->add('dpc', 'valid', ['rule' => 'numeric'])
			->requirePresence('dpc', 'create')
			->notEmpty('dpc')
			->add('dpo', 'valid', ['rule' => 'numeric'])
			->requirePresence('dpo', 'create')
			->notEmpty('dpo')
			->add('final_freight', 'valid', ['rule' => 'numeric'])
			->requirePresence('final_freight', 'create')
			->notEmpty('final_freight')
			->add('brokerageLfb', 'valid', ['rule' => 'datetime'])
			->requirePresence('brokerageLfb', 'create')
			->notEmpty('brokerageLfb')
			->add('lfbBrokerageReceived', 'valid', ['rule' => 'datetime'])
			->requirePresence('lfbBrokerageReceived', 'create')
			->notEmpty('lfbBrokerageReceived')
			->add('lfbBrokerageRaised', 'valid', ['rule' => 'datetime'])
			->requirePresence('lfbBrokerageRaised', 'create')
			->notEmpty('lfbBrokerageRaised')
			->add('order_id', 'valid', ['rule' => 'numeric'])
			->requirePresence('order_id', 'create')
			->notEmpty('order_id');

		return $validator;
	}

}
