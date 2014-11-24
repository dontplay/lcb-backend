<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Loi Status'), ['action' => 'edit', $loiStatus->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Loi Status'), ['action' => 'delete', $loiStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $loiStatus->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Loi Statuses'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Loi Status'), ['action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Creators'), ['controller' => 'Creators', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Creator'), ['controller' => 'Creators', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Modifiers'), ['controller' => 'Modifiers', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Modifier'), ['controller' => 'Modifiers', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Loadings'), ['controller' => 'Loadings', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Loading'), ['controller' => 'Loadings', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="loiStatuses view large-10 medium-9 columns">
	<h2><?= h($loiStatus->name) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Creator') ?></h6>
			<p><?= $loiStatus->has('creator') ? $this->Html->link($loiStatus->creator->id, ['controller' => 'Creators', 'action' => 'view', $loiStatus->creator->id]) : '' ?></p>
			<h6 class="subheader"><?= __('Modifier') ?></h6>
			<p><?= $loiStatus->has('modifier') ? $this->Html->link($loiStatus->modifier->id, ['controller' => 'Modifiers', 'action' => 'view', $loiStatus->modifier->id]) : '' ?></p>
			<h6 class="subheader"><?= __('Name') ?></h6>
			<p><?= h($loiStatus->name) ?></p>
		</div>
		<div class="large-2 large-offset-1 columns numbers end">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= $this->Number->format($loiStatus->id) ?></p>
		</div>
		<div class="large-2 columns dates end">
			<h6 class="subheader"><?= __('Created') ?></h6>
			<p><?= h($loiStatus->created) ?></p>
			<h6 class="subheader"><?= __('Modified') ?></h6>
			<p><?= h($loiStatus->modified) ?></p>
		</div>
		<div class="large-2 columns booleans end">
			<h6 class="subheader"><?= __('Recstatus') ?></h6>
			<p><?= $loiStatus->recstatus ? __('Yes') : __('No'); ?></p>
		</div>
	</div>
</div>
<div class="related row">
	<div class="column large-12">
	<h4 class="subheader"><?= __('Related Loadings') ?></h4>
	<?php if (!empty($loiStatus->loadings)): ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?= __('Id') ?></th>
			<th><?= __('Recstatus') ?></th>
			<th><?= __('Creator Id') ?></th>
			<th><?= __('Created') ?></th>
			<th><?= __('Modifier Id') ?></th>
			<th><?= __('Modified') ?></th>
			<th><?= __('Port Id') ?></th>
			<th><?= __('Rate') ?></th>
			<th><?= __('Freight') ?></th>
			<th><?= __('Shipment Size') ?></th>
			<th><?= __('Type Of Shipment Id') ?></th>
			<th><?= __('Add Comm') ?></th>
			<th><?= __('Broking Dollar') ?></th>
			<th><?= __('Broking Percentage') ?></th>
			<th><?= __('Payment Terms') ?></th>
			<th><?= __('Demurrage Rate') ?></th>
			<th><?= __('Nomination Clause') ?></th>
			<th><?= __('DueDate') ?></th>
			<th><?= __('Eta') ?></th>
			<th><?= __('Comment') ?></th>
			<th><?= __('Port Agent') ?></th>
			<th><?= __('Stow Plan') ?></th>
			<th><?= __('Dead Freight') ?></th>
			<th><?= __('Discount Freight') ?></th>
			<th><?= __('Qty Loaded') ?></th>
			<th><?= __('CommLoading') ?></th>
			<th><?= __('Status') ?></th>
			<th><?= __('CompletionDate') ?></th>
			<th><?= __('BlDate') ?></th>
			<th><?= __('Loi Status Id') ?></th>
			<th><?= __('Bl Status Id') ?></th>
			<th><?= __('Order Id') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
		<?php foreach ($loiStatus->loadings as $loadings): ?>
		<tr>
			<td><?= h($loadings->id) ?></td>
			<td><?= h($loadings->recstatus) ?></td>
			<td><?= h($loadings->creator_id) ?></td>
			<td><?= h($loadings->created) ?></td>
			<td><?= h($loadings->modifier_id) ?></td>
			<td><?= h($loadings->modified) ?></td>
			<td><?= h($loadings->port_id) ?></td>
			<td><?= h($loadings->rate) ?></td>
			<td><?= h($loadings->freight) ?></td>
			<td><?= h($loadings->shipment_size) ?></td>
			<td><?= h($loadings->type_of_shipment_id) ?></td>
			<td><?= h($loadings->add_comm) ?></td>
			<td><?= h($loadings->broking_dollar) ?></td>
			<td><?= h($loadings->broking_percentage) ?></td>
			<td><?= h($loadings->payment_terms) ?></td>
			<td><?= h($loadings->demurrage_rate) ?></td>
			<td><?= h($loadings->nomination_clause) ?></td>
			<td><?= h($loadings->dueDate) ?></td>
			<td><?= h($loadings->eta) ?></td>
			<td><?= h($loadings->comment) ?></td>
			<td><?= h($loadings->port_agent) ?></td>
			<td><?= h($loadings->stow_plan) ?></td>
			<td><?= h($loadings->dead_freight) ?></td>
			<td><?= h($loadings->discount_freight) ?></td>
			<td><?= h($loadings->qty_loaded) ?></td>
			<td><?= h($loadings->commLoading) ?></td>
			<td><?= h($loadings->status) ?></td>
			<td><?= h($loadings->completionDate) ?></td>
			<td><?= h($loadings->blDate) ?></td>
			<td><?= h($loadings->loi_status_id) ?></td>
			<td><?= h($loadings->bl_status_id) ?></td>
			<td><?= h($loadings->order_id) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['controller' => 'Loadings', 'action' => 'view', $loadings->order_id]) ?>
				<?= $this->Html->link(__('Edit'), ['controller' => 'Loadings', 'action' => 'edit', $loadings->order_id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['controller' => 'Loadings', 'action' => 'delete', $loadings->order_id], ['confirm' => __('Are you sure you want to delete # {0}?', $loadings->order_id)]) ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php endif; ?>
	</div>
</div>
