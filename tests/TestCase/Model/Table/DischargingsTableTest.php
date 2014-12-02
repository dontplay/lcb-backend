<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DischargingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DischargingsTable Test Case
 */
class DischargingsTableTest extends TestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'Dischargings' => 'app.dischargings',
		'Creators' => 'app.creators',
		'Modifiers' => 'app.modifiers',
		'Ports' => 'app.ports',
		'Countries' => 'app.countries',
		'Cities' => 'app.cities',
		'Customers' => 'app.customers',
		'CustomerCategories' => 'app.customer_categories',
		'CustomerContacts' => 'app.customer_contacts',
		'Orders' => 'app.orders',
		'VesselOwners' => 'app.vessel_owners',
		'VesselOwnerCategories' => 'app.vessel_owner_categories',
		'VesselOwnerContacts' => 'app.vessel_owner_contacts',
		'Vessels' => 'app.vessels',
		'Statuses' => 'app.statuses',
		'Invoices' => 'app.invoices',
		'Loadings' => 'app.loadings',
		'ShipmentTypes' => 'app.shipment_types',
		'PortAgents' => 'app.port_agents',
		'PortAgentContacts' => 'app.port_agent_contacts',
		'LoiStatuses' => 'app.loi_statuses',
		'BlStatuses' => 'app.bl_statuses'
	];

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('Dischargings') ? [] : ['className' => 'App\Model\Table\DischargingsTable'];
		$this->Dischargings = TableRegistry::get('Dischargings', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Dischargings);

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
