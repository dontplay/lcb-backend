<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Port Agent'), ['action' => 'edit', $portAgent->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Port Agent'), ['action' => 'delete', $portAgent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $portAgent->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Port Agents'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Port Agent'), ['action' => 'add']) ?> </li>
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
<div class="portAgents view large-10 medium-9 columns">
	<h2><?= h($portAgent->name) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Creator') ?></h6>
			<p><?= $portAgent->has('creator') ? $this->Html->link($portAgent->creator->id, ['controller' => 'Users', 'action' => 'view', $portAgent->creator->id]) : '' ?>" ?></p>
			<h6 class="subheader"><?= __('Modifier') ?></h6>
			<p><?= $portAgent->has('modifier') ? $this->Html->link($portAgent->modifier->id, ['controller' => 'Users', 'action' => 'view', $portAgent->modifier->id]) : '' ?>" ?></p>
			<h6 class="subheader"><?= __('Name') ?></h6>
			<p><?= h($portAgent->name) ?></p>
		</div>
		<div class="large-2 columns numbers end">
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
	<h4 class="subheader"><?= __('Related Dischargings') ?></h4>
	<?php if (!empty($portAgent->dischargings)): ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?= __('Id') ?></th>
			<th><?= __('Recstatus') ?></th>
			<th><?= __('Creator Id') ?></th>
			<th><?= __('Created') ?></th>
			<th><?= __('Modifier Id') ?></th>
			<th><?= __('Modified') ?></th>
			<th><?= __('Port Id') ?></th>
			<th><?= __('Rate') ?></th>
			<th><?= __('Eta') ?></th>
			<th><?= __('Comment') ?></th>
			<th><?= __('Port Agent Id') ?></th>
			<th><?= __('CommDischarging') ?></th>
			<th><?= __('Status') ?></th>
			<th><?= __('CompletionDate') ?></th>
			<th><?= __('Order Id') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
		<?php foreach ($portAgent->dischargings as $dischargings): ?>
		<tr>
			<td><?= h($dischargings->id) ?></td>
			<td><?= h($dischargings->recstatus) ?></td>
			<td><?= h($dischargings->creator_id) ?></td>
			<td><?= h($dischargings->created) ?></td>
			<td><?= h($dischargings->modifier_id) ?></td>
			<td><?= h($dischargings->modified) ?></td>
			<td><?= h($dischargings->port_id) ?></td>
			<td><?= h($dischargings->rate) ?></td>
			<td><?= h($dischargings->eta) ?></td>
			<td><?= h($dischargings->comment) ?></td>
			<td><?= h($dischargings->port_agent_id) ?></td>
			<td><?= h($dischargings->commDischarging) ?></td>
			<td><?= h($dischargings->status) ?></td>
			<td><?= h($dischargings->completionDate) ?></td>
			<td><?= h($dischargings->order_id) ?></td>

			<td class="actions">
				<?= $this->Html->link(__('View'), ['controller' => 'Dischargings', 'action' => 'view', $dischargings->id]) ?>

				<?= $this->Html->link(__('Edit'), ['controller' => 'Dischargings', 'action' => 'edit', $dischargings->id]) ?>

				<?= $this->Form->postLink(__('Delete'), ['controller' => 'Dischargings', 'action' => 'delete', $dischargings->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dischargings->id)]) ?>

			</td>
		</tr>

		<?php endforeach; ?>
	</table>
	<?php endif; ?>
	</div>
