<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Port Entity.
 */
class Port extends Entity {

/**
 * Fields that can be mass assigned using newEntity() or patchEntity().
 *
 * @var array
 */
	protected $_accessible = [
		'recstatus' => true,
		'creator_id' => true,
		'modifier_id' => true,
		'category' => true,
		'country_id' => true,
		'name' => true,
		'creator' => true,
		'modifier' => true,
		'country' => true,
		'dischargings' => true,
		'loadings' => true,
	];

}
