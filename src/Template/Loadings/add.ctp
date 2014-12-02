<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('List Loadings'), ['action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Creators'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Creator'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Ports'), ['controller' => 'Ports', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Port'), ['controller' => 'Ports', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Shipment Types'), ['controller' => 'ShipmentTypes', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Shipment Type'), ['controller' => 'ShipmentTypes', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Port Agents'), ['controller' => 'PortAgents', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Port Agent'), ['controller' => 'PortAgents', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Loi Statuses'), ['controller' => 'LoiStatuses', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Loi Status'), ['controller' => 'LoiStatuses', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Bl Statuses'), ['controller' => 'BlStatuses', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Bl Status'), ['controller' => 'BlStatuses', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="loadings form large-10 medium-9 columns">
	<?= $this->Form->create($loading); ?>
	<fieldset>
		<legend><?= __('Add Loading') ?></legend>
		<?php
			echo $this->Form->input('id');
			echo $this->Form->input('recstatus');
			echo $this->Form->input('creator_id', ['options' => $creators]);
			echo $this->Form->input('modifier_id', ['options' => $modifiers]);
			echo $this->Form->input('port_id', ['options' => $ports]);
			echo $this->Form->input('rate');
			echo $this->Form->input('freight');
			echo $this->Form->input('shipment_size');
			echo $this->Form->input('shipment_type_id', ['options' => $shipmentTypes]);
			echo $this->Form->input('add_comm');
			echo $this->Form->input('broking_dollar');
			echo $this->Form->input('broking_percentage');
			echo $this->Form->input('payment_terms');
			echo $this->Form->input('demurrage_rate');
			echo $this->Form->input('nomination_clause');
			echo $this->Form->input('dueDate');
			echo $this->Form->input('eta');
			echo $this->Form->input('comment');
			echo $this->Form->input('port_agent_id', ['options' => $portAgents]);
			echo $this->Form->input('stow_plan');
			echo $this->Form->input('dead_freight');
			echo $this->Form->input('discount_freight');
			echo $this->Form->input('qty_loaded');
			echo $this->Form->input('commLoading');
			echo $this->Form->input('status');
			echo $this->Form->input('completionDate');
			echo $this->Form->input('blDate');
			echo $this->Form->input('loi_status_id', ['options' => $loiStatuses]);
			echo $this->Form->input('bl_status_id', ['options' => $blStatuses]);
		?>
	</fieldset>
	<?= $this->Form->button(__('Submit')) ?>
	<?= $this->Form->end() ?>
</div>
