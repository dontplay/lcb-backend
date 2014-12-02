<?php
namespace App\Test\TestCase\Controller;

use App\Controller\DischargingsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\DischargingsController Test Case
 */
class DischargingsControllerTest extends IntegrationTestCase {

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
		'Createds' => 'app.createds',
		'Modifieds' => 'app.modifieds',
		'Loadings' => 'app.loadings',
		'ShipmentTypes' => 'app.shipment_types',
		'PortAgents' => 'app.port_agents',
		'PortAgentContacts' => 'app.port_agent_contacts',
		'LoiStatuses' => 'app.loi_statuses',
		'BlStatuses' => 'app.bl_statuses'
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
