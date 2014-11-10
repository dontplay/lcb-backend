<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use App\Model\Table\CustomerCategoriesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CustomerCategoriesTable Test Case
 */
class CustomerCategoriesTableTest extends TestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'app.customer_categories',
		'app.creators',
		'app.modifiers',
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
		'app.vessel_owners',
		'app.vessel_owner_categories',
		'app.vessel_owner_contacts',
		'app.vessels',
		'app.categories'
	];

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('CustomerCategories') ? [] : ['className' => 'App\Model\Table\CustomerCategoriesTable'];
		$this->CustomerCategories = TableRegistry::get('CustomerCategories', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CustomerCategories);

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
