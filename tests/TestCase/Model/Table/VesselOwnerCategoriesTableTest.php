<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use App\Model\Table\VesselOwnerCategoriesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VesselOwnerCategoriesTable Test Case
 */
class VesselOwnerCategoriesTableTest extends TestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'app.vessel_owner_categories',
		'app.creators',
		'app.modifiers',
		'app.vessel_owners',
		'app.categories',
		'app.customers',
		'app.cities',
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
		'app.vessels'
	];

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('VesselOwnerCategories') ? [] : ['className' => 'App\Model\Table\VesselOwnerCategoriesTable'];
		$this->VesselOwnerCategories = TableRegistry::get('VesselOwnerCategories', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->VesselOwnerCategories);

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
