<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Port Agent Contact'), ['action' => 'edit', $portAgentContact->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Port Agent Contact'), ['action' => 'delete', $portAgentContact->id], ['confirm' => __('Are you sure you want to delete # {0}?', $portAgentContact->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Port Agent Contacts'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Port Agent Contact'), ['action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Creators'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Creator'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Port Agents'), ['controller' => 'PortAgents', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Port Agent'), ['controller' => 'PortAgents', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="portAgentContacts view large-10 medium-9 columns">
	<h2><?= h($portAgentContact->name) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Creator') ?></h6>
			<p><?= $portAgentContact->has('creator') ? $this->Html->link($portAgentContact->creator->id, ['controller' => 'Users', 'action' => 'view', $portAgentContact->creator->id]) : '' ?>" ?></p>
			<h6 class="subheader"><?= __('Modifier') ?></h6>
			<p><?= $portAgentContact->has('modifier') ? $this->Html->link($portAgentContact->modifier->id, ['controller' => 'Users', 'action' => 'view', $portAgentContact->modifier->id]) : '' ?>" ?></p>
			<h6 class="subheader"><?= __('Port Agent') ?></h6>
			<p><?= $portAgentContact->has('port_agent') ? $this->Html->link($portAgentContact->port_agent->name, ['controller' => 'PortAgents', 'action' => 'view', $portAgentContact->port_agent->id]) : '' ?>" ?></p>
			<h6 class="subheader"><?= __('Name') ?></h6>
			<p><?= h($portAgentContact->name) ?></p>
			<h6 class="subheader"><?= __('Number') ?></h6>
			<p><?= h($portAgentContact->number) ?></p>
			<h6 class="subheader"><?= __('Email') ?></h6>
			<p><?= h($portAgentContact->email) ?></p>
		</div>
		<div class="large-2 columns numbers end">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= $this->Number->format($portAgentContact->id) ?></p>
		</div>
		<div class="large-2 columns dates end">
			<h6 class="subheader"><?= __('Created') ?></h6>
			<p><?= h($portAgentContact->created) ?></p>
			<h6 class="subheader"><?= __('Modified') ?></h6>
			<p><?= h($portAgentContact->modified) ?></p>
		</div>
		<div class="large-2 columns booleans end">
			<h6 class="subheader"><?= __('Recstatus') ?></h6>
			<p><?= $portAgentContact->recstatus ? __('Yes') : __('No'); ?></p>
		</div>
	</div>
</div>
