<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Vessel Entity.
 */
class Vessel extends Entity {

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
		'catagory' => true,
		'vessel_owner_id' => true,
		'creator' => true,
		'modifier' => true,
		'vessel_owner' => true,
	];

}
