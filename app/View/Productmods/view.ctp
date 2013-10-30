<div class="productmods view">
<h2><?php echo __('Productmod'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($productmod['Productmod']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product'); ?></dt>
		<dd>
			<?php echo $this->Html->link($productmod['Product']['name'], array('controller' => 'products', 'action' => 'view', $productmod['Product']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sku'); ?></dt>
		<dd>
			<?php echo h($productmod['Productmod']['sku']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($productmod['Productmod']['active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($productmod['Productmod']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($productmod['Productmod']['price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($productmod['Productmod']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($productmod['Productmod']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Productmod'), array('action' => 'edit', $productmod['Productmod']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Productmod'), array('action' => 'delete', $productmod['Productmod']['id']), null, __('Are you sure you want to delete # %s?', $productmod['Productmod']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Productmods'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Productmod'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
