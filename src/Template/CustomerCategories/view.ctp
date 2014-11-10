<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Customer Category'), ['action' => 'edit', $customerCategory->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Customer Category'), ['action' => 'delete', $customerCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customerCategory->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Customer Categories'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Customer Category'), ['action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Creators'), ['controller' => 'Creators', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Creator'), ['controller' => 'Creators', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Modifiers'), ['controller' => 'Modifiers', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Modifier'), ['controller' => 'Modifiers', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="customerCategories view large-10 medium-9 columns">
	<h2><?= h($customerCategory->name) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Creator') ?></h6>
			<p><?= $customerCategory->has('creator') ? $this->Html->link($customerCategory->creator->id, ['controller' => 'Creators', 'action' => 'view', $customerCategory->creator->id]) : '' ?></p>
			<h6 class="subheader"><?= __('Modifier') ?></h6>
			<p><?= $customerCategory->has('modifier') ? $this->Html->link($customerCategory->modifier->id, ['controller' => 'Modifiers', 'action' => 'view', $customerCategory->modifier->id]) : '' ?></p>
			<h6 class="subheader"><?= __('Name') ?></h6>
			<p><?= h($customerCategory->name) ?></p>
		</div>
		<div class="large-2 large-offset-1 columns numbers end">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= $this->Number->format($customerCategory->id) ?></p>
		</div>
		<div class="large-2 columns dates end">
			<h6 class="subheader"><?= __('Created') ?></h6>
			<p><?= h($customerCategory->created) ?></p>
			<h6 class="subheader"><?= __('Modified') ?></h6>
			<p><?= h($customerCategory->modified) ?></p>
		</div>
		<div class="large-2 columns booleans end">
			<h6 class="subheader"><?= __('Recstatus') ?></h6>
			<p><?= $customerCategory->recstatus ? __('Yes') : __('No'); ?></p>
		</div>
	</div>
</div>
<div class="related row">
	<div class="column large-12">
	<h4 class="subheader"><?= __('Related Customers') ?></h4>
	<?php if (!empty($customerCategory->customers)): ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?= __('Id') ?></th>
			<th><?= __('Recstatus') ?></th>
			<th><?= __('Creator Id') ?></th>
			<th><?= __('Created') ?></th>
			<th><?= __('Modifier Id') ?></th>
			<th><?= __('Modified') ?></th>
			<th><?= __('Name') ?></th>
			<th><?= __('Address') ?></th>
			<th><?= __('Pincode') ?></th>
			<th><?= __('Email') ?></th>
			<th><?= __('Contact') ?></th>
			<th><?= __('Credit Period') ?></th>
			<th><?= __('Remarks') ?></th>
			<th><?= __('City Id') ?></th>
			<th><?= __('Customer Category Id') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
		<?php foreach ($customerCategory->customers as $customers): ?>
		<tr>
			<td><?= h($customers->id) ?></td>
			<td><?= h($customers->recstatus) ?></td>
			<td><?= h($customers->creator_id) ?></td>
			<td><?= h($customers->created) ?></td>
			<td><?= h($customers->modifier_id) ?></td>
			<td><?= h($customers->modified) ?></td>
			<td><?= h($customers->name) ?></td>
			<td><?= h($customers->address) ?></td>
			<td><?= h($customers->pincode) ?></td>
			<td><?= h($customers->email) ?></td>
			<td><?= h($customers->contact) ?></td>
			<td><?= h($customers->credit_period) ?></td>
			<td><?= h($customers->remarks) ?></td>
			<td><?= h($customers->city_id) ?></td>
			<td><?= h($customers->customer_category_id) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['controller' => 'Customers', 'action' => 'view', $customers->id]) ?>
				<?= $this->Html->link(__('Edit'), ['controller' => 'Customers', 'action' => 'edit', $customers->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['controller' => 'Customers', 'action' => 'delete', $customers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customers->id)]) ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php endif; ?>
	</div>
</div>
