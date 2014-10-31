<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Vessel Owner'), ['action' => 'edit', $vesselOwner->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Vessel Owner'), ['action' => 'delete', $vesselOwner->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vesselOwner->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Vessel Owners'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Vessel Owner'), ['action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Creators'), ['controller' => 'Creators', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Creator'), ['controller' => 'Creators', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Modifiers'), ['controller' => 'Modifiers', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Modifier'), ['controller' => 'Modifiers', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Vessels'), ['controller' => 'Vessels', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Vessel'), ['controller' => 'Vessels', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="vesselOwners view large-10 medium-9 columns">
	<h2><?= h($vesselOwner->name) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Creator') ?></h6>
			<p><?= $vesselOwner->has('creator') ? $this->Html->link($vesselOwner->creator->id, ['controller' => 'Creators', 'action' => 'view', $vesselOwner->creator->id]) : '' ?></p>
			<h6 class="subheader"><?= __('Modifier') ?></h6>
			<p><?= $vesselOwner->has('modifier') ? $this->Html->link($vesselOwner->modifier->id, ['controller' => 'Modifiers', 'action' => 'view', $vesselOwner->modifier->id]) : '' ?></p>
			<h6 class="subheader"><?= __('Name') ?></h6>
			<p><?= h($vesselOwner->name) ?></p>
			<h6 class="subheader"><?= __('Email') ?></h6>
			<p><?= h($vesselOwner->email) ?></p>
			<h6 class="subheader"><?= __('Category') ?></h6>
			<p><?= $vesselOwner->has('category') ? $this->Html->link($vesselOwner->category->name, ['controller' => 'Categories', 'action' => 'view', $vesselOwner->category->id]) : '' ?></p>
			<h6 class="subheader"><?= __('City') ?></h6>
			<p><?= $vesselOwner->has('city') ? $this->Html->link($vesselOwner->city->name, ['controller' => 'Cities', 'action' => 'view', $vesselOwner->city->id]) : '' ?></p>
		</div>
		<div class="large-2 large-offset-1 columns numbers end">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= $this->Number->format($vesselOwner->id) ?></p>
			<h6 class="subheader"><?= __('Pincode') ?></h6>
			<p><?= $this->Number->format($vesselOwner->pincode) ?></p>
			<h6 class="subheader"><?= __('Contact') ?></h6>
			<p><?= $this->Number->format($vesselOwner->contact) ?></p>
			<h6 class="subheader"><?= __('Credit Period') ?></h6>
			<p><?= $this->Number->format($vesselOwner->credit_period) ?></p>
		</div>
		<div class="large-2 columns dates end">
			<h6 class="subheader"><?= __('Created') ?></h6>
			<p><?= h($vesselOwner->created) ?></p>
			<h6 class="subheader"><?= __('Modified') ?></h6>
			<p><?= h($vesselOwner->modified) ?></p>
		</div>
		<div class="large-2 columns booleans end">
			<h6 class="subheader"><?= __('Recstatus') ?></h6>
			<p><?= $vesselOwner->recstatus ? __('Yes') : __('No'); ?></p>
		</div>
	</div>
	<div class="row texts">
		<div class="columns large-9">
			<h6 class="subheader"><?= __('Address') ?></h6>
			<?= $this->Text->autoParagraph(h($vesselOwner->address)); ?>
		</div>
	</div>
	<div class="row texts">
		<div class="columns large-9">
			<h6 class="subheader"><?= __('Remarks') ?></h6>
			<?= $this->Text->autoParagraph(h($vesselOwner->remarks)); ?>
		</div>
	</div>
</div>
<div class="related row">
	<div class="column large-12">
	<h4 class="subheader"><?= __('Related Vessels') ?></h4>
	<?php if (!empty($vesselOwner->vessels)): ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?= __('Id') ?></th>
			<th><?= __('Recstatus') ?></th>
			<th><?= __('Creator Id') ?></th>
			<th><?= __('Created') ?></th>
			<th><?= __('Modifier Id') ?></th>
			<th><?= __('Modified') ?></th>
			<th><?= __('Name') ?></th>
			<th><?= __('Catagory') ?></th>
			<th><?= __('Vessel Owner Id') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
		<?php foreach ($vesselOwner->vessels as $vessels): ?>
		<tr>
			<td><?= h($vessels->id) ?></td>
			<td><?= h($vessels->recstatus) ?></td>
			<td><?= h($vessels->creator_id) ?></td>
			<td><?= h($vessels->created) ?></td>
			<td><?= h($vessels->modifier_id) ?></td>
			<td><?= h($vessels->modified) ?></td>
			<td><?= h($vessels->name) ?></td>
			<td><?= h($vessels->catagory) ?></td>
			<td><?= h($vessels->vessel_owner_id) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['controller' => 'Vessels', 'action' => 'view', $vessels->id]) ?>
				<?= $this->Html->link(__('Edit'), ['controller' => 'Vessels', 'action' => 'edit', $vessels->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['controller' => 'Vessels', 'action' => 'delete', $vessels->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vessels->id)]) ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php endif; ?>
	</div>
</div>
