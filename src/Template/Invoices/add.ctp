<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('List Invoices'), ['action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Createds'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Created'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="invoices form large-10 medium-9 columns">
	<?= $this->Form->create($invoice); ?>
	<fieldset>
		<legend><?= __('Add Invoice') ?></legend>
		<?php
			echo $this->Form->input('recstatus');
			echo $this->Form->input('created_id', ['options' => $createds]);
			echo $this->Form->input('modified_id', ['options' => $modifieds]);
			echo $this->Form->input('freight_due');
			echo $this->Form->input('freightInvoicedDate');
			echo $this->Form->input('freight_invoiced');
			echo $this->Form->input('freightPaidDate');
			echo $this->Form->input('freight_paid');
			echo $this->Form->input('lpo');
			echo $this->Form->input('lpc');
			echo $this->Form->input('dpc');
			echo $this->Form->input('dpo');
			echo $this->Form->input('final_freight');
			echo $this->Form->input('brokerageLfb');
			echo $this->Form->input('lfbBrokerageReceived');
			echo $this->Form->input('lfbBrokerageRaised');
			echo $this->Form->input('order_id', ['options' => $orders]);
		?>
	</fieldset>
	<?= $this->Form->button(__('Submit')) ?>
	<?= $this->Form->end() ?>
</div>
