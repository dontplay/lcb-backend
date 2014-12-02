<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use App\Model\Table\PortAgentContactsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PortAgentContactsTable Test Case
 */
class PortAgentContactsTableTest extends TestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'app.port_agent_contacts',
		'app.creators',
		'app.modifiers',
		'app.port_agents'
	];

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('PortAgentContacts') ? [] : ['className' => 'App\Model\Table\PortAgentContactsTable'];
		$this->PortAgentContacts = TableRegistry::get('PortAgentContacts', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PortAgentContacts);

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
