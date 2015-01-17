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
		'loa' => true,
		'beam' => true,
		'flag' => true,
		'imo' => true,
		'grt' => true,
		'nrt' => true,
		'dwt' => true
	];

}
