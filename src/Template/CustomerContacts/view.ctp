<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Customer Contact'), ['action' => 'edit', $customerContact->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Customer Contact'), ['action' => 'delete', $customerContact->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customerContact->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Customer Contacts'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Customer Contact'), ['action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Creators'), ['controller' => 'Creators', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Creator'), ['controller' => 'Creators', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Modifiers'), ['controller' => 'Modifiers', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Modifier'), ['controller' => 'Modifiers', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="customerContacts view large-10 medium-9 columns">
	<h2><?= h($customerContact->name) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Creator') ?></h6>
			<p><?= $customerContact->has('creator') ? $this->Html->link($customerContact->creator->id, ['controller' => 'Creators', 'action' => 'view', $customerContact->creator->id]) : '' ?></p>
			<h6 class="subheader"><?= __('Modifier') ?></h6>
			<p><?= $customerContact->has('modifier') ? $this->Html->link($customerContact->modifier->id, ['controller' => 'Modifiers', 'action' => 'view', $customerContact->modifier->id]) : '' ?></p>
			<h6 class="subheader"><?= __('Customer') ?></h6>
			<p><?= $customerContact->has('customer') ? $this->Html->link($customerContact->customer->name, ['controller' => 'Customers', 'action' => 'view', $customerContact->customer->id]) : '' ?></p>
			<h6 class="subheader"><?= __('Name') ?></h6>
			<p><?= h($customerContact->name) ?></p>
			<h6 class="subheader"><?= __('Number') ?></h6>
			<p><?= h($customerContact->number) ?></p>
		</div>
		<div class="large-2 large-offset-1 columns numbers end">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= $this->Number->format($customerContact->id) ?></p>
		</div>
		<div class="large-2 columns dates end">
			<h6 class="subheader"><?= __('Created') ?></h6>
			<p><?= h($customerContact->created) ?></p>
			<h6 class="subheader"><?= __('Modified') ?></h6>
			<p><?= h($customerContact->modified) ?></p>
		</div>
		<div class="large-2 columns booleans end">
			<h6 class="subheader"><?= __('Recstatus') ?></h6>
			<p><?= $customerContact->recstatus ? __('Yes') : __('No'); ?></p>
		</div>
	</div>
</div>
