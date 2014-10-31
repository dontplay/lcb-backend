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
		'rate' => true,
		'fright' => true,
		'add_comm' => true,
		'broking' => true,
		'payment_tnc' => true,
		'demurrage_rate' => true,
		'due_date' => true,
		'eta' => true,
		'comments' => true,
		'load_portagent' => true,
		'qty_loaded' => true,
		'comm_loading' => true,
		'status' => true,
		'completiondate' => true,
		'billdate' => true,
		'loi_status_id' => true,
		'bill_status_id' => true,
		'port_id' => true,
		'creator' => true,
		'modifier' => true,
		'loi_status' => true,
		'bill_status' => true,
		'order' => true,
		'port' => true,
	];

}
