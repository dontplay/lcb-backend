<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('New Shipment Type'), ['action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('List Creators'), ['controller' => 'Creators', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Creator'), ['controller' => 'Creators', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Modifiers'), ['controller' => 'Modifiers', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Modifier'), ['controller' => 'Modifiers', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="shipmentTypes index large-10 medium-9 columns">
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th><?= $this->Paginator->sort('id') ?></th>
			<th><?= $this->Paginator->sort('recstatus') ?></th>
			<th><?= $this->Paginator->sort('created_id') ?></th>
			<th><?= $this->Paginator->sort('created') ?></th>
			<th><?= $this->Paginator->sort('modified_id') ?></th>
			<th><?= $this->Paginator->sort('modified') ?></th>
			<th><?= $this->Paginator->sort('name') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($shipmentTypes as $shipmentType): ?>
		<tr>
			<td><?= $this->Number->format($shipmentType->id) ?></td>
			<td><?= h($shipmentType->recstatus) ?></td>
			<td><?= $this->Number->format($shipmentType->created_id) ?></td>
			<td><?= h($shipmentType->created) ?></td>
			<td><?= $this->Number->format($shipmentType->modified_id) ?></td>
			<td><?= h($shipmentType->modified) ?></td>
			<td><?= h($shipmentType->name) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $shipmentType->id]) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $shipmentType->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $shipmentType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shipmentType->id)]) ?>
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
