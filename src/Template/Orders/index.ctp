<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('New Order'), ['action' => 'add']) ?></li>
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
<div class="orders index large-10 medium-9 columns">
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th><?= $this->Paginator->sort('id') ?></th>
			<th><?= $this->Paginator->sort('recstatus') ?></th>
			<th><?= $this->Paginator->sort('creator_id') ?></th>
			<th><?= $this->Paginator->sort('created') ?></th>
			<th><?= $this->Paginator->sort('modifier_id') ?></th>
			<th><?= $this->Paginator->sort('modified') ?></th>
			<th><?= $this->Paginator->sort('fixtureDate') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($orders as $order): ?>
		<tr>
			<td><?= $this->Number->format($order->id) ?></td>
			<td><?= $this->Number->format($order->recstatus) ?></td>
			<td>
				<?= $order->has('creator') ? $this->Html->link($order->creator->id, ['controller' => 'Users', 'action' => 'view', $order->creator->id]) : '' ?>
			</td>
			<td><?= h($order->created) ?></td>
			<td>
				<?= $order->has('modifier') ? $this->Html->link($order->modifier->id, ['controller' => 'Users', 'action' => 'view', $order->modifier->id]) : '' ?>
			</td>
			<td><?= h($order->modified) ?></td>
			<td><?= h($order->fixtureDate) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $order->id]) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $order->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id)]) ?>
			</td>
		</tr>

	<?php endforeach; ?>
	</tbody>
	</table>
	<div class="paginator">
		<ul class="pagination">
			<?= $this->Paginator->prev('< ' . __('previous')); ?>
			<?= $this->Paginator->numbers(); ?>
			<?=	$this->Paginator->next(__('next') . ' >'); ?>
		</ul>
		<p><?= $this->Paginator->counter(); ?></p>
	</div>
</div>
