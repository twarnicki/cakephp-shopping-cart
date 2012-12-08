<?php echo $this->Html->css(array('bootstrap-editable.css'), 'stylesheet', array('inline' => false)); ?>
<?php echo $this->Html->script(array('bootstrap-editable.js'), array('inline' => false)); ?>

<script>
$(document).ready(function() {

	$('.name').editable({
		type: 'text',
		name: 'name',
		url: '/admin/products/editable',
		title: 'Name',
		placement: 'right',
	});

	$('.price').editable({
		type: 'text',
		name: 'price',
		url: '/admin/products/editable',
		title: 'Price',
		placement: 'left',
	});

});
</script>
<h2>Products</h2>

<table class="table-striped table-bordered table-condensed table-hover">
	<tr>
		<th><?php echo $this->Paginator->sort('image'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('slug'); ?></th>
		<th><?php echo $this->Paginator->sort('description'); ?></th>
		<th><?php echo $this->Paginator->sort('image'); ?></th>
		<th><?php echo $this->Paginator->sort('price'); ?></th>
		<th><?php echo $this->Paginator->sort('weight'); ?></th>
		<th><?php echo $this->Paginator->sort('views'); ?></th>
		<th><?php echo $this->Paginator->sort('active'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th><?php echo $this->Paginator->sort('modified'); ?></th>
		<th class="actions">Actions</th>
	</tr>
	<?php foreach ($products as $product): ?>
	<tr>
		<td><?php echo $this->Html->Image('/images/small/' . $product['Product']['image'], array('width' => 100, 'height' => 100, 'alt' => $product['Product']['image'], 'class' => 'image')); ?></td>
		<td><span class="name" data-value="<?php echo $product['Product']['name']; ?>" data-pk="<?php echo $product['Product']['id']; ?>"><?php echo $product['Product']['name']; ?></span></td>
		<td><?php echo h($product['Product']['slug']); ?></td>
		<td><?php echo h($product['Product']['description']); ?></td>
		<td><?php echo h($product['Product']['image']); ?></td>
		<td><span class="price" data-value="<?php echo $product['Product']['price']; ?>" data-pk="<?php echo $product['Product']['id']; ?>"><?php echo $product['Product']['price']; ?></span></td>
		<td><?php echo h($product['Product']['weight']); ?></td>
		<td><?php echo h($product['Product']['views']); ?></td>
		<td><?php echo $this->Html->link($this->Html->image('icon_' . $product['Product']['active'] . '.png'), array('controller' => 'products', 'action' => 'switch', 'active', $product['Product']['id']), array('class' => 'status', 'escape' => false)); ?></td>
		<td><?php echo h($product['Product']['created']); ?></td>
		<td><?php echo h($product['Product']['modified']); ?></td>
		<td class="actions">
			<?php echo $this->Html->link('View', array('action' => 'view', $product['Product']['id']), array('class' => 'btn btn-mini')); ?>
			<?php echo $this->Html->link('Edit', array('action' => 'edit', $product['Product']['id']), array('class' => 'btn btn-mini')); ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>

<br />

<?php echo $this->element('pagination-counter'); ?>

<?php echo $this->element('pagination'); ?>

<br />
<br />

<h3>Actions</h3>

<?php echo $this->Html->link('New Product', array('action' => 'add'), array('class' => 'btn btn-mini')); ?>

<br />
<br />
