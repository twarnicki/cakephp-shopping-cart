
<h2><?php echo $category['Category']['name']; ?><small> Category</small></h1>

<br />
<br />

<h3><?php echo __('Related Products'); ?></h3>

<?php if (!empty($category['Product'])): ?>

<?php foreach ($category['Product'] as $product): ?>
<div class="row">
	<div class="span1">
		<?php echo $this->Html->image('/images/small/' . $product['image'], array('url' => array('controller' => 'products', 'action' => 'view', 'slug' => $product['slug']), 'alt' => $product['name'], 'width' => 150, 'height' => 150, 'class' => 'image')); ?>
	</div>
	<div class="span10">
		<?php echo $this->Html->link($product['name'], array('controller' => 'products', 'action' => 'view', 'slug' => $product['slug'])); ?>
		<br />
		$<?php echo $product['price']; ?>
	</div>
</div>
<br />
<?php endforeach; ?>

<?php endif; ?>