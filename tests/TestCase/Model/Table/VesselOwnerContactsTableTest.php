<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use App\Model\Table\VesselOwnerContactsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VesselOwnerContactsTable Test Case
 */
class VesselOwnerContactsTableTest extends TestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'app.vessel_owner_contacts',
		'app.creators',
		'app.modifiers',
		'app.vessel_owners',
		'app.vessel_owner_categories',
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
		'app.customers',
		'app.customer_categories',
		'app.customer_contacts',
		'app.vessels'
	];

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('VesselOwnerContacts') ? [] : ['className' => 'App\Model\Table\VesselOwnerContactsTable'];
		$this->VesselOwnerContacts = TableRegistry::get('VesselOwnerContacts', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->VesselOwnerContacts);

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
