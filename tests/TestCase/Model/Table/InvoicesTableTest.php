<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InvoicesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InvoicesTable Test Case
 */
class InvoicesTableTest extends TestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'Invoices' => 'app.invoices',
		'Createds' => 'app.createds',
		'Modifieds' => 'app.modifieds',
		'Orders' => 'app.orders',
		'Creators' => 'app.creators',
		'Modifiers' => 'app.modifiers',
		'Customers' => 'app.customers',
		'Cities' => 'app.cities',
		'Countries' => 'app.countries',
		'Ports' => 'app.ports',
		'Dischargings' => 'app.dischargings',
		'PortAgents' => 'app.port_agents',
		'Loadings' => 'app.loadings',
		'ShipmentTypes' => 'app.shipment_types',
		'LoiStatuses' => 'app.loi_statuses',
		'BlStatuses' => 'app.bl_statuses',
		'PortAgentContacts' => 'app.port_agent_contacts',
		'VesselOwners' => 'app.vessel_owners',
		'VesselOwnerCategories' => 'app.vessel_owner_categories',
		'VesselOwnerContacts' => 'app.vessel_owner_contacts',
		'Vessels' => 'app.vessels',
		'CustomerCategories' => 'app.customer_categories',
		'CustomerContacts' => 'app.customer_contacts',
		'Statuses' => 'app.statuses'
	];

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('Invoices') ? [] : ['className' => 'App\Model\Table\InvoicesTable'];
		$this->Invoices = TableRegistry::get('Invoices', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Invoices);

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
