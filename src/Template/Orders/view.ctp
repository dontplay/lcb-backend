<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Order'), ['action' => 'edit', $order->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Order'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Orders'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Order'), ['action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Creators'), ['controller' => 'Creators', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Creator'), ['controller' => 'Creators', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Modifiers'), ['controller' => 'Modifiers', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Modifier'), ['controller' => 'Modifiers', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List VesselOwners'), ['controller' => 'VesselOwners', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Vessel Owner'), ['controller' => 'VesselOwners', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Statuses'), ['controller' => 'Statuses', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Status'), ['controller' => 'Statuses', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Vessels'), ['controller' => 'Vessels', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Vessel'), ['controller' => 'Vessels', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Dischargings'), ['controller' => 'Dischargings', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Discharging'), ['controller' => 'Dischargings', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Invoices'), ['controller' => 'Invoices', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Invoice'), ['controller' => 'Invoices', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Loadings'), ['controller' => 'Loadings', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Loading'), ['controller' => 'Loadings', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="orders view large-10 medium-9 columns">
	<h2><?= h($order->id) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Creator') ?></h6>
			<p><?= $order->has('creator') ? $this->Html->link($order->creator->id, ['controller' => 'Creators', 'action' => 'view', $order->creator->id]) : '' ?></p>
			<h6 class="subheader"><?= __('Modifier') ?></h6>
			<p><?= $order->has('modifier') ? $this->Html->link($order->modifier->id, ['controller' => 'Modifiers', 'action' => 'view', $order->modifier->id]) : '' ?></p>
			<h6 class="subheader"><?= __('Customer') ?></h6>
			<p><?= $order->has('customer') ? $this->Html->link($order->customer->name, ['controller' => 'Customers', 'action' => 'view', $order->customer->id]) : '' ?></p>
			<h6 class="subheader"><?= __('Vessel Owner') ?></h6>
			<p><?= $order->has('vessel_owner') ? $this->Html->link($order->vessel_owner->name, ['controller' => 'VesselOwners', 'action' => 'view', $order->vessel_owner->id]) : '' ?></p>
			<h6 class="subheader"><?= __('Status') ?></h6>
			<p><?= $order->has('status') ? $this->Html->link($order->status->name, ['controller' => 'Statuses', 'action' => 'view', $order->status->id]) : '' ?></p>
			<h6 class="subheader"><?= __('Vessel') ?></h6>
			<p><?= $order->has('vessel') ? $this->Html->link($order->vessel->name, ['controller' => 'Vessels', 'action' => 'view', $order->vessel->id]) : '' ?></p>
		</div>
		<div class="large-2 large-offset-1 columns numbers end">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= $this->Number->format($order->id) ?></p>
			<h6 class="subheader"><?= __('Recstatus') ?></h6>
			<p><?= $this->Number->format($order->recstatus) ?></p>
		</div>
		<div class="large-2 columns dates end">
			<h6 class="subheader"><?= __('Created') ?></h6>
			<p><?= h($order->created) ?></p>
			<h6 class="subheader"><?= __('Modified') ?></h6>
			<p><?= h($order->modified) ?></p>
			<h6 class="subheader"><?= __('FixtureDate') ?></h6>
			<p><?= h($order->fixtureDate) ?></p>
			<h6 class="subheader"><?= __('LaycanStartDate') ?></h6>
			<p><?= h($order->laycanStartDate) ?></p>
			<h6 class="subheader"><?= __('LaycanEndDate') ?></h6>
			<p><?= h($order->laycanEndDate) ?></p>
		</div>
	</div>
</div>
<div class="related row">
	<div class="column large-12">
	<h4 class="subheader"><?= __('Related Dischargings') ?></h4>
	<?php if (!empty($order->dischargings)): ?>
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
			<th><?= __('Eta') ?></th>
			<th><?= __('Comment') ?></th>
			<th><?= __('Port Agent') ?></th>
			<th><?= __('CommDischarging') ?></th>
			<th><?= __('Status') ?></th>
			<th><?= __('CompletionDate') ?></th>
			<th><?= __('Order Id') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
		<?php foreach ($order->dischargings as $dischargings): ?>
		<tr>
			<td><?= h($dischargings->id) ?></td>
			<td><?= h($dischargings->recstatus) ?></td>
			<td><?= h($dischargings->creator_id) ?></td>
			<td><?= h($dischargings->created) ?></td>
			<td><?= h($dischargings->modifier_id) ?></td>
			<td><?= h($dischargings->modified) ?></td>
			<td><?= h($dischargings->port_id) ?></td>
			<td><?= h($dischargings->rate) ?></td>
			<td><?= h($dischargings->eta) ?></td>
			<td><?= h($dischargings->comment) ?></td>
			<td><?= h($dischargings->port_agent) ?></td>
			<td><?= h($dischargings->commDischarging) ?></td>
			<td><?= h($dischargings->status) ?></td>
			<td><?= h($dischargings->completionDate) ?></td>
			<td><?= h($dischargings->order_id) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['controller' => 'Dischargings', 'action' => 'view', $dischargings->id]) ?>
				<?= $this->Html->link(__('Edit'), ['controller' => 'Dischargings', 'action' => 'edit', $dischargings->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['controller' => 'Dischargings', 'action' => 'delete', $dischargings->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dischargings->id)]) ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php endif; ?>
	</div>
