<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Form->postLink(
				__('Delete'),
				['action' => 'delete', $discharging->id],
				['confirm' => __('Are you sure you want to delete # {0}?', $discharging->id)]
			)
		?></li>
		<li><?= $this->Html->link(__('List Dischargings'), ['action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Creators'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Creator'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Ports'), ['controller' => 'Ports', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Port'), ['controller' => 'Ports', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Port Agents'), ['controller' => 'PortAgents', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Port Agent'), ['controller' => 'PortAgents', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="dischargings form large-10 medium-9 columns">
	<?= $this->Form->create($discharging); ?>
	<fieldset>
		<legend><?= __('Edit Discharging') ?></legend>
		<?php
			echo $this->Form->input('recstatus');
			echo $this->Form->input('creator_id', ['options' => $creators]);
			echo $this->Form->input('modifier_id', ['options' => $modifiers]);
			echo $this->Form->input('port_id', ['options' => $ports]);
			echo $this->Form->input('rate');
			echo $this->Form->input('eta');
			echo $this->Form->input('comment');
			echo $this->Form->input('port_agent_id', ['options' => $portAgents]);
			echo $this->Form->input('commDischarging');
			echo $this->Form->input('status');
			echo $this->Form->input('completionDate');
			echo $this->Form->input('order_id', ['options' => $orders]);
		?>
	</fieldset>
	<?= $this->Form->button(__('Submit')) ?>
	<?= $this->Form->end() ?>
</div>
