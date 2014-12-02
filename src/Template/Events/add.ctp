<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('List Events'), ['action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Creators'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Creator'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="events form large-10 medium-9 columns">
	<?= $this->Form->create($event); ?>
	<fieldset>
		<legend><?= __('Add Event') ?></legend>
		<?php
			echo $this->Form->input('recstatus');
			echo $this->Form->input('creator_id', ['options' => $creators]);
			echo $this->Form->input('modifier_id', ['options' => $modifiers]);
			echo $this->Form->input('title');
			echo $this->Form->input('start');
		?>
	</fieldset>
	<?= $this->Form->button(__('Submit')) ?>
	<?= $this->Form->end() ?>
</div>
