
<h2><?php echo h($manufacturer['Manufacturer']['name']); ?><small> Manufacturer</small></h2>

<h3>Related Products</h3>
<?php if (!empty($manufacturer['Product'])): ?>

<?php foreach ($manufacturer['Product'] as $product): ?>
<?php echo $this->Html->link($product['name'], array('controller' => 'products', 'action' => 'view', 'slug' => $product['slug'])); ?><br />
<?php endforeach; ?>

<?php endif; ?>
