<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('New Port Agent'), ['action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('List Creators'), ['controller' => 'Creators', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Creator'), ['controller' => 'Creators', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Modifiers'), ['controller' => 'Modifiers', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Modifier'), ['controller' => 'Modifiers', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List PortAgentContacts'), ['controller' => 'PortAgentContacts', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Port Agent Contact'), ['controller' => 'PortAgentContacts', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="portAgents index large-10 medium-9 columns">
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
	<?php foreach ($portAgents as $portAgent): ?>
		<tr>
			<td><?= $this->Number->format($portAgent->id) ?></td>
			<td><?= $this->Number->format($portAgent->recstatus) ?></td>
			<td>
				<?= $portAgent->has('creator') ? $this->Html->link($portAgent->creator->id, ['controller' => 'Creators', 'action' => 'view', $portAgent->creator->id]) : '' ?>
			</td>
			<td><?= h($portAgent->created) ?></td>
			<td>
				<?= $portAgent->has('modifier') ? $this->Html->link($portAgent->modifier->id, ['controller' => 'Modifiers', 'action' => 'view', $portAgent->modifier->id]) : '' ?>
			</td>
			<td><?= h($portAgent->modified) ?></td>
			<td><?= h($portAgent->name) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $portAgent->id]) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $portAgent->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $portAgent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $portAgent->id)]) ?>
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
