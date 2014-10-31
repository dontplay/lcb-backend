<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use App\Model\Table\LoiStatusesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LoiStatusesTable Test Case
 */
class LoiStatusesTableTest extends TestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'app.loi_statuses',
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
		$config = TableRegistry::exists('LoiStatuses') ? [] : ['className' => 'App\Model\Table\LoiStatusesTable'];
		$this->LoiStatuses = TableRegistry::get('LoiStatuses', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->LoiStatuses);

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
