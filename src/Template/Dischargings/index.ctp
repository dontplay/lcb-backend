<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('New Discharging'), ['action' => 'add']) ?></li>
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
<div class="dischargings index large-10 medium-9 columns">
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
	<?php foreach ($dischargings as $discharging): ?>
		<tr>
			<td><?= $this->Number->format($discharging->id) ?></td>
			<td><?= h($discharging->recstatus) ?></td>
			<td>
				<?= $discharging->has('creator') ? $this->Html->link($discharging->creator->id, ['controller' => 'Users', 'action' => 'view', $discharging->creator->id]) : '' ?>
			</td>
			<td><?= h($discharging->created) ?></td>
			<td>
				<?= $discharging->has('modifier') ? $this->Html->link($discharging->modifier->id, ['controller' => 'Users', 'action' => 'view', $discharging->modifier->id]) : '' ?>
			</td>
			<td><?= h($discharging->modified) ?></td>
			<td>
				<?= $discharging->has('port') ? $this->Html->link($discharging->port->name, ['controller' => 'Ports', 'action' => 'view', $discharging->port->id]) : '' ?>
			</td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $discharging->id]) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $discharging->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $discharging->id], ['confirm' => __('Are you sure you want to delete # {0}?', $discharging->id)]) ?>
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
