<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity.
 */
class Order extends Entity {

/**
 * Fields that can be mass assigned using newEntity() or patchEntity().
 *
 * @var array
 */
	protected $_accessible = [
		'recstatus' => true,
		'creator_id' => true,
		'modifier_id' => true,
		'fixtureDate' => true,
		'laycanStartDate' => true,
		'laycanEndDate' => true,
		'customer_id' => true,
		'vessel_owner_id' => true,
		'status_id' => true,
		'vessel_id' => true,
		'creator' => true,
		'modifier' => true,
		'customer_master' => true,
		'ship_owner' => true,
		'status_master' => true,
		'vessel_master' => true,
		'port_master' => true,
		'dischargings' => true,
		'loadings' => true,
	];

}
