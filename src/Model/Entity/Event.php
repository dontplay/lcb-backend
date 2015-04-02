<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Event Entity.
 */
class Event extends Entity {

/**
 * Fields that can be mass assigned using newEntity() or patchEntity().
 *
 * @var array
 */
	protected $_accessible = [
		'recstatus' => true,
		'creator_id' => true,
		'modifier_id' => true,
		'title' => true,
		'start' => true,
		'vessel_id' => true,
		'order_id' => true,
		'creator' => true,
		'modifier' => true,
	];

}
