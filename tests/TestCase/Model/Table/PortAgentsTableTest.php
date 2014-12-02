<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use App\Model\Table\PortAgentsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PortAgentsTable Test Case
 */
class PortAgentsTableTest extends TestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'app.port_agents',
		'app.creators',
		'app.modifiers',
		'app.port_agent_contacts'
	];

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('PortAgents') ? [] : ['className' => 'App\Model\Table\PortAgentsTable'];
		$this->PortAgents = TableRegistry::get('PortAgents', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PortAgents);

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
