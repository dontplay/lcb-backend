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
			'foreignKey' => 'creator_id',
		]);
		$this->belongsTo('Modifiers', [
			'foreignKey' => 'modifier_id',
		]);
		$this->belongsTo('LoiStatuses', [
			'foreignKey' => 'loi_status_id',
		]);
		$this->belongsTo('BillStatuses', [
			'foreignKey' => 'bill_status_id',
		]);
		$this->belongsTo('Orders', [
			'foreignKey' => 'order_id',
		]);
		$this->belongsTo('Ports', [
			'foreignKey' => 'port_id',
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
			->validatePresence('id', 'create')
			->notEmpty('id')
			->add('recstatus', 'valid', ['rule' => 'boolean'])
			->validatePresence('recstatus', 'create')
			->notEmpty('recstatus')
			->add('creator_id', 'valid', ['rule' => 'numeric'])
			->allowEmpty('creator_id')
			->add('modifier_id', 'valid', ['rule' => 'numeric'])
			->allowEmpty('modifier_id')
			->add('rate', 'valid', ['rule' => 'numeric'])
			->validatePresence('rate', 'create')
			->notEmpty('rate')
			->add('fright', 'valid', ['rule' => 'numeric'])
			->validatePresence('fright', 'create')
			->notEmpty('fright')
			->add('add_comm', 'valid', ['rule' => 'numeric'])
			->validatePresence('add_comm', 'create')
			->notEmpty('add_comm')
			->add('broking', 'valid', ['rule' => 'numeric'])
			->validatePresence('broking', 'create')
			->notEmpty('broking')
			->validatePresence('payment_tnc', 'create')
			->notEmpty('payment_tnc')
			->add('demurrage_rate', 'valid', ['rule' => 'numeric'])
			->validatePresence('demurrage_rate', 'create')
			->notEmpty('demurrage_rate')
			->add('due_date', 'valid', ['rule' => 'date'])
			->validatePresence('due_date', 'create')
			->notEmpty('due_date')
			->add('eta', 'valid', ['rule' => 'date'])
			->validatePresence('eta', 'create')
			->notEmpty('eta')
			->validatePresence('comments', 'create')
			->notEmpty('comments')
			->validatePresence('load_portagent', 'create')
			->notEmpty('load_portagent')
			->add('qty_loaded', 'valid', ['rule' => 'numeric'])
			->validatePresence('qty_loaded', 'create')
			->notEmpty('qty_loaded')
			->add('comm_loading', 'valid', ['rule' => 'date'])
			->validatePresence('comm_loading', 'create')
			->notEmpty('comm_loading')
			->add('status', 'valid', ['rule' => 'numeric'])
			->validatePresence('status', 'create')
			->notEmpty('status')
			->add('completiondate', 'valid', ['rule' => 'date'])
			->validatePresence('completiondate', 'create')
			->notEmpty('completiondate')
			->add('billdate', 'valid', ['rule' => 'date'])
			->validatePresence('billdate', 'create')
			->notEmpty('billdate')
			->add('loi_status_id', 'valid', ['rule' => 'numeric'])
			->validatePresence('loi_status_id', 'create')
			->notEmpty('loi_status_id')
			->add('bill_status_id', 'valid', ['rule' => 'numeric'])
			->validatePresence('bill_status_id', 'create')
			->notEmpty('bill_status_id')
			->add('order_id', 'valid', ['rule' => 'numeric'])
			->allowEmpty('order_id', 'create')
			->add('port_id', 'valid', ['rule' => 'numeric'])
			->validatePresence('port_id', 'create')
			->notEmpty('port_id');

		return $validator;
	}

}
