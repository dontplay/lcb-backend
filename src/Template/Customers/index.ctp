<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('New Customer'), ['action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('List Creators'), ['controller' => 'Creators', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Creator'), ['controller' => 'Creators', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Modifiers'), ['controller' => 'Modifiers', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Modifier'), ['controller' => 'Modifiers', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List CustomerCategories'), ['controller' => 'CustomerCategories', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Customer Category'), ['controller' => 'CustomerCategories', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List CustomerContacts'), ['controller' => 'CustomerContacts', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Customer Contact'), ['controller' => 'CustomerContacts', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="customers index large-10 medium-9 columns">
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th><?= $this->Paginator->sort('id') ?></th>
			<th><?= $this->Paginator->sort('recstatus') ?></th>
			<th><?= $this->Paginator->sort('creator_id') ?></th>
			<th><?= $this->Paginator->sort('created') ?></th>
			<th><?= $this->Paginator->sort('modifier_id') ?></th>
			<th><?= $this->Paginator->sort('modified') ?></th>
			<th><?= $this->Paginator->sort('name') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($customers as $customer): ?>
		<tr>
			<td><?= $this->Number->format($customer->id) ?></td>
			<td><?= h($customer->recstatus) ?></td>
			<td>
				<?= $customer->has('creator') ? $this->Html->link($customer->creator->id, ['controller' => 'Creators', 'action' => 'view', $customer->creator->id]) : '' ?>
			</td>
			<td><?= h($customer->created) ?></td>
			<td>
				<?= $customer->has('modifier') ? $this->Html->link($customer->modifier->id, ['controller' => 'Modifiers', 'action' => 'view', $customer->modifier->id]) : '' ?>
			</td>
			<td><?= h($customer->modified) ?></td>
			<td><?= h($customer->name) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $customer->id]) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $customer->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id)]) ?>
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
