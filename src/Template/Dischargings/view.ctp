<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Discharging'), ['action' => 'edit', $discharging->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Discharging'), ['action' => 'delete', $discharging->id], ['confirm' => __('Are you sure you want to delete # {0}?', $discharging->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Dischargings'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Discharging'), ['action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Creators'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Creator'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Ports'), ['controller' => 'Ports', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Port'), ['controller' => 'Ports', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Port Agents'), ['controller' => 'PortAgents', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Port Agent'), ['controller' => 'PortAgents', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="dischargings view large-10 medium-9 columns">
	<h2><?= h($discharging->id) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Creator') ?></h6>
			<p><?= $discharging->has('creator') ? $this->Html->link($discharging->creator->id, ['controller' => 'Users', 'action' => 'view', $discharging->creator->id]) : '' ?>" ?></p>
			<h6 class="subheader"><?= __('Modifier') ?></h6>
			<p><?= $discharging->has('modifier') ? $this->Html->link($discharging->modifier->id, ['controller' => 'Users', 'action' => 'view', $discharging->modifier->id]) : '' ?>" ?></p>
			<h6 class="subheader"><?= __('Port') ?></h6>
			<p><?= $discharging->has('port') ? $this->Html->link($discharging->port->name, ['controller' => 'Ports', 'action' => 'view', $discharging->port->id]) : '' ?>" ?></p>
			<h6 class="subheader"><?= __('Comment') ?></h6>
			<p><?= h($discharging->comment) ?></p>
			<h6 class="subheader"><?= __('Port Agent') ?></h6>
			<p><?= $discharging->has('port_agent') ? $this->Html->link($discharging->port_agent->name, ['controller' => 'PortAgents', 'action' => 'view', $discharging->port_agent->id]) : '' ?>" ?></p>
			<h6 class="subheader"><?= __('Status') ?></h6>
			<p><?= h($discharging->status) ?></p>
			<h6 class="subheader"><?= __('Order') ?></h6>
			<p><?= $discharging->has('order') ? $this->Html->link($discharging->order->id, ['controller' => 'Orders', 'action' => 'view', $discharging->order->id]) : '' ?>" ?></p>
		</div>
		<div class="large-2 columns numbers end">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= $this->Number->format($discharging->id) ?></p>
			<h6 class="subheader"><?= __('Rate') ?></h6>
			<p><?= $this->Number->format($discharging->rate) ?></p>
		</div>
		<div class="large-2 columns dates end">
			<h6 class="subheader"><?= __('Created') ?></h6>
			<p><?= h($discharging->created) ?></p>
			<h6 class="subheader"><?= __('Modified') ?></h6>
			<p><?= h($discharging->modified) ?></p>
			<h6 class="subheader"><?= __('Eta') ?></h6>
			<p><?= h($discharging->eta) ?></p>
			<h6 class="subheader"><?= __('CommDischarging') ?></h6>
			<p><?= h($discharging->commDischarging) ?></p>
			<h6 class="subheader"><?= __('CompletionDate') ?></h6>
			<p><?= h($discharging->completionDate) ?></p>
		</div>
		<div class="large-2 columns booleans end">
			<h6 class="subheader"><?= __('Recstatus') ?></h6>
			<p><?= $discharging->recstatus ? __('Yes') : __('No'); ?></p>
		</div>
	</div>
</div>
