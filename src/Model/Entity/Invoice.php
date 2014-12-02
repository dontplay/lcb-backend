<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Invoice Entity.
 */
class Invoice extends Entity {

/**
 * Fields that can be mass assigned using newEntity() or patchEntity().
 *
 * @var array
 */
	protected $_accessible = [
		'recstatus' => true,
		'created_id' => true,
		'modified_id' => true,
		'freight_due' => true,
		'freightInvoicedDate' => true,
		'freight_invoiced' => true,
		'freightPaidDate' => true,
		'freight_paid' => true,
		'lpo' => true,
		'lpc' => true,
		'dpc' => true,
		'dpo' => true,
		'final_freight' => true,
		'brokerageLfb' => true,
		'lfbBrokerageReceived' => true,
		'lfbBrokerageRaised' => true,
		'order_id' => true,
		'order' => true,
	];

}
