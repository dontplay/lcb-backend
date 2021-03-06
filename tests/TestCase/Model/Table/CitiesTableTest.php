<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use App\Model\Table\CitiesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CitiesTable Test Case
 */
class CitiesTableTest extends TestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'app.cities',
		'app.creators',
		'app.modifiers',
		'app.countries',
		'app.ports',
		'app.dischargings',
		'app.loadings',
		'app.loi_statuses',
		'app.bill_statuses',
		'app.orders',
		'app.customer_masters',
		'app.ship_owners',
		'app.status_masters',
		'app.vessel_masters',
		'app.port_masters',
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
		$config = TableRegistry::exists('Cities') ? [] : ['className' => 'App\Model\Table\CitiesTable'];
		$this->Cities = TableRegistry::get('Cities', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Cities);

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
