<h2>Order</h2>
<dl>
	<dt><?php echo __('Id'); ?></dt>
	<dd>
		<?php echo h($order['Order']['id']); ?>
	</dd>
	<dt><?php echo __('First Name'); ?></dt>
	<dd>
		<?php echo h($order['Order']['first_name']); ?>
	</dd>
	<dt><?php echo __('Last Name'); ?></dt>
	<dd>
		<?php echo h($order['Order']['last_name']); ?>
	</dd>
	<dt><?php echo __('Email'); ?></dt>
	<dd>
		<?php echo h($order['Order']['email']); ?>
	</dd>
	<dt><?php echo __('Subtotal'); ?></dt>
	<dd>
		<?php echo h($order['Order']['subtotal']); ?>
	</dd>
	<dt><?php echo __('Tax'); ?></dt>
	<dd>
		<?php echo h($order['Order']['tax']); ?>
	</dd>
	<dt><?php echo __('Shipping'); ?></dt>
	<dd>
		<?php echo h($order['Order']['shipping']); ?>
	</dd>
	<dt><?php echo __('Total'); ?></dt>
	<dd>
		<?php echo h($order['Order']['total']); ?>
	</dd>
	<dt><?php echo __('Status'); ?></dt>
	<dd>
		<?php echo h($order['Order']['status']); ?>
	</dd>
	<dt>Created</dt>
	<dd>
		<?php echo h($order['Order']['created']); ?>
	</dd>
	<dt>Modified</dt>
	<dd>
		<?php echo h($order['Order']['modified']); ?>
	</dd>
</dl>

<br />

<h3>Actions</h3>

<?php echo $this->Html->link('Edit Order', array('action' => 'edit', $order['Order']['id']), array('class' => 'btn')); ?>

<br />
<br />

<?php echo $this->Form->postLink('Delete Order', array('action' => 'delete', $order['Order']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $order['Order']['id'])); ?>

<br />
<br />

<h3>Related Order Items</h3>

<?php if (!empty($order['OrderItem'])):?>
<table class="table-striped table-bordered table-condensed table-hover">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Order Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Quantity'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th>Created</th>
		<th>Modified</th>
		<th class="actions">Actions</th>
	</tr>
	<?php foreach ($order['OrderItem'] as $orderItem): ?>
		<tr>
			<td><?php echo $orderItem['id'];?></td>
			<td><?php echo $orderItem['order_id'];?></td>
			<td><?php echo $orderItem['name'];?></td>
			<td><?php echo $orderItem['quantity'];?></td>
			<td><?php echo $orderItem['price'];?></td>
			<td><?php echo $orderItem['created'];?></td>
			<td><?php echo $orderItem['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link('View', array('controller' => 'order_items', 'action' => 'view', $orderItem['id']), array('class' => 'btn btn-mini')); ?>
				<?php echo $this->Html->link('Edit', array('controller' => 'order_items', 'action' => 'edit', $orderItem['id']), array('class' => 'btn btn-mini')); ?>
				<?php echo $this->Form->postLink('Delete', array('controller' => 'order_items', 'action' => 'delete', $orderItem['id']), array('class' => 'btn btn-mini btn-danger'), __('Are you sure you want to delete # %s?', $orderItem['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
</table>
<?php endif; ?>


