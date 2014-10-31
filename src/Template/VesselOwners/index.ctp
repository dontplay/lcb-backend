<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('New Vessel Owner'), ['action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('List Creators'), ['controller' => 'Creators', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Creator'), ['controller' => 'Creators', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Modifiers'), ['controller' => 'Modifiers', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Modifier'), ['controller' => 'Modifiers', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Vessels'), ['controller' => 'Vessels', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Vessel'), ['controller' => 'Vessels', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="vesselOwners index large-10 medium-9 columns">
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
	<?php foreach ($vesselOwners as $vesselOwner): ?>
		<tr>
			<td><?= $this->Number->format($vesselOwner->id) ?></td>
			<td><?= h($vesselOwner->recstatus) ?></td>
			<td>
				<?= $vesselOwner->has('creator') ? $this->Html->link($vesselOwner->creator->id, ['controller' => 'Creators', 'action' => 'view', $vesselOwner->creator->id]) : '' ?>
			</td>
			<td><?= h($vesselOwner->created) ?></td>
			<td>
				<?= $vesselOwner->has('modifier') ? $this->Html->link($vesselOwner->modifier->id, ['controller' => 'Modifiers', 'action' => 'view', $vesselOwner->modifier->id]) : '' ?>
			</td>
			<td><?= h($vesselOwner->modified) ?></td>
			<td><?= h($vesselOwner->name) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $vesselOwner->id]) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $vesselOwner->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vesselOwner->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vesselOwner->id)]) ?>
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
