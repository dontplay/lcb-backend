<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('New Event'), ['action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('List Creators'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Creator'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="events index large-10 medium-9 columns">
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th><?= $this->Paginator->sort('id') ?></th>
			<th><?= $this->Paginator->sort('recstatus') ?></th>
			<th><?= $this->Paginator->sort('creator_id') ?></th>
			<th><?= $this->Paginator->sort('created') ?></th>
			<th><?= $this->Paginator->sort('modifier_id') ?></th>
			<th><?= $this->Paginator->sort('modified') ?></th>
			<th><?= $this->Paginator->sort('start') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($events as $event): ?>
		<tr>
			<td><?= $this->Number->format($event->id) ?></td>
			<td><?= h($event->recstatus) ?></td>
			<td>
				<?= $event->has('creator') ? $this->Html->link($event->creator->username, ['controller' => 'Users', 'action' => 'view', $event->creator->id]) : '' ?>
			</td>
			<td><?= h($event->created) ?></td>
			<td>
				<?= $event->has('modifier') ? $this->Html->link($event->modifier->username, ['controller' => 'Users', 'action' => 'view', $event->modifier->id]) : '' ?>
			</td>
			<td><?= h($event->modified) ?></td>
			<td><?= h($event->start) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $event->id]) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $event->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $event->id], ['confirm' => __('Are you sure you want to delete # {0}?', $event->id)]) ?>
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
