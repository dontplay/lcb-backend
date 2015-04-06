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
		'two_port_id' => true,
		'rate' => true,
		'eta' => true,
		'demurrage_rate' => true,
		'comment' => true,
		'port_agent_id' => true,
		'commDischarging' => true,
		'status' => true,
		'completionDate' => true,
		'eta_1' => true,
		'demurrage_rate_1' => true,
		'comment_1' => true,
		'port_agent_id_1' => true,
		'commDischarging_1' => true,
		'status_1' => true,
		'completionDate_1' => true,
		'order_id' => true,
		'creator' => true,
		'modifier' => true,
		'port' => true,
		'port_agent' => true,
		'order' => true,
	];

}
