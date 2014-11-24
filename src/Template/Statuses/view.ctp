<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Status'), ['action' => 'edit', $status->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Status'), ['action' => 'delete', $status->id], ['confirm' => __('Are you sure you want to delete # {0}?', $status->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Statuses'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Status'), ['action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Creators'), ['controller' => 'Creators', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Creator'), ['controller' => 'Creators', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Modifiers'), ['controller' => 'Modifiers', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Modifier'), ['controller' => 'Modifiers', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="statuses view large-10 medium-9 columns">
	<h2><?= h($status->name) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Creator') ?></h6>
			<p><?= $status->has('creator') ? $this->Html->link($status->creator->id, ['controller' => 'Creators', 'action' => 'view', $status->creator->id]) : '' ?></p>
			<h6 class="subheader"><?= __('Modifier') ?></h6>
			<p><?= $status->has('modifier') ? $this->Html->link($status->modifier->id, ['controller' => 'Modifiers', 'action' => 'view', $status->modifier->id]) : '' ?></p>
			<h6 class="subheader"><?= __('Name') ?></h6>
			<p><?= h($status->name) ?></p>
		</div>
		<div class="large-2 large-offset-1 columns numbers end">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= $this->Number->format($status->id) ?></p>
		</div>
		<div class="large-2 columns dates end">
			<h6 class="subheader"><?= __('Created') ?></h6>
			<p><?= h($status->created) ?></p>
			<h6 class="subheader"><?= __('Modified') ?></h6>
			<p><?= h($status->modified) ?></p>
		</div>
		<div class="large-2 columns booleans end">
			<h6 class="subheader"><?= __('Recstatus') ?></h6>
			<p><?= $status->recstatus ? __('Yes') : __('No'); ?></p>
		</div>
	</div>
</div>
<div class="related row">
	<div class="column large-12">
	<h4 class="subheader"><?= __('Related Orders') ?></h4>
	<?php if (!empty($status->orders)): ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?= __('Id') ?></th>
			<th><?= __('Recstatus') ?></th>
			<th><?= __('Creator Id') ?></th>
			<th><?= __('Created') ?></th>
			<th><?= __('Modifier Id') ?></th>
			<th><?= __('Modified') ?></th>
			<th><?= __('FixtureDate') ?></th>
			<th><?= __('LaycanStartDate') ?></th>
			<th><?= __('LaycanEndDate') ?></th>
			<th><?= __('Customer Id') ?></th>
			<th><?= __('Vessel Owner Id') ?></th>
			<th><?= __('Status Id') ?></th>
			<th><?= __('Vessel Id') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
		<?php foreach ($status->orders as $orders): ?>
		<tr>
			<td><?= h($orders->id) ?></td>
			<td><?= h($orders->recstatus) ?></td>
			<td><?= h($orders->creator_id) ?></td>
			<td><?= h($orders->created) ?></td>
			<td><?= h($orders->modifier_id) ?></td>
			<td><?= h($orders->modified) ?></td>
			<td><?= h($orders->fixtureDate) ?></td>
			<td><?= h($orders->laycanStartDate) ?></td>
			<td><?= h($orders->laycanEndDate) ?></td>
			<td><?= h($orders->customer_id) ?></td>
			<td><?= h($orders->vessel_owner_id) ?></td>
			<td><?= h($orders->status_id) ?></td>
			<td><?= h($orders->vessel_id) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['controller' => 'Orders', 'action' => 'view', $orders->id]) ?>
				<?= $this->Html->link(__('Edit'), ['controller' => 'Orders', 'action' => 'edit', $orders->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['controller' => 'Orders', 'action' => 'delete', $orders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orders->id)]) ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php endif; ?>
	</div>
</div>
