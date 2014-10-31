<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use App\Model\Table\BillStatusesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BillStatusesTable Test Case
 */
class BillStatusesTableTest extends TestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'app.bill_statuses',
		'app.creators',
		'app.modifiers',
		'app.dischargings',
		'app.loadings'
	];

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('BillStatuses') ? [] : ['className' => 'App\Model\Table\BillStatusesTable'];
		$this->BillStatuses = TableRegistry::get('BillStatuses', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BillStatuses);

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
