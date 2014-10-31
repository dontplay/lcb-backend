<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('List Vessel Owners'), ['action' => 'index']) ?></li>
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
<div class="vesselOwners form large-10 medium-9 columns">
<?= $this->Form->create($vesselOwner) ?>
	<fieldset>
		<legend><?= __('Add Vessel Owner') ?></legend>
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
		echo $this->Form->input('category_id', ['options' => $categories]);
		echo $this->Form->input('city_id', ['options' => $cities]);
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
