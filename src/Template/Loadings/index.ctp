<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('New Loading'), ['action' => 'add']) ?></li>
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
<div class="loadings index large-10 medium-9 columns">
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th><?= $this->Paginator->sort('id') ?></th>
			<th><?= $this->Paginator->sort('recstatus') ?></th>
			<th><?= $this->Paginator->sort('creator_id') ?></th>
			<th><?= $this->Paginator->sort('created') ?></th>
			<th><?= $this->Paginator->sort('modifier_id') ?></th>
			<th><?= $this->Paginator->sort('modified') ?></th>
			<th><?= $this->Paginator->sort('port_id') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($loadings as $loading): ?>
		<tr>
			<td><?= $this->Number->format($loading->id) ?></td>
			<td><?= h($loading->recstatus) ?></td>
			<td>
				<?= $loading->has('creator') ? $this->Html->link($loading->creator->id, ['controller' => 'Users', 'action' => 'view', $loading->creator->id]) : '' ?>
			</td>
			<td><?= h($loading->created) ?></td>
			<td>
				<?= $loading->has('modifier') ? $this->Html->link($loading->modifier->id, ['controller' => 'Users', 'action' => 'view', $loading->modifier->id]) : '' ?>
			</td>
			<td><?= h($loading->modified) ?></td>
			<td>
				<?= $loading->has('port') ? $this->Html->link($loading->port->name, ['controller' => 'Ports', 'action' => 'view', $loading->port->id]) : '' ?>
			</td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $loading->order_id]) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $loading->order_id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $loading->order_id], ['confirm' => __('Are you sure you want to delete # {0}?', $loading->order_id)]) ?>
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
