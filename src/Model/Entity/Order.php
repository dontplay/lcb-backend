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
		'laycan_comment' => true,
		'general_notes' => true,
		'customer_id' => true,
		'vessel_owner_id' => true,
		'status_id' => true,
		'vessel_id' => true,
		'user_id' => true,
		'creator' => true,
		'modifier' => true,
		'customer' => true,
		'vessel_owner' => true,
		'status' => true,
		'vessel' => true,
		'dischargings' => true,
		'invoices' => true,
		'loadings' => true,
		'events' => true
	];

}
