<h2>Order</h2>

<table class="table-striped table-bordered table-condensed table-hover">
	<tr>
		<td>Id</td>
		<td><?php echo h($order['Order']['id']); ?></td>
	</tr>
	<tr>
		<td>First Name</td>
		<td><?php echo h($order['Order']['first_name']); ?></td>
	</tr>
	<tr>
		<td>Last Name</td>
		<td><?php echo h($order['Order']['last_name']); ?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td><?php echo h($order['Order']['email']); ?></td>
	</tr>
	<tr>
		<td>Subtotal</td>
		<td><?php echo h($order['Order']['subtotal']); ?></td>
	</tr>
	<tr>
		<td>Tax</td>
		<td><?php echo h($order['Order']['tax']); ?></td>
	</tr>
	<tr>
		<td>Shipping</td>
		<td><?php echo h($order['Order']['shipping']); ?></td>
	</tr>
	<tr>
		<td>Total</td>
		<td><?php echo h($order['Order']['total']); ?></td>
	</tr>
	<tr>
		<td>Status</td>
		<td><?php echo h($order['Order']['status']); ?></td>
	</tr>
	<tr>
		<td>Created</td>
		<td><?php echo h($order['Order']['created']); ?></td>
	</tr>
	<tr>
		<td>Modified</td>
		<td><?php echo h($order['Order']['modified']); ?></td>
	</tr>
</table>

<br />

<h3>Actions</h3>

<?php echo $this->Html->link('Edit Order', array('action' => 'edit', $order['Order']['id']), array('class' => 'btn btn-default')); ?>

<br />
<br />

<?php echo $this->Form->postLink('Delete Order', array('action' => 'delete', $order['Order']['id']), array('class' => 'btn btn-default btn-danger'), __('Are you sure you want to delete # %s?', $order['Order']['id'])); ?>

<br />
<br />

<h3>Related Order Items</h3>

<?php if (!empty($order['OrderItem'])):?>

<table class="table-striped table-bordered table-condensed table-hover">
	<tr>
		<th>Id</th>
		<th>Order Id</th>
		<th>Name</th>
		<th>Quantity</th>
		<th>Price</th>
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
				<?php echo $this->Html->link('View', array('controller' => 'order_items', 'action' => 'view', $orderItem['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Html->link('Edit', array('controller' => 'order_items', 'action' => 'edit', $orderItem['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Form->postLink('Delete', array('controller' => 'order_items', 'action' => 'delete', $orderItem['id']), array('class' => 'btn btn-xs btn-danger'), __('Are you sure you want to delete # %s?', $orderItem['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
</table>

<?php endif; ?>


