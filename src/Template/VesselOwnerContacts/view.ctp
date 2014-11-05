<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Vessel Owner Contact'), ['action' => 'edit', $vesselOwnerContact->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Vessel Owner Contact'), ['action' => 'delete', $vesselOwnerContact->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vesselOwnerContact->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Vessel Owner Contacts'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Vessel Owner Contact'), ['action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Creators'), ['controller' => 'Creators', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Creator'), ['controller' => 'Creators', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Modifiers'), ['controller' => 'Modifiers', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Modifier'), ['controller' => 'Modifiers', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List VesselOwners'), ['controller' => 'VesselOwners', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Vessel Owner'), ['controller' => 'VesselOwners', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="vesselOwnerContacts view large-10 medium-9 columns">
	<h2><?= h($vesselOwnerContact->name) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Creator') ?></h6>
			<p><?= $vesselOwnerContact->has('creator') ? $this->Html->link($vesselOwnerContact->creator->id, ['controller' => 'Creators', 'action' => 'view', $vesselOwnerContact->creator->id]) : '' ?></p>
			<h6 class="subheader"><?= __('Modifier') ?></h6>
			<p><?= $vesselOwnerContact->has('modifier') ? $this->Html->link($vesselOwnerContact->modifier->id, ['controller' => 'Modifiers', 'action' => 'view', $vesselOwnerContact->modifier->id]) : '' ?></p>
			<h6 class="subheader"><?= __('Vessel Owner') ?></h6>
			<p><?= $vesselOwnerContact->has('vessel_owner') ? $this->Html->link($vesselOwnerContact->vessel_owner->name, ['controller' => 'VesselOwners', 'action' => 'view', $vesselOwnerContact->vessel_owner->id]) : '' ?></p>
			<h6 class="subheader"><?= __('Name') ?></h6>
			<p><?= h($vesselOwnerContact->name) ?></p>
			<h6 class="subheader"><?= __('Number') ?></h6>
			<p><?= h($vesselOwnerContact->number) ?></p>
		</div>
		<div class="large-2 large-offset-1 columns numbers end">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= $this->Number->format($vesselOwnerContact->id) ?></p>
		</div>
		<div class="large-2 columns dates end">
			<h6 class="subheader"><?= __('Created') ?></h6>
			<p><?= h($vesselOwnerContact->created) ?></p>
			<h6 class="subheader"><?= __('Modified') ?></h6>
			<p><?= h($vesselOwnerContact->modified) ?></p>
		</div>
		<div class="large-2 columns booleans end">
			<h6 class="subheader"><?= __('Recstatus') ?></h6>
			<p><?= $vesselOwnerContact->recstatus ? __('Yes') : __('No'); ?></p>
		</div>
	</div>
</div>
