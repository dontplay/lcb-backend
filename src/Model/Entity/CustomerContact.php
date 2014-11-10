<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CustomerContact Entity.
 */
class CustomerContact extends Entity {

/**
 * Fields that can be mass assigned using newEntity() or patchEntity().
 *
 * @var array
 */
	protected $_accessible = [
		'recstatus' => true,
		'creator_id' => true,
		'modifier_id' => true,
		'customer_id' => true,
		'name' => true,
		'number' => true,
		'creator' => true,
		'modifier' => true,
		'customer' => true,
	];

}
