<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use App\Model\Table\LoadingsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LoadingsTable Test Case
 */
class LoadingsTableTest extends TestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'app.loadings',
		'app.creators',
		'app.modifiers',
		'app.loi_statuses',
		'app.dischargings',
		'app.bill_statuses',
		'app.orders',
		'app.customer_masters',
		'app.ship_owners',
		'app.status_masters',
		'app.vessel_masters',
		'app.port_masters',
		'app.ports',
		'app.countries',
		'app.cities',
		'app.customers',
		'app.categories',
		'app.vessel_owners',
		'app.vessels'
	];

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('Loadings') ? [] : ['className' => 'App\Model\Table\LoadingsTable'];
		$this->Loadings = TableRegistry::get('Loadings', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Loadings);

		parent::tearDown();
	}

/**
 * Test initialize method
 *
 * @return void
 */
	public function testInitialize() {
		$this->markTestIncomplete('Not implemented yet.');
	}

/**
 * Test validationDefault method
 *
 * @return void
 */
	public function testValidationDefault() {
		$this->markTestIncomplete('Not implemented yet.');
	}

}
