<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('New Loi Status'), ['action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('List Creators'), ['controller' => 'Creators', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Creator'), ['controller' => 'Creators', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Modifiers'), ['controller' => 'Modifiers', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Modifier'), ['controller' => 'Modifiers', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Loadings'), ['controller' => 'Loadings', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Loading'), ['controller' => 'Loadings', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="loiStatuses index large-10 medium-9 columns">
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
	<?php foreach ($loiStatuses as $loiStatus): ?>
		<tr>
			<td><?= $this->Number->format($loiStatus->id) ?></td>
			<td><?= h($loiStatus->recstatus) ?></td>
			<td>
				<?= $loiStatus->has('creator') ? $this->Html->link($loiStatus->creator->id, ['controller' => 'Creators', 'action' => 'view', $loiStatus->creator->id]) : '' ?>
			</td>
			<td><?= h($loiStatus->created) ?></td>
			<td>
				<?= $loiStatus->has('modifier') ? $this->Html->link($loiStatus->modifier->id, ['controller' => 'Modifiers', 'action' => 'view', $loiStatus->modifier->id]) : '' ?>
			</td>
			<td><?= h($loiStatus->modified) ?></td>
			<td><?= h($loiStatus->name) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $loiStatus->id]) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $loiStatus->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $loiStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $loiStatus->id)]) ?>
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
