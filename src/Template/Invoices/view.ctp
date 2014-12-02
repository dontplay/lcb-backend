<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Invoice'), ['action' => 'edit', $invoice->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Invoice'), ['action' => 'delete', $invoice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoice->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Invoices'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Invoice'), ['action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Createds'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Created'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="invoices view large-10 medium-9 columns">
	<h2><?= h($invoice->id) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Created') ?></h6>
			<p><?= $invoice->has('created') ? $this->Html->link($invoice->created->id, ['controller' => 'Users', 'action' => 'view', $invoice->created->id]) : '' ?>" ?></p>
			<h6 class="subheader"><?= __('Modified') ?></h6>
			<p><?= $invoice->has('modified') ? $this->Html->link($invoice->modified->id, ['controller' => 'Users', 'action' => 'view', $invoice->modified->id]) : '' ?>" ?></p>
			<h6 class="subheader"><?= __('Order') ?></h6>
			<p><?= $invoice->has('order') ? $this->Html->link($invoice->order->id, ['controller' => 'Orders', 'action' => 'view', $invoice->order->id]) : '' ?>" ?></p>
		</div>
		<div class="large-2 columns numbers end">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= $this->Number->format($invoice->id) ?></p>
			<h6 class="subheader"><?= __('Freight Due') ?></h6>
			<p><?= $this->Number->format($invoice->freight_due) ?></p>
			<h6 class="subheader"><?= __('Freight Invoiced') ?></h6>
			<p><?= $this->Number->format($invoice->freight_invoiced) ?></p>
			<h6 class="subheader"><?= __('Freight Paid') ?></h6>
			<p><?= $this->Number->format($invoice->freight_paid) ?></p>
			<h6 class="subheader"><?= __('Lpo') ?></h6>
			<p><?= $this->Number->format($invoice->lpo) ?></p>
			<h6 class="subheader"><?= __('Lpc') ?></h6>
			<p><?= $this->Number->format($invoice->lpc) ?></p>
			<h6 class="subheader"><?= __('Dpc') ?></h6>
			<p><?= $this->Number->format($invoice->dpc) ?></p>
			<h6 class="subheader"><?= __('Dpo') ?></h6>
			<p><?= $this->Number->format($invoice->dpo) ?></p>
			<h6 class="subheader"><?= __('Final Freight') ?></h6>
			<p><?= $this->Number->format($invoice->final_freight) ?></p>
		</div>
		<div class="large-2 columns dates end">
			<h6 class="subheader"><?= __('Created') ?></h6>
			<p><?= h($invoice->created) ?></p>
			<h6 class="subheader"><?= __('Modified') ?></h6>
			<p><?= h($invoice->modified) ?></p>
			<h6 class="subheader"><?= __('FreightInvoicedDate') ?></h6>
			<p><?= h($invoice->freightInvoicedDate) ?></p>
			<h6 class="subheader"><?= __('FreightPaidDate') ?></h6>
			<p><?= h($invoice->freightPaidDate) ?></p>
			<h6 class="subheader"><?= __('BrokerageLfb') ?></h6>
			<p><?= h($invoice->brokerageLfb) ?></p>
			<h6 class="subheader"><?= __('LfbBrokerageReceived') ?></h6>
			<p><?= h($invoice->lfbBrokerageReceived) ?></p>
			<h6 class="subheader"><?= __('LfbBrokerageRaised') ?></h6>
			<p><?= h($invoice->lfbBrokerageRaised) ?></p>
		</div>
		<div class="large-2 columns booleans end">
			<h6 class="subheader"><?= __('Recstatus') ?></h6>
			<p><?= $invoice->recstatus ? __('Yes') : __('No'); ?></p>
		</div>
	</div>
</div>
