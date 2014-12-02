<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('New Port Agent Contact'), ['action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('List Creators'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Creator'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Port Agents'), ['controller' => 'PortAgents', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Port Agent'), ['controller' => 'PortAgents', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="portAgentContacts index large-10 medium-9 columns">
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th><?= $this->Paginator->sort('id') ?></th>
			<th><?= $this->Paginator->sort('recstatus') ?></th>
			<th><?= $this->Paginator->sort('creator_id') ?></th>
			<th><?= $this->Paginator->sort('created') ?></th>
			<th><?= $this->Paginator->sort('modifier_id') ?></th>
			<th><?= $this->Paginator->sort('modified') ?></th>
			<th><?= $this->Paginator->sort('port_agent_id') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($portAgentContacts as $portAgentContact): ?>
		<tr>
			<td><?= $this->Number->format($portAgentContact->id) ?></td>
			<td><?= h($portAgentContact->recstatus) ?></td>
			<td>
				<?= $portAgentContact->has('creator') ? $this->Html->link($portAgentContact->creator->id, ['controller' => 'Users', 'action' => 'view', $portAgentContact->creator->id]) : '' ?>
			</td>
			<td><?= h($portAgentContact->created) ?></td>
			<td>
				<?= $portAgentContact->has('modifier') ? $this->Html->link($portAgentContact->modifier->id, ['controller' => 'Users', 'action' => 'view', $portAgentContact->modifier->id]) : '' ?>
			</td>
			<td><?= h($portAgentContact->modified) ?></td>
			<td>
				<?= $portAgentContact->has('port_agent') ? $this->Html->link($portAgentContact->port_agent->name, ['controller' => 'PortAgents', 'action' => 'view', $portAgentContact->port_agent->id]) : '' ?>
			</td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $portAgentContact->id]) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $portAgentContact->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $portAgentContact->id], ['confirm' => __('Are you sure you want to delete # {0}?', $portAgentContact->id)]) ?>
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
