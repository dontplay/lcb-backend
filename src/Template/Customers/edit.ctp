<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id)]) ?></li>
		<li><?= $this->Html->link(__('List Customers'), ['action' => 'index']) ?></li>
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
<div class="customers form large-10 medium-9 columns">
<?= $this->Form->create($customer) ?>
	<fieldset>
		<legend><?= __('Edit Customer') ?></legend>
	<?php
		echo $this->Form->input('recstatus');
		echo $this->Form->input('creator_id', ['options' => $creators]);
		echo $this->Form->input('modifier_id', ['options' => $modifiers]);
		echo $this->Form->input('name');
		echo $this->Form->input('address');
		echo $this->Form->input('pincode');
		echo $this->Form->input('email');
		echo $this->Form->input('contact');
		echo $this->Form->input('credit_period');
		echo $this->Form->input('remarks');
		echo $this->Form->input('city_id', ['options' => $cities]);
		echo $this->Form->input('customer_category_id', ['options' => $customerCategories]);
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
