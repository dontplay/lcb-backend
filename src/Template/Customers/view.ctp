<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Customer'), ['action' => 'edit', $customer->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Customer'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Customers'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Customer'), ['action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Creators'), ['controller' => 'Creators', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Creator'), ['controller' => 'Creators', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Modifiers'), ['controller' => 'Modifiers', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Modifier'), ['controller' => 'Modifiers', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List CustomerCategories'), ['controller' => 'CustomerCategories', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Customer Category'), ['controller' => 'CustomerCategories', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List CustomerContacts'), ['controller' => 'CustomerContacts', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Customer Contact'), ['controller' => 'CustomerContacts', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="customers view large-10 medium-9 columns">
	<h2><?= h($customer->name) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Creator') ?></h6>
			<p><?= $customer->has('creator') ? $this->Html->link($customer->creator->id, ['controller' => 'Creators', 'action' => 'view', $customer->creator->id]) : '' ?></p>
			<h6 class="subheader"><?= __('Modifier') ?></h6>
			<p><?= $customer->has('modifier') ? $this->Html->link($customer->modifier->id, ['controller' => 'Modifiers', 'action' => 'view', $customer->modifier->id]) : '' ?></p>
			<h6 class="subheader"><?= __('Name') ?></h6>
			<p><?= h($customer->name) ?></p>
			<h6 class="subheader"><?= __('Email') ?></h6>
			<p><?= h($customer->email) ?></p>
			<h6 class="subheader"><?= __('City') ?></h6>
			<p><?= $customer->has('city') ? $this->Html->link($customer->city->name, ['controller' => 'Cities', 'action' => 'view', $customer->city->id]) : '' ?></p>
			<h6 class="subheader"><?= __('Customer Category') ?></h6>
			<p><?= $customer->has('customer_category') ? $this->Html->link($customer->customer_category->name, ['controller' => 'CustomerCategories', 'action' => 'view', $customer->customer_category->id]) : '' ?></p>
		</div>
		<div class="large-2 large-offset-1 columns numbers end">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= $this->Number->format($customer->id) ?></p>
			<h6 class="subheader"><?= __('Pincode') ?></h6>
			<p><?= $this->Number->format($customer->pincode) ?></p>
			<h6 class="subheader"><?= __('Contact') ?></h6>
			<p><?= $this->Number->format($customer->contact) ?></p>
			<h6 class="subheader"><?= __('Credit Period') ?></h6>
			<p><?= $this->Number->format($customer->credit_period) ?></p>
		</div>
		<div class="large-2 columns dates end">
			<h6 class="subheader"><?= __('Created') ?></h6>
			<p><?= h($customer->created) ?></p>
			<h6 class="subheader"><?= __('Modified') ?></h6>
			<p><?= h($customer->modified) ?></p>
		</div>
		<div class="large-2 columns booleans end">
			<h6 class="subheader"><?= __('Recstatus') ?></h6>
			<p><?= $customer->recstatus ? __('Yes') : __('No'); ?></p>
		</div>
	</div>
	<div class="row texts">
		<div class="columns large-9">
			<h6 class="subheader"><?= __('Address') ?></h6>
			<?= $this->Text->autoParagraph(h($customer->address)); ?>
		</div>
	</div>
	<div class="row texts">
		<div class="columns large-9">
			<h6 class="subheader"><?= __('Remarks') ?></h6>
			<?= $this->Text->autoParagraph(h($customer->remarks)); ?>
		</div>
	</div>
</div>
<div class="related row">
	<div class="column large-12">
	<h4 class="subheader"><?= __('Related CustomerContacts') ?></h4>
	<?php if (!empty($customer->customer_contacts)): ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?= __('Id') ?></th>
			<th><?= __('Recstatus') ?></th>
			<th><?= __('Creator Id') ?></th>
			<th><?= __('Created') ?></th>
			<th><?= __('Modifier Id') ?></th>
			<th><?= __('Modified') ?></th>
			<th><?= __('Customer Id') ?></th>
			<th><?= __('Name') ?></th>
			<th><?= __('Number') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
		<?php foreach ($customer->customer_contacts as $customerContacts): ?>
		<tr>
			<td><?= h($customerContacts->id) ?></td>
			<td><?= h($customerContacts->recstatus) ?></td>
			<td><?= h($customerContacts->creator_id) ?></td>
			<td><?= h($customerContacts->created) ?></td>
			<td><?= h($customerContacts->modifier_id) ?></td>
			<td><?= h($customerContacts->modified) ?></td>
			<td><?= h($customerContacts->customer_id) ?></td>
			<td><?= h($customerContacts->name) ?></td>
			<td><?= h($customerContacts->number) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['controller' => 'CustomerContacts', 'action' => 'view', $customerContacts->id]) ?>
				<?= $this->Html->link(__('Edit'), ['controller' => 'CustomerContacts', 'action' => 'edit', $customerContacts->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['controller' => 'CustomerContacts', 'action' => 'delete', $customerContacts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customerContacts->id)]) ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php endif; ?>
	</div>
</div>
<div class="related row">
	<div class="column large-12">
	<h4 class="subheader"><?= __('Related Orders') ?></h4>
	<?php if (!empty($customer->orders)): ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?= __('Id') ?></th>
			<th><?= __('Recstatus') ?></th>
			<th><?= __('Creator Id') ?></th>
			<th><?= __('Created') ?></th>
			<th><?= __('Modifier Id') ?></th>
			<th><?= __('Modified') ?></th>
			<th><?= __('Fixture Date') ?></th>
			<th><?= __('LaycanStartDate') ?></th>
			<th><?= __('LaycanEndDate') ?></th>
			<th><?= __('Customer Id') ?></th>
			<th><?= __('Vessel Owner Id') ?></th>
			<th><?= __('Status') ?></th>
			<th><?= __('Vessel Id') ?></th>
			<th><?= __('Port Id') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
		<?php foreach ($customer->orders as $orders): ?>
		<tr>
			<td><?= h($orders->id) ?></td>
			<td><?= h($orders->recstatus) ?></td>
			<td><?= h($orders->creator_id) ?></td>
			<td><?= h($orders->created) ?></td>
			<td><?= h($orders->modifier_id) ?></td>
			<td><?= h($orders->modified) ?></td>
			<td><?= h($orders->fixture_date) ?></td>
			<td><?= h($orders->laycanStartDate) ?></td>
			<td><?= h($orders->laycanEndDate) ?></td>
			<td><?= h($orders->customer_id) ?></td>
			<td><?= h($orders->vessel_owner_id) ?></td>
			<td><?= h($orders->status) ?></td>
			<td><?= h($orders->vessel_id) ?></td>
			<td><?= h($orders->port_id) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['controller' => 'Orders', 'action' => 'view', $orders->id]) ?>
				<?= $this->Html->link(__('Edit'), ['controller' => 'Orders', 'action' => 'edit', $orders->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['controller' => 'Orders', 'action' => 'delete', $orders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orders->id)]) ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php endif; ?>
	</div>
</div>
