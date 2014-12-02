<?php
namespace App\Test\TestCase\Controller;

use App\Controller\InvoicesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\InvoicesController Test Case
 */
class InvoicesControllerTest extends IntegrationTestCase {

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
 * Test index method
 *
 * @return void
 */
	public function testIndex() {
		$this->markTestIncomplete('Not implemented yet.');
	}

/**
 * Test view method
 *
 * @return void
 */
	public function testView() {
		$this->markTestIncomplete('Not implemented yet.');
	}

/**
 * Test add method
 *
 * @return void
 */
	public function testAdd() {
		$this->markTestIncomplete('Not implemented yet.');
	}

/**
 * Test edit method
 *
 * @return void
 */
	public function testEdit() {
		$this->markTestIncomplete('Not implemented yet.');
	}

/**
 * Test delete method
 *
 * @return void
 */
	public function testDelete() {
		$this->markTestIncomplete('Not implemented yet.');
	}

}
