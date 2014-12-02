<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Discharging Entity.
 */
class Discharging extends Entity {

/**
 * Fields that can be mass assigned using newEntity() or patchEntity().
 *
 * @var array
 */
	protected $_accessible = [
		'recstatus' => true,
		'creator_id' => true,
		'modifier_id' => true,
		'port_id' => true,
		'rate' => true,
		'eta' => true,
		'comment' => true,
		'port_agent_id' => true,
		'commDischarging' => true,
		'status' => true,
		'completionDate' => true,
		'order_id' => true,
		'creator' => true,
		'modifier' => true,
		'port' => true,
		'port_agent' => true,
		'order' => true,
	];

}
