<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VesselOwner Entity.
 */
class VesselOwner extends Entity {

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
		'address' => true,
		'pincode' => true,
		'email' => true,
		'contact' => true,
		'credit_period' => true,
		'remarks' => true,
		'city_id' => true,
		'creator' => true,
		'modifier' => true,
		'city' => true,
		'orders' => true,
		'vessel_owner_contacts' => true
	];

}
