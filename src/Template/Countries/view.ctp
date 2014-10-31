<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Country'), ['action' => 'edit', $country->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Country'), ['action' => 'delete', $country->id], ['confirm' => __('Are you sure you want to delete # {0}?', $country->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Countries'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Country'), ['action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Creators'), ['controller' => 'Creators', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Creator'), ['controller' => 'Creators', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Modifiers'), ['controller' => 'Modifiers', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Modifier'), ['controller' => 'Modifiers', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Ports'), ['controller' => 'Ports', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Port'), ['controller' => 'Ports', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="countries view large-10 medium-9 columns">
	<h2><?= h($country->name) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Creator') ?></h6>
			<p><?= $country->has('creator') ? $this->Html->link($country->creator->id, ['controller' => 'Creators', 'action' => 'view', $country->creator->id]) : '' ?></p>
			<h6 class="subheader"><?= __('Modifier') ?></h6>
			<p><?= $country->has('modifier') ? $this->Html->link($country->modifier->id, ['controller' => 'Modifiers', 'action' => 'view', $country->modifier->id]) : '' ?></p>
			<h6 class="subheader"><?= __('Name') ?></h6>
			<p><?= h($country->name) ?></p>
		</div>
		<div class="large-2 large-offset-1 columns numbers end">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= $this->Number->format($country->id) ?></p>
		</div>
		<div class="large-2 columns dates end">
			<h6 class="subheader"><?= __('Created') ?></h6>
			<p><?= h($country->created) ?></p>
			<h6 class="subheader"><?= __('Modified') ?></h6>
			<p><?= h($country->modified) ?></p>
		</div>
		<div class="large-2 columns booleans end">
			<h6 class="subheader"><?= __('Recstatus') ?></h6>
			<p><?= $country->recstatus ? __('Yes') : __('No'); ?></p>
		</div>
	</div>
</div>
<div class="related row">
	<div class="column large-12">
	<h4 class="subheader"><?= __('Related Cities') ?></h4>
	<?php if (!empty($country->cities)): ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?= __('Id') ?></th>
			<th><?= __('Recstatus') ?></th>
			<th><?= __('Creator Id') ?></th>
			<th><?= __('Created') ?></th>
			<th><?= __('Modifier Id') ?></th>
			<th><?= __('Modified') ?></th>
			<th><?= __('Name') ?></th>
			<th><?= __('Country Id') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
		<?php foreach ($country->cities as $cities): ?>
		<tr>
			<td><?= h($cities->id) ?></td>
			<td><?= h($cities->recstatus) ?></td>
			<td><?= h($cities->creator_id) ?></td>
			<td><?= h($cities->created) ?></td>
			<td><?= h($cities->modifier_id) ?></td>
			<td><?= h($cities->modified) ?></td>
			<td><?= h($cities->name) ?></td>
			<td><?= h($cities->country_id) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['controller' => 'Cities', 'action' => 'view', $cities->id]) ?>
				<?= $this->Html->link(__('Edit'), ['controller' => 'Cities', 'action' => 'edit', $cities->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['controller' => 'Cities', 'action' => 'delete', $cities->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cities->id)]) ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php endif; ?>
	</div>
</div>
<div class="related row">
	<div class="column large-12">
	<h4 class="subheader"><?= __('Related Ports') ?></h4>
	<?php if (!empty($country->ports)): ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?= __('Id') ?></th>
			<th><?= __('Recstatus') ?></th>
			<th><?= __('Creator Id') ?></th>
			<th><?= __('Created') ?></th>
			<th><?= __('Modifier Id') ?></th>
			<th><?= __('Modified') ?></th>
			<th><?= __('Category') ?></th>
			<th><?= __('Country Id') ?></th>
			<th><?= __('Name') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
		<?php foreach ($country->ports as $ports): ?>
		<tr>
			<td><?= h($ports->id) ?></td>
			<td><?= h($ports->recstatus) ?></td>
			<td><?= h($ports->creator_id) ?></td>
			<td><?= h($ports->created) ?></td>
			<td><?= h($ports->modifier_id) ?></td>
			<td><?= h($ports->modified) ?></td>
			<td><?= h($ports->category) ?></td>
			<td><?= h($ports->country_id) ?></td>
			<td><?= h($ports->name) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['controller' => 'Ports', 'action' => 'view', $ports->id]) ?>
				<?= $this->Html->link(__('Edit'), ['controller' => 'Ports', 'action' => 'edit', $ports->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['controller' => 'Ports', 'action' => 'delete', $ports->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ports->id)]) ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php endif; ?>
	</div>
</div>
