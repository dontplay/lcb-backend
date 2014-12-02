<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Form->postLink(
				__('Delete'),
				['action' => 'delete', $portAgent->id],
				['confirm' => __('Are you sure you want to delete # {0}?', $portAgent->id)]
			)
		?></li>
		<li><?= $this->Html->link(__('List Port Agents'), ['action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Creators'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Creator'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Dischargings'), ['controller' => 'Dischargings', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Discharging'), ['controller' => 'Dischargings', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Loadings'), ['controller' => 'Loadings', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Loading'), ['controller' => 'Loadings', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Port Agent Contacts'), ['controller' => 'PortAgentContacts', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Port Agent Contact'), ['controller' => 'PortAgentContacts', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="portAgents form large-10 medium-9 columns">
	<?= $this->Form->create($portAgent); ?>
	<fieldset>
		<legend><?= __('Edit Port Agent') ?></legend>
		<?php
			echo $this->Form->input('recstatus');
			echo $this->Form->input('creator_id', ['options' => $creators]);
			echo $this->Form->input('modifier_id', ['options' => $modifiers]);
			echo $this->Form->input('name');
		?>
	</fieldset>
	<?= $this->Form->button(__('Submit')) ?>
	<?= $this->Form->end() ?>
</div>