</div>
<div class="related row">
	<div class="column large-12">
	<h4 class="subheader"><?= __('Related Loadings') ?></h4>
	<?php if (!empty($portAgent->loadings)): ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?= __('Id') ?></th>
			<th><?= __('Recstatus') ?></th>
			<th><?= __('Creator Id') ?></th>
			<th><?= __('Created') ?></th>
			<th><?= __('Modifier Id') ?></th>
			<th><?= __('Modified') ?></th>
			<th><?= __('Port Id') ?></th>
			<th><?= __('Rate') ?></th>
			<th><?= __('Freight') ?></th>
			<th><?= __('Shipment Size') ?></th>
			<th><?= __('Shipment Type Id') ?></th>
			<th><?= __('Add Comm') ?></th>
			<th><?= __('Broking Dollar') ?></th>
			<th><?= __('Broking Percentage') ?></th>
			<th><?= __('Payment Terms') ?></th>
			<th><?= __('Demurrage Rate') ?></th>
			<th><?= __('Nomination Clause') ?></th>
			<th><?= __('DueDate') ?></th>
			<th><?= __('Eta') ?></th>
			<th><?= __('Comment') ?></th>
			<th><?= __('Port Agent Id') ?></th>
			<th><?= __('Stow Plan') ?></th>
			<th><?= __('Dead Freight') ?></th>
			<th><?= __('Discount Freight') ?></th>
			<th><?= __('Qty Loaded') ?></th>
			<th><?= __('CommLoading') ?></th>
			<th><?= __('Status') ?></th>
			<th><?= __('CompletionDate') ?></th>
			<th><?= __('BlDate') ?></th>
			<th><?= __('Loi Status Id') ?></th>
			<th><?= __('Bl Status Id') ?></th>
			<th><?= __('Order Id') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
		<?php foreach ($portAgent->loadings as $loadings): ?>
		<tr>
			<td><?= h($loadings->id) ?></td>
			<td><?= h($loadings->recstatus) ?></td>
			<td><?= h($loadings->creator_id) ?></td>
			<td><?= h($loadings->created) ?></td>
			<td><?= h($loadings->modifier_id) ?></td>
			<td><?= h($loadings->modified) ?></td>
			<td><?= h($loadings->port_id) ?></td>
			<td><?= h($loadings->rate) ?></td>
			<td><?= h($loadings->freight) ?></td>
			<td><?= h($loadings->shipment_size) ?></td>
			<td><?= h($loadings->shipment_type_id) ?></td>
			<td><?= h($loadings->add_comm) ?></td>
			<td><?= h($loadings->broking_dollar) ?></td>
			<td><?= h($loadings->broking_percentage) ?></td>
			<td><?= h($loadings->payment_terms) ?></td>
			<td><?= h($loadings->demurrage_rate) ?></td>
			<td><?= h($loadings->nomination_clause) ?></td>
			<td><?= h($loadings->dueDate) ?></td>
			<td><?= h($loadings->eta) ?></td>
			<td><?= h($loadings->comment) ?></td>
			<td><?= h($loadings->port_agent_id) ?></td>
			<td><?= h($loadings->stow_plan) ?></td>
			<td><?= h($loadings->dead_freight) ?></td>
			<td><?= h($loadings->discount_freight) ?></td>
			<td><?= h($loadings->qty_loaded) ?></td>
			<td><?= h($loadings->commLoading) ?></td>
			<td><?= h($loadings->status) ?></td>
			<td><?= h($loadings->completionDate) ?></td>
			<td><?= h($loadings->blDate) ?></td>
			<td><?= h($loadings->loi_status_id) ?></td>
			<td><?= h($loadings->bl_status_id) ?></td>
			<td><?= h($loadings->order_id) ?></td>

			<td class="actions">
				<?= $this->Html->link(__('View'), ['controller' => 'Loadings', 'action' => 'view', $loadings->order_id]) ?>

				<?= $this->Html->link(__('Edit'), ['controller' => 'Loadings', 'action' => 'edit', $loadings->order_id]) ?>

				<?= $this->Form->postLink(__('Delete'), ['controller' => 'Loadings', 'action' => 'delete', $loadings->order_id], ['confirm' => __('Are you sure you want to delete # {0}?', $loadings->order_id)]) ?>

			</td>
		</tr>

		<?php endforeach; ?>
	</table>
	<?php endif; ?>
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
