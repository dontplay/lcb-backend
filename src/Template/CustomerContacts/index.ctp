<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('New Customer Contact'), ['action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('List Creators'), ['controller' => 'Creators', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Creator'), ['controller' => 'Creators', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Modifiers'), ['controller' => 'Modifiers', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Modifier'), ['controller' => 'Modifiers', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="customerContacts index large-10 medium-9 columns">
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th><?= $this->Paginator->sort('id') ?></th>
			<th><?= $this->Paginator->sort('recstatus') ?></th>
			<th><?= $this->Paginator->sort('creator_id') ?></th>
			<th><?= $this->Paginator->sort('created') ?></th>
			<th><?= $this->Paginator->sort('modifier_id') ?></th>
			<th><?= $this->Paginator->sort('modified') ?></th>
			<th><?= $this->Paginator->sort('customer_id') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($customerContacts as $customerContact): ?>
		<tr>
			<td><?= $this->Number->format($customerContact->id) ?></td>
			<td><?= h($customerContact->recstatus) ?></td>
			<td>
				<?= $customerContact->has('creator') ? $this->Html->link($customerContact->creator->id, ['controller' => 'Creators', 'action' => 'view', $customerContact->creator->id]) : '' ?>
			</td>
			<td><?= h($customerContact->created) ?></td>
			<td>
				<?= $customerContact->has('modifier') ? $this->Html->link($customerContact->modifier->id, ['controller' => 'Modifiers', 'action' => 'view', $customerContact->modifier->id]) : '' ?>
			</td>
			<td><?= h($customerContact->modified) ?></td>
			<td>
				<?= $customerContact->has('customer') ? $this->Html->link($customerContact->customer->name, ['controller' => 'Customers', 'action' => 'view', $customerContact->customer->id]) : '' ?>
			</td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $customerContact->id]) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $customerContact->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $customerContact->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customerContact->id)]) ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
	<div class="paginator">
		<ul class="pagination">
		<?php
			echo $this->Paginator->prev('< ' . __('previous'));
			echo $this->Paginator->numbers();
			echo $this->Paginator->next(__('next') . ' >');
		?>
		</ul>
		<p><?= $this->Paginator->counter() ?></p>
	</div>
</div>
