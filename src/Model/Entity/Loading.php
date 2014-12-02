<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Loading Entity.
 */
class Loading extends Entity {

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
		'port_id' => true,
		'rate' => true,
		'freight' => true,
		'shipment_size' => true,
		'shipment_type_id' => true,
		'add_comm' => true,
		'broking_dollar' => true,
		'broking_percentage' => true,
		'payment_terms' => true,
		'demurrage_rate' => true,
		'nomination_clause' => true,
		'dueDate' => true,
		'eta' => true,
		'comment' => true,
		'port_agent_id' => true,
		'stow_plan' => true,
		'dead_freight' => true,
		'discount_freight' => true,
		'qty_loaded' => true,
		'commLoading' => true,
		'status' => true,
		'completionDate' => true,
		'blDate' => true,
		'loi_status_id' => true,
		'bl_status_id' => true,
		'creator' => true,
		'modifier' => true,
		'loi_status' => true,
		'bill_status' => true,
		'order' => true,
		'port' => true,
	];

}
