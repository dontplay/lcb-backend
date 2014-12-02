<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('New Invoice'), ['action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('List Createds'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Created'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="invoices index large-10 medium-9 columns">
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th><?= $this->Paginator->sort('id') ?></th>
			<th><?= $this->Paginator->sort('recstatus') ?></th>
			<th><?= $this->Paginator->sort('created_id') ?></th>
			<th><?= $this->Paginator->sort('created') ?></th>
			<th><?= $this->Paginator->sort('modified_id') ?></th>
			<th><?= $this->Paginator->sort('modified') ?></th>
			<th><?= $this->Paginator->sort('freight_due') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($invoices as $invoice): ?>
		<tr>
			<td><?= $this->Number->format($invoice->id) ?></td>
			<td><?= h($invoice->recstatus) ?></td>
			<td>
				<?= $invoice->has('created') ? $this->Html->link($invoice->created->id, ['controller' => 'Users', 'action' => 'view', $invoice->created->id]) : '' ?>
			</td>
			<td><?= h($invoice->created) ?></td>
			<td>
				<?= $invoice->has('modified') ? $this->Html->link($invoice->modified->id, ['controller' => 'Users', 'action' => 'view', $invoice->modified->id]) : '' ?>
			</td>
			<td><?= h($invoice->modified) ?></td>
			<td><?= $this->Number->format($invoice->freight_due) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $invoice->id]) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $invoice->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $invoice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoice->id)]) ?>
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
