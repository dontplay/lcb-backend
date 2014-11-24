<?php
namespace App\Test\TestCase\Controller;

use App\Controller\BlStatusesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\BlStatusesController Test Case
 */
class BlStatusesControllerTest extends IntegrationTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'app.bl_statuses',
		'app.creators',
		'app.modifiers',
		'app.loadings',
		'app.loi_statuses',
		'app.bill_statuses',
		'app.dischargings',
		'app.orders',
		'app.customers',
		'app.cities',
		'app.countries',
		'app.ports',
		'app.vessel_owners',
		'app.vessel_owner_categories',
		'app.vessel_owner_contacts',
		'app.vessels',
		'app.customer_categories',
		'app.customer_contacts',
		'app.statuses',
		'app.invoices'
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
