<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Shipment Type'), ['action' => 'edit', $shipmentType->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Shipment Type'), ['action' => 'delete', $shipmentType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shipmentType->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Shipment Types'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Shipment Type'), ['action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Creators'), ['controller' => 'Creators', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Creator'), ['controller' => 'Creators', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Modifiers'), ['controller' => 'Modifiers', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Modifier'), ['controller' => 'Modifiers', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="shipmentTypes view large-10 medium-9 columns">
	<h2><?= h($shipmentType->name) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Creator') ?></h6>
			<p><?= $shipmentType->has('creator') ? $this->Html->link($shipmentType->creator->id, ['controller' => 'Creators', 'action' => 'view', $shipmentType->creator->id]) : '' ?></p>
			<h6 class="subheader"><?= __('Modifier') ?></h6>
			<p><?= $shipmentType->has('modifier') ? $this->Html->link($shipmentType->modifier->id, ['controller' => 'Modifiers', 'action' => 'view', $shipmentType->modifier->id]) : '' ?></p>
			<h6 class="subheader"><?= __('Name') ?></h6>
			<p><?= h($shipmentType->name) ?></p>
		</div>
		<div class="large-2 large-offset-1 columns numbers end">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= $this->Number->format($shipmentType->id) ?></p>
		</div>
		<div class="large-2 columns dates end">
			<h6 class="subheader"><?= __('Created') ?></h6>
			<p><?= h($shipmentType->created) ?></p>
			<h6 class="subheader"><?= __('Modified') ?></h6>
			<p><?= h($shipmentType->modified) ?></p>
		</div>
		<div class="large-2 columns booleans end">
			<h6 class="subheader"><?= __('Recstatus') ?></h6>
			<p><?= $shipmentType->recstatus ? __('Yes') : __('No'); ?></p>
		</div>
	</div>
</div>
