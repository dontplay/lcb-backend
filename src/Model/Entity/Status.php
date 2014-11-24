<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Status Entity.
 */
class Status extends Entity {

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
		'orders' => true,
	];

}
