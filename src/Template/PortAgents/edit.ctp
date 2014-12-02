<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $portAgent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $portAgent->id)]) ?></li>
		<li><?= $this->Html->link(__('List Port Agents'), ['action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Creators'), ['controller' => 'Creators', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Creator'), ['controller' => 'Creators', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Modifiers'), ['controller' => 'Modifiers', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Modifier'), ['controller' => 'Modifiers', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List PortAgentContacts'), ['controller' => 'PortAgentContacts', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Port Agent Contact'), ['controller' => 'PortAgentContacts', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="portAgents form large-10 medium-9 columns">
<?= $this->Form->create($portAgent) ?>
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
