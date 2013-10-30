<div class="productmods index">
	<h2><?php echo __('Productmods'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('product_id'); ?></th>
			<th><?php echo $this->Paginator->sort('sku'); ?></th>
			<th><?php echo $this->Paginator->sort('active'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('price'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($productmods as $productmod): ?>
	<tr>
		<td><?php echo h($productmod['Productmod']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($productmod['Product']['name'], array('controller' => 'products', 'action' => 'view', $productmod['Product']['id'])); ?>
		</td>
		<td><?php echo h($productmod['Productmod']['sku']); ?>&nbsp;</td>
		<td><?php echo h($productmod['Productmod']['active']); ?>&nbsp;</td>
		<td><?php echo h($productmod['Productmod']['name']); ?>&nbsp;</td>
		<td><?php echo h($productmod['Productmod']['price']); ?>&nbsp;</td>
		<td><?php echo h($productmod['Productmod']['modified']); ?>&nbsp;</td>
		<td><?php echo h($productmod['Productmod']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $productmod['Productmod']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $productmod['Productmod']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $productmod['Productmod']['id']), null, __('Are you sure you want to delete # %s?', $productmod['Productmod']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Productmod'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
