<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use App\Model\Table\ShipmentTypesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ShipmentTypesTable Test Case
 */
class ShipmentTypesTableTest extends TestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'app.shipment_types',
		'app.creators',
		'app.modifiers'
	];

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('ShipmentTypes') ? [] : ['className' => 'App\Model\Table\ShipmentTypesTable'];
		$this->ShipmentTypes = TableRegistry::get('ShipmentTypes', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ShipmentTypes);

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
