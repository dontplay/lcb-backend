<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('New Vessel Owner Contact'), ['action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('List Creators'), ['controller' => 'Creators', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Creator'), ['controller' => 'Creators', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Modifiers'), ['controller' => 'Modifiers', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Modifier'), ['controller' => 'Modifiers', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List VesselOwners'), ['controller' => 'VesselOwners', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Vessel Owner'), ['controller' => 'VesselOwners', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="vesselOwnerContacts index large-10 medium-9 columns">
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th><?= $this->Paginator->sort('id') ?></th>
			<th><?= $this->Paginator->sort('recstatus') ?></th>
			<th><?= $this->Paginator->sort('creator_id') ?></th>
			<th><?= $this->Paginator->sort('created') ?></th>
			<th><?= $this->Paginator->sort('modifier_id') ?></th>
			<th><?= $this->Paginator->sort('modified') ?></th>
			<th><?= $this->Paginator->sort('vessel_owner_id') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($vesselOwnerContacts as $vesselOwnerContact): ?>
		<tr>
			<td><?= $this->Number->format($vesselOwnerContact->id) ?></td>
			<td><?= h($vesselOwnerContact->recstatus) ?></td>
			<td>
				<?= $vesselOwnerContact->has('creator') ? $this->Html->link($vesselOwnerContact->creator->id, ['controller' => 'Creators', 'action' => 'view', $vesselOwnerContact->creator->id]) : '' ?>
			</td>
			<td><?= h($vesselOwnerContact->created) ?></td>
			<td>
				<?= $vesselOwnerContact->has('modifier') ? $this->Html->link($vesselOwnerContact->modifier->id, ['controller' => 'Modifiers', 'action' => 'view', $vesselOwnerContact->modifier->id]) : '' ?>
			</td>
			<td><?= h($vesselOwnerContact->modified) ?></td>
			<td>
				<?= $vesselOwnerContact->has('vessel_owner') ? $this->Html->link($vesselOwnerContact->vessel_owner->name, ['controller' => 'VesselOwners', 'action' => 'view', $vesselOwnerContact->vessel_owner->id]) : '' ?>
			</td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $vesselOwnerContact->id]) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $vesselOwnerContact->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vesselOwnerContact->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vesselOwnerContact->id)]) ?>
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
