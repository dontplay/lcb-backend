<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PortAgent Entity.
 */
class PortAgent extends Entity {

/**
 * Fields that can be mass assigned using newEntity() or patchEntity().
 *
 * @var array
 */
	protected $_accessible = [
		'recstatus' => true,
		'creator_id' => true,
		'modifier_id' => true,
		'name' => true,
		'creator' => true,
		'modifier' => true,
		'port_agent_contacts' => true,
	];

}
