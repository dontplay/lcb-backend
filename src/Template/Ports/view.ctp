<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Port'), ['action' => 'edit', $port->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Port'), ['action' => 'delete', $port->id], ['confirm' => __('Are you sure you want to delete # {0}?', $port->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Ports'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Port'), ['action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Creators'), ['controller' => 'Creators', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Creator'), ['controller' => 'Creators', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Modifiers'), ['controller' => 'Modifiers', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Modifier'), ['controller' => 'Modifiers', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Countries'), ['controller' => 'Countries', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Country'), ['controller' => 'Countries', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Dischargings'), ['controller' => 'Dischargings', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Discharging'), ['controller' => 'Dischargings', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Loadings'), ['controller' => 'Loadings', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Loading'), ['controller' => 'Loadings', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="ports view large-10 medium-9 columns">
	<h2><?= h($port->name) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Creator') ?></h6>
			<p><?= $port->has('creator') ? $this->Html->link($port->creator->id, ['controller' => 'Creators', 'action' => 'view', $port->creator->id]) : '' ?></p>
			<h6 class="subheader"><?= __('Modifier') ?></h6>
			<p><?= $port->has('modifier') ? $this->Html->link($port->modifier->id, ['controller' => 'Modifiers', 'action' => 'view', $port->modifier->id]) : '' ?></p>
			<h6 class="subheader"><?= __('Category') ?></h6>
			<p><?= h($port->category) ?></p>
			<h6 class="subheader"><?= __('Country') ?></h6>
			<p><?= $port->has('country') ? $this->Html->link($port->country->name, ['controller' => 'Countries', 'action' => 'view', $port->country->id]) : '' ?></p>
			<h6 class="subheader"><?= __('Name') ?></h6>
			<p><?= h($port->name) ?></p>
		</div>
		<div class="large-2 large-offset-1 columns numbers end">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= $this->Number->format($port->id) ?></p>
		</div>
		<div class="large-2 columns dates end">
			<h6 class="subheader"><?= __('Created') ?></h6>
			<p><?= h($port->created) ?></p>
			<h6 class="subheader"><?= __('Modified') ?></h6>
			<p><?= h($port->modified) ?></p>
		</div>
		<div class="large-2 columns booleans end">
			<h6 class="subheader"><?= __('Recstatus') ?></h6>
			<p><?= $port->recstatus ? __('Yes') : __('No'); ?></p>
		</div>
	</div>
</div>
<div class="related row">
	<div class="column large-12">
	<h4 class="subheader"><?= __('Related Dischargings') ?></h4>
	<?php if (!empty($port->dischargings)): ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?= __('Id') ?></th>
			<th><?= __('Recstatus') ?></th>
			<th><?= __('Creator Id') ?></th>
			<th><?= __('Created') ?></th>
			<th><?= __('Modifier Id') ?></th>
			<th><?= __('Modified') ?></th>
			<th><?= __('Rate') ?></th>
			<th><?= __('Add Com') ?></th>
			<th><?= __('Payment Tnc') ?></th>
			<th><?= __('Demurrage Rate') ?></th>
			<th><?= __('Due Date') ?></th>
			<th><?= __('Eta') ?></th>
			<th><?= __('Comments') ?></th>
			<th><?= __('Port Agent') ?></th>
			<th><?= __('Comm Loading') ?></th>
			<th><?= __('Status') ?></th>
			<th><?= __('Completion Date') ?></th>
			<th><?= __('Order Id') ?></th>
			<th><?= __('Port Id') ?></th>
			<th><?= __('Bill Status Id') ?></th>
			<th><?= __('Loi Status Id') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
		<?php foreach ($port->dischargings as $dischargings): ?>
		<tr>
			<td><?= h($dischargings->id) ?></td>
			<td><?= h($dischargings->recstatus) ?></td>
			<td><?= h($dischargings->creator_id) ?></td>
			<td><?= h($dischargings->created) ?></td>
			<td><?= h($dischargings->modifier_id) ?></td>
			<td><?= h($dischargings->modified) ?></td>
			<td><?= h($dischargings->rate) ?></td>
			<td><?= h($dischargings->add_com) ?></td>
			<td><?= h($dischargings->payment_tnc) ?></td>
			<td><?= h($dischargings->demurrage_rate) ?></td>
			<td><?= h($dischargings->due_date) ?></td>
			<td><?= h($dischargings->eta) ?></td>
			<td><?= h($dischargings->comments) ?></td>
			<td><?= h($dischargings->port_agent) ?></td>
			<td><?= h($dischargings->comm_loading) ?></td>
			<td><?= h($dischargings->status) ?></td>
			<td><?= h($dischargings->completion_date) ?></td>
			<td><?= h($dischargings->order_id) ?></td>
			<td><?= h($dischargings->port_id) ?></td>
			<td><?= h($dischargings->bill_status_id) ?></td>
			<td><?= h($dischargings->loi_status_id) ?></td>
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
	<?php if (!empty($port->loadings)): ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?= __('Id') ?></th>
			<th><?= __('Recstatus') ?></th>
			<th><?= __('Creator Id') ?></th>
			<th><?= __('Created') ?></th>
			<th><?= __('Modifier Id') ?></th>
			<th><?= __('Modified') ?></th>
			<th><?= __('Rate') ?></th>
			<th><?= __('Fright') ?></th>
			<th><?= __('Add Comm') ?></th>
			<th><?= __('Broking') ?></th>
			<th><?= __('Payment Tnc') ?></th>
			<th><?= __('Demurrage Rate') ?></th>
			<th><?= __('Due Date') ?></th>
			<th><?= __('Eta') ?></th>
			<th><?= __('Comments') ?></th>
			<th><?= __('Load Portagent') ?></th>
			<th><?= __('Qty Loaded') ?></th>
			<th><?= __('Comm Loading') ?></th>
			<th><?= __('Status') ?></th>
			<th><?= __('Completiondate') ?></th>
			<th><?= __('Billdate') ?></th>
			<th><?= __('Loi Status Id') ?></th>
			<th><?= __('Bill Status Id') ?></th>
			<th><?= __('Order Id') ?></th>
			<th><?= __('Port Id') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
		<?php foreach ($port->loadings as $loadings): ?>
		<tr>
			<td><?= h($loadings->id) ?></td>
			<td><?= h($loadings->recstatus) ?></td>
			<td><?= h($loadings->creator_id) ?></td>
			<td><?= h($loadings->created) ?></td>
			<td><?= h($loadings->modifier_id) ?></td>
			<td><?= h($loadings->modified) ?></td>
			<td><?= h($loadings->rate) ?></td>
			<td><?= h($loadings->fright) ?></td>
			<td><?= h($loadings->add_comm) ?></td>
			<td><?= h($loadings->broking) ?></td>
			<td><?= h($loadings->payment_tnc) ?></td>
			<td><?= h($loadings->demurrage_rate) ?></td>
			<td><?= h($loadings->due_date) ?></td>
			<td><?= h($loadings->eta) ?></td>
			<td><?= h($loadings->comments) ?></td>
			<td><?= h($loadings->load_portagent) ?></td>
			<td><?= h($loadings->qty_loaded) ?></td>
			<td><?= h($loadings->comm_loading) ?></td>
			<td><?= h($loadings->status) ?></td>
			<td><?= h($loadings->completiondate) ?></td>
			<td><?= h($loadings->billdate) ?></td>
			<td><?= h($loadings->loi_status_id) ?></td>
			<td><?= h($loadings->bill_status_id) ?></td>
			<td><?= h($loadings->order_id) ?></td>
			<td><?= h($loadings->port_id) ?></td>
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
