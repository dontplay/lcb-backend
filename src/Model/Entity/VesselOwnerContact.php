<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VesselOwnerContact Entity.
 */
class VesselOwnerContact extends Entity {

/**
 * Fields that can be mass assigned using newEntity() or patchEntity().
 *
 * @var array
 */
	protected $_accessible = [
		'id' => true,
		'recstatus' => true,
		'creator_id' => true,
		'modifier_id' => true,
		'vessel_owner_id' => true,
		'name' => true,
		'number' => true,
		'creator' => true,
		'modifier' => true,
		'vessel_owner' => true,
	];

}
