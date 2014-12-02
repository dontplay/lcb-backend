<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Form->postLink(
				__('Delete'),
				['action' => 'delete', $portAgentContact->id],
				['confirm' => __('Are you sure you want to delete # {0}?', $portAgentContact->id)]
			)
		?></li>
		<li><?= $this->Html->link(__('List Port Agent Contacts'), ['action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Creators'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Creator'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Port Agents'), ['controller' => 'PortAgents', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Port Agent'), ['controller' => 'PortAgents', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="portAgentContacts form large-10 medium-9 columns">
	<?= $this->Form->create($portAgentContact); ?>
	<fieldset>
		<legend><?= __('Edit Port Agent Contact') ?></legend>
		<?php
			echo $this->Form->input('recstatus');
			echo $this->Form->input('creator_id', ['options' => $creators]);
			echo $this->Form->input('modifier_id', ['options' => $modifiers]);
			echo $this->Form->input('port_agent_id', ['options' => $portAgents]);
			echo $this->Form->input('name');
			echo $this->Form->input('number');
			echo $this->Form->input('email');
		?>
	</fieldset>
	<?= $this->Form->button(__('Submit')) ?>
	<?= $this->Form->end() ?>
</div>
