<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $shipmentType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shipmentType->id)]) ?></li>
		<li><?= $this->Html->link(__('List Shipment Types'), ['action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Creators'), ['controller' => 'Creators', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Creator'), ['controller' => 'Creators', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Modifiers'), ['controller' => 'Modifiers', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Modifier'), ['controller' => 'Modifiers', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="shipmentTypes form large-10 medium-9 columns">
<?= $this->Form->create($shipmentType) ?>
	<fieldset>
		<legend><?= __('Edit Shipment Type') ?></legend>
	<?php
		echo $this->Form->input('recstatus');
		echo $this->Form->input('created_id');
		echo $this->Form->input('modified_id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
