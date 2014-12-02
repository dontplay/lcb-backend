<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Form->postLink(
				__('Delete'),
				['action' => 'delete', $order->id],
				['confirm' => __('Are you sure you want to delete # {0}?', $order->id)]
			)
		?></li>
		<li><?= $this->Html->link(__('List Orders'), ['action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Creators'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Creator'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Vessel Owners'), ['controller' => 'VesselOwners', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Vessel Owner'), ['controller' => 'VesselOwners', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Statuses'), ['controller' => 'Statuses', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Status'), ['controller' => 'Statuses', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Vessels'), ['controller' => 'Vessels', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Vessel'), ['controller' => 'Vessels', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Dischargings'), ['controller' => 'Dischargings', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Discharging'), ['controller' => 'Dischargings', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Invoices'), ['controller' => 'Invoices', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Invoice'), ['controller' => 'Invoices', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Loadings'), ['controller' => 'Loadings', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Loading'), ['controller' => 'Loadings', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="orders form large-10 medium-9 columns">
	<?= $this->Form->create($order); ?>
	<fieldset>
		<legend><?= __('Edit Order') ?></legend>
		<?php
			echo $this->Form->input('recstatus');
			echo $this->Form->input('creator_id', ['options' => $creators]);
			echo $this->Form->input('modifier_id', ['options' => $modifiers]);
			echo $this->Form->input('fixtureDate');
			echo $this->Form->input('laycanStartDate');
			echo $this->Form->input('laycanEndDate');
			echo $this->Form->input('customer_id', ['options' => $customers]);
			echo $this->Form->input('vessel_owner_id', ['options' => $vesselOwners]);
			echo $this->Form->input('status_id', ['options' => $statuses]);
			echo $this->Form->input('vessel_id', ['options' => $vessels]);
		?>
	</fieldset>
	<?= $this->Form->button(__('Submit')) ?>
	<?= $this->Form->end() ?>
</div>
