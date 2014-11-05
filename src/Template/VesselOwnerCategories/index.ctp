<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('New Vessel Owner Category'), ['action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('List Creators'), ['controller' => 'Creators', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Creator'), ['controller' => 'Creators', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Modifiers'), ['controller' => 'Modifiers', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Modifier'), ['controller' => 'Modifiers', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List VesselOwners'), ['controller' => 'VesselOwners', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Vessel Owner'), ['controller' => 'VesselOwners', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="vesselOwnerCategories index large-10 medium-9 columns">
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
	<?php foreach ($vesselOwnerCategories as $vesselOwnerCategory): ?>
		<tr>
			<td><?= $this->Number->format($vesselOwnerCategory->id) ?></td>
			<td><?= h($vesselOwnerCategory->recstatus) ?></td>
			<td>
				<?= $vesselOwnerCategory->has('creator') ? $this->Html->link($vesselOwnerCategory->creator->id, ['controller' => 'Creators', 'action' => 'view', $vesselOwnerCategory->creator->id]) : '' ?>
			</td>
			<td><?= h($vesselOwnerCategory->created) ?></td>
			<td>
				<?= $vesselOwnerCategory->has('modifier') ? $this->Html->link($vesselOwnerCategory->modifier->id, ['controller' => 'Modifiers', 'action' => 'view', $vesselOwnerCategory->modifier->id]) : '' ?>
			</td>
			<td><?= h($vesselOwnerCategory->modified) ?></td>
			<td><?= h($vesselOwnerCategory->name) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $vesselOwnerCategory->id]) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $vesselOwnerCategory->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vesselOwnerCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vesselOwnerCategory->id)]) ?>
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
