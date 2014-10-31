<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Vessel'), ['action' => 'edit', $vessel->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Vessel'), ['action' => 'delete', $vessel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vessel->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Vessels'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Vessel'), ['action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Creators'), ['controller' => 'Creators', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Creator'), ['controller' => 'Creators', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Modifiers'), ['controller' => 'Modifiers', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Modifier'), ['controller' => 'Modifiers', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List VesselOwners'), ['controller' => 'VesselOwners', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Vessel Owner'), ['controller' => 'VesselOwners', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="vessels view large-10 medium-9 columns">
	<h2><?= h($vessel->name) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Creator') ?></h6>
			<p><?= $vessel->has('creator') ? $this->Html->link($vessel->creator->id, ['controller' => 'Creators', 'action' => 'view', $vessel->creator->id]) : '' ?></p>
			<h6 class="subheader"><?= __('Modifier') ?></h6>
			<p><?= $vessel->has('modifier') ? $this->Html->link($vessel->modifier->id, ['controller' => 'Modifiers', 'action' => 'view', $vessel->modifier->id]) : '' ?></p>
			<h6 class="subheader"><?= __('Name') ?></h6>
			<p><?= h($vessel->name) ?></p>
			<h6 class="subheader"><?= __('Catagory') ?></h6>
			<p><?= h($vessel->catagory) ?></p>
			<h6 class="subheader"><?= __('Vessel Owner') ?></h6>
			<p><?= $vessel->has('vessel_owner') ? $this->Html->link($vessel->vessel_owner->name, ['controller' => 'VesselOwners', 'action' => 'view', $vessel->vessel_owner->id]) : '' ?></p>
		</div>
		<div class="large-2 large-offset-1 columns numbers end">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= $this->Number->format($vessel->id) ?></p>
		</div>
		<div class="large-2 columns dates end">
			<h6 class="subheader"><?= __('Created') ?></h6>
			<p><?= h($vessel->created) ?></p>
			<h6 class="subheader"><?= __('Modified') ?></h6>
			<p><?= h($vessel->modified) ?></p>
		</div>
		<div class="large-2 columns booleans end">
			<h6 class="subheader"><?= __('Recstatus') ?></h6>
			<p><?= $vessel->recstatus ? __('Yes') : __('No'); ?></p>
		</div>
	</div>
</div>
