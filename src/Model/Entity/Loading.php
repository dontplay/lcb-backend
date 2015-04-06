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
		'two_port_id' => true,
		'rate' => true,
		'freight' => true,
		'shipment_size' => true,
		'shipment_type_id' => true,
		'add_comm' => true,
		'broking_dollar' => true,
		'broking_percentage' => true,
		'payment_terms' => true,
		'broking' => true,
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
		'radio_eta' => true,
		'commLoading' => true,
		'status' => true,
		'completionDate' => true,
		'blDate' => true,
		'loi_status_id' => true,
		'bl_status_id' => true,
		'creator' => true,
		'modifier' => true,
		'loi_status' => true,
		'bl_status' => true,
		'order' => true,
		'port' => true,
		'port_agent' => true,
		'eta_1' => true,
		'comment_1' => true,
		'port_agent_id_1' => true,
		'stow_plan_1' => true,
		'dead_freight_1' => true,
		'discount_freight_1' => true,
		'qty_loaded_1' => true,
		'radio_eta_1' => true,
		'commLoading_1' => true,
		'status_1' => true,
		'completionDate_1' => true,
		'blDate_1' => true,
		'loi_status_id_1' => true,
		'bl_status_id_1' => true,
	];

}
