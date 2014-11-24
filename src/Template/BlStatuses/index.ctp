<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('New Bl Status'), ['action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('List Creators'), ['controller' => 'Creators', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Creator'), ['controller' => 'Creators', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Modifiers'), ['controller' => 'Modifiers', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Modifier'), ['controller' => 'Modifiers', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Loadings'), ['controller' => 'Loadings', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Loading'), ['controller' => 'Loadings', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="blStatuses index large-10 medium-9 columns">
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
	<?php foreach ($blStatuses as $blStatus): ?>
		<tr>
			<td><?= $this->Number->format($blStatus->id) ?></td>
			<td><?= h($blStatus->recstatus) ?></td>
			<td>
				<?= $blStatus->has('creator') ? $this->Html->link($blStatus->creator->id, ['controller' => 'Creators', 'action' => 'view', $blStatus->creator->id]) : '' ?>
			</td>
			<td><?= h($blStatus->created) ?></td>
			<td>
				<?= $blStatus->has('modifier') ? $this->Html->link($blStatus->modifier->id, ['controller' => 'Modifiers', 'action' => 'view', $blStatus->modifier->id]) : '' ?>
			</td>
			<td><?= h($blStatus->modified) ?></td>
			<td><?= h($blStatus->name) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $blStatus->id]) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $blStatus->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $blStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $blStatus->id)]) ?>
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
