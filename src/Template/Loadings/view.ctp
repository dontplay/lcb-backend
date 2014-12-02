<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Loading'), ['action' => 'edit', $loading->order_id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Loading'), ['action' => 'delete', $loading->order_id], ['confirm' => __('Are you sure you want to delete # {0}?', $loading->order_id)]) ?> </li>
		<li><?= $this->Html->link(__('List Loadings'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Loading'), ['action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Creators'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Creator'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Ports'), ['controller' => 'Ports', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Port'), ['controller' => 'Ports', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Shipment Types'), ['controller' => 'ShipmentTypes', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Shipment Type'), ['controller' => 'ShipmentTypes', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Port Agents'), ['controller' => 'PortAgents', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Port Agent'), ['controller' => 'PortAgents', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Loi Statuses'), ['controller' => 'LoiStatuses', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Loi Status'), ['controller' => 'LoiStatuses', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Bl Statuses'), ['controller' => 'BlStatuses', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Bl Status'), ['controller' => 'BlStatuses', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="loadings view large-10 medium-9 columns">
	<h2><?= h($loading->order_id) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Creator') ?></h6>
			<p><?= $loading->has('creator') ? $this->Html->link($loading->creator->id, ['controller' => 'Users', 'action' => 'view', $loading->creator->id]) : '' ?>" ?></p>
			<h6 class="subheader"><?= __('Modifier') ?></h6>
			<p><?= $loading->has('modifier') ? $this->Html->link($loading->modifier->id, ['controller' => 'Users', 'action' => 'view', $loading->modifier->id]) : '' ?>" ?></p>
			<h6 class="subheader"><?= __('Port') ?></h6>
			<p><?= $loading->has('port') ? $this->Html->link($loading->port->name, ['controller' => 'Ports', 'action' => 'view', $loading->port->id]) : '' ?>" ?></p>
			<h6 class="subheader"><?= __('Shipment Size') ?></h6>
			<p><?= h($loading->shipment_size) ?></p>
			<h6 class="subheader"><?= __('Shipment Type') ?></h6>
			<p><?= $loading->has('shipment_type') ? $this->Html->link($loading->shipment_type->name, ['controller' => 'ShipmentTypes', 'action' => 'view', $loading->shipment_type->id]) : '' ?>" ?></p>
			<h6 class="subheader"><?= __('Payment Terms') ?></h6>
			<p><?= h($loading->payment_terms) ?></p>
			<h6 class="subheader"><?= __('Nomination Clause') ?></h6>
			<p><?= h($loading->nomination_clause) ?></p>
			<h6 class="subheader"><?= __('Comment') ?></h6>
			<p><?= h($loading->comment) ?></p>
			<h6 class="subheader"><?= __('Port Agent') ?></h6>
			<p><?= $loading->has('port_agent') ? $this->Html->link($loading->port_agent->name, ['controller' => 'PortAgents', 'action' => 'view', $loading->port_agent->id]) : '' ?>" ?></p>
			<h6 class="subheader"><?= __('Status') ?></h6>
			<p><?= h($loading->status) ?></p>
			<h6 class="subheader"><?= __('Loi Status') ?></h6>
			<p><?= $loading->has('loi_status') ? $this->Html->link($loading->loi_status->name, ['controller' => 'LoiStatuses', 'action' => 'view', $loading->loi_status->id]) : '' ?>" ?></p>
			<h6 class="subheader"><?= __('Bl Status') ?></h6>
			<p><?= $loading->has('bl_status') ? $this->Html->link($loading->bl_status->name, ['controller' => 'BlStatuses', 'action' => 'view', $loading->bl_status->id]) : '' ?>" ?></p>
			<h6 class="subheader"><?= __('Order') ?></h6>
			<p><?= $loading->has('order') ? $this->Html->link($loading->order->id, ['controller' => 'Orders', 'action' => 'view', $loading->order->id]) : '' ?>" ?></p>
		</div>
		<div class="large-2 columns numbers end">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= $this->Number->format($loading->id) ?></p>
			<h6 class="subheader"><?= __('Rate') ?></h6>
			<p><?= $this->Number->format($loading->rate) ?></p>
			<h6 class="subheader"><?= __('Freight') ?></h6>
			<p><?= $this->Number->format($loading->freight) ?></p>
			<h6 class="subheader"><?= __('Add Comm') ?></h6>
			<p><?= $this->Number->format($loading->add_comm) ?></p>
			<h6 class="subheader"><?= __('Broking Dollar') ?></h6>
			<p><?= $this->Number->format($loading->broking_dollar) ?></p>
			<h6 class="subheader"><?= __('Broking Percentage') ?></h6>
			<p><?= $this->Number->format($loading->broking_percentage) ?></p>
			<h6 class="subheader"><?= __('Demurrage Rate') ?></h6>
			<p><?= $this->Number->format($loading->demurrage_rate) ?></p>
			<h6 class="subheader"><?= __('Stow Plan') ?></h6>
			<p><?= $this->Number->format($loading->stow_plan) ?></p>
			<h6 class="subheader"><?= __('Dead Freight') ?></h6>
			<p><?= $this->Number->format($loading->dead_freight) ?></p>
			<h6 class="subheader"><?= __('Discount Freight') ?></h6>
			<p><?= $this->Number->format($loading->discount_freight) ?></p>
			<h6 class="subheader"><?= __('Qty Loaded') ?></h6>
			<p><?= $this->Number->format($loading->qty_loaded) ?></p>
		</div>
		<div class="large-2 columns dates end">
			<h6 class="subheader"><?= __('Created') ?></h6>
			<p><?= h($loading->created) ?></p>
			<h6 class="subheader"><?= __('Modified') ?></h6>
			<p><?= h($loading->modified) ?></p>
			<h6 class="subheader"><?= __('DueDate') ?></h6>
			<p><?= h($loading->dueDate) ?></p>
			<h6 class="subheader"><?= __('Eta') ?></h6>
			<p><?= h($loading->eta) ?></p>
			<h6 class="subheader"><?= __('CommLoading') ?></h6>
			<p><?= h($loading->commLoading) ?></p>
			<h6 class="subheader"><?= __('CompletionDate') ?></h6>
			<p><?= h($loading->completionDate) ?></p>
			<h6 class="subheader"><?= __('BlDate') ?></h6>
			<p><?= h($loading->blDate) ?></p>
		</div>
		<div class="large-2 columns booleans end">
			<h6 class="subheader"><?= __('Recstatus') ?></h6>
			<p><?= $loading->recstatus ? __('Yes') : __('No'); ?></p>
		</div>
	</div>
</div>
