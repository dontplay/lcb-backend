<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrdersFixture
 *
 */
class OrdersFixture extends TestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = [
		'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
		'recstatus' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
		'creator_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
		'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => '0000-00-00 00:00:00', 'comment' => '', 'precision' => null],
		'modifier_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
		'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => '0000-00-00 00:00:00', 'comment' => '', 'precision' => null],
		'fixture_date' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => '0000-00-00', 'comment' => '', 'precision' => null],
		'laycan' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
		'customer_master_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
		'ship_owner_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
		'status_master_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
		'vessel_master_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
		'port_master_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
		'_indexes' => [
			'customer_master_id' => ['type' => 'index', 'columns' => ['customer_master_id'], 'length' => []],
			'ship_owner_id' => ['type' => 'index', 'columns' => ['ship_owner_id'], 'length' => []],
			'status_master_id' => ['type' => 'index', 'columns' => ['status_master_id'], 'length' => []],
			'vessel_master_id' => ['type' => 'index', 'columns' => ['vessel_master_id'], 'length' => []],
			'port_master_id' => ['type' => 'index', 'columns' => ['port_master_id'], 'length' => []],
			'creator_id' => ['type' => 'index', 'columns' => ['creator_id'], 'length' => []],
			'modifier_id' => ['type' => 'index', 'columns' => ['modifier_id'], 'length' => []],
		],
		'_constraints' => [
			'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
			'orders_ibfk_10' => ['type' => 'foreign', 'columns' => ['port_master_id'], 'references' => ['ports', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
			'orders_ibfk_5' => ['type' => 'foreign', 'columns' => ['customer_master_id'], 'references' => ['customers', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
			'orders_ibfk_6' => ['type' => 'foreign', 'columns' => ['ship_owner_id'], 'references' => ['vessel_owners', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
			'orders_ibfk_7' => ['type' => 'foreign', 'columns' => ['status_master_id'], 'references' => ['statuses', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
			'orders_ibfk_8' => ['type' => 'foreign', 'columns' => ['vessel_master_id'], 'references' => ['vessels', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
		],
		'_options' => [
'engine' => 'InnoDB', 'collation' => 'latin1_swedish_ci'
		],
	];

/**
 * Records
 *
 * @var array
 */
	public $records = [
		[
			'id' => 1,
			'recstatus' => 1,
			'creator_id' => 1,
			'created' => '2014-10-30 18:12:27',
			'modifier_id' => 1,
			'modified' => '2014-10-30 18:12:27',
			'fixture_date' => '2014-10-30',
			'laycan' => 1,
			'customer_master_id' => 1,
			'ship_owner_id' => 1,
			'status_master_id' => 1,
			'vessel_master_id' => 1,
			'port_master_id' => 1
		],
	];

}
