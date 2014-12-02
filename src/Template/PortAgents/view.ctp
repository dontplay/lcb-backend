<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Port Agent'), ['action' => 'edit', $portAgent->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Port Agent'), ['action' => 'delete', $portAgent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $portAgent->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Port Agents'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Port Agent'), ['action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Creators'), ['controller' => 'Creators', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Creator'), ['controller' => 'Creators', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Modifiers'), ['controller' => 'Modifiers', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Modifier'), ['controller' => 'Modifiers', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List PortAgentContacts'), ['controller' => 'PortAgentContacts', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Port Agent Contact'), ['controller' => 'PortAgentContacts', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="portAgents view large-10 medium-9 columns">
	<h2><?= h($portAgent->name) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Creator') ?></h6>
			<p><?= $portAgent->has('creator') ? $this->Html->link($portAgent->creator->id, ['controller' => 'Creators', 'action' => 'view', $portAgent->creator->id]) : '' ?></p>
			<h6 class="subheader"><?= __('Modifier') ?></h6>
			<p><?= $portAgent->has('modifier') ? $this->Html->link($portAgent->modifier->id, ['controller' => 'Modifiers', 'action' => 'view', $portAgent->modifier->id]) : '' ?></p>
			<h6 class="subheader"><?= __('Name') ?></h6>
			<p><?= h($portAgent->name) ?></p>
		</div>
		<div class="large-2 large-offset-1 columns numbers end">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= $this->Number->format($portAgent->id) ?></p>
			<h6 class="subheader"><?= __('Recstatus') ?></h6>
			<p><?= $this->Number->format($portAgent->recstatus) ?></p>
		</div>
		<div class="large-2 columns dates end">
			<h6 class="subheader"><?= __('Created') ?></h6>
			<p><?= h($portAgent->created) ?></p>
			<h6 class="subheader"><?= __('Modified') ?></h6>
			<p><?= h($portAgent->modified) ?></p>
		</div>
	</div>
</div>
<div class="related row">
	<div class="column large-12">
	<h4 class="subheader"><?= __('Related PortAgentContacts') ?></h4>
	<?php if (!empty($portAgent->port_agent_contacts)): ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?= __('Id') ?></th>
			<th><?= __('Recstatus') ?></th>
			<th><?= __('Creator Id') ?></th>
			<th><?= __('Created') ?></th>
			<th><?= __('Modifier Id') ?></th>
			<th><?= __('Modified') ?></th>
			<th><?= __('Port Agent Id') ?></th>
			<th><?= __('Name') ?></th>
			<th><?= __('Number') ?></th>
			<th><?= __('Email') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
		<?php foreach ($portAgent->port_agent_contacts as $portAgentContacts): ?>
		<tr>
			<td><?= h($portAgentContacts->id) ?></td>
			<td><?= h($portAgentContacts->recstatus) ?></td>
			<td><?= h($portAgentContacts->creator_id) ?></td>
			<td><?= h($portAgentContacts->created) ?></td>
			<td><?= h($portAgentContacts->modifier_id) ?></td>
			<td><?= h($portAgentContacts->modified) ?></td>
			<td><?= h($portAgentContacts->port_agent_id) ?></td>
			<td><?= h($portAgentContacts->name) ?></td>
			<td><?= h($portAgentContacts->number) ?></td>
			<td><?= h($portAgentContacts->email) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['controller' => 'PortAgentContacts', 'action' => 'view', $portAgentContacts->id]) ?>
				<?= $this->Html->link(__('Edit'), ['controller' => 'PortAgentContacts', 'action' => 'edit', $portAgentContacts->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['controller' => 'PortAgentContacts', 'action' => 'delete', $portAgentContacts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $portAgentContacts->id)]) ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php endif; ?>
	</div>
</div>