</div>
<div class="related row">
	<div class="column large-12">
	<h4 class="subheader"><?= __('Related Invoices') ?></h4>
	<?php if (!empty($order->invoices)): ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?= __('Id') ?></th>
			<th><?= __('Recstatus') ?></th>
			<th><?= __('Created Id') ?></th>
			<th><?= __('Created') ?></th>
			<th><?= __('Modified Id') ?></th>
			<th><?= __('Modified') ?></th>
			<th><?= __('Freight Due') ?></th>
			<th><?= __('FreightInvoicedDate') ?></th>
			<th><?= __('Freight Invoiced') ?></th>
			<th><?= __('FreightPaidDate') ?></th>
			<th><?= __('Freight Paid') ?></th>
			<th><?= __('Lpo') ?></th>
			<th><?= __('Lpc') ?></th>
			<th><?= __('Dpc') ?></th>
			<th><?= __('Dpo') ?></th>
			<th><?= __('Final Freight') ?></th>
			<th><?= __('BrokerageLfb') ?></th>
			<th><?= __('LfbBrokerageReceived') ?></th>
			<th><?= __('LfbBrokerageRaised') ?></th>
			<th><?= __('Order Id') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
		<?php foreach ($order->invoices as $invoices): ?>
		<tr>
			<td><?= h($invoices->id) ?></td>
			<td><?= h($invoices->recstatus) ?></td>
			<td><?= h($invoices->created_id) ?></td>
			<td><?= h($invoices->created) ?></td>
			<td><?= h($invoices->modified_id) ?></td>
			<td><?= h($invoices->modified) ?></td>
			<td><?= h($invoices->freight_due) ?></td>
			<td><?= h($invoices->freightInvoicedDate) ?></td>
			<td><?= h($invoices->freight_invoiced) ?></td>
			<td><?= h($invoices->freightPaidDate) ?></td>
			<td><?= h($invoices->freight_paid) ?></td>
			<td><?= h($invoices->lpo) ?></td>
			<td><?= h($invoices->lpc) ?></td>
			<td><?= h($invoices->dpc) ?></td>
			<td><?= h($invoices->dpo) ?></td>
			<td><?= h($invoices->final_freight) ?></td>
			<td><?= h($invoices->brokerageLfb) ?></td>
			<td><?= h($invoices->lfbBrokerageReceived) ?></td>
			<td><?= h($invoices->lfbBrokerageRaised) ?></td>
			<td><?= h($invoices->order_id) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['controller' => 'Invoices', 'action' => 'view', $invoices->id]) ?>
				<?= $this->Html->link(__('Edit'), ['controller' => 'Invoices', 'action' => 'edit', $invoices->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['controller' => 'Invoices', 'action' => 'delete', $invoices->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoices->id)]) ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php endif; ?>
	</div>
</div>
<div class="related row">
	<div class="column large-12">
	<h4 class="subheader"><?= __('Related Loadings') ?></h4>
	<?php if (!empty($order->loadings)): ?>
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
		<?php foreach ($order->loadings as $loadings): ?>
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
