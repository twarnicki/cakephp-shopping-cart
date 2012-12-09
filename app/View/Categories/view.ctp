
<h2><?php echo $category['Category']['name']; ?><small> Category</small></h1>

<br />
<br />

<h3>Related Products</h3>

<?php if (!empty($products)): ?>

<?php foreach ($products as $product): ?>
<div class="row">
	<div class="span1">
		<?php echo $this->Html->image('/images/small/' . $product['Product']['image'], array('url' => array('controller' => 'products', 'action' => 'view', 'slug' => $product['Product']['slug']), 'alt' => $product['Product']['name'], 'width' => 150, 'height' => 150, 'class' => 'image')); ?>
	</div>
	<div class="span10">
		<?php echo $this->Html->link($product['Product']['name'], array('controller' => 'products', 'action' => 'view', 'slug' => $product['Product']['slug'])); ?>
		<br />
		$<?php echo $product['Product']['price']; ?>
	</div>
</div>
<br />
<?php endforeach; ?>

<?php endif; ?>