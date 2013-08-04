<?php echo $this->Html->script(array('addtocart.js'), array('inline' => false)); ?>

<h1><?php echo $product['Product']['name']; ?></h1>

<?php echo $this->Html->Image('/images/large/' . $product['Product']['image'], array('alt' => $product['Product']['name'], 'class' => 'img-responsive')); ?>

<br />

$ <?php echo $product['Product']['price']; ?>

<br />
<br />

<?php echo $this->Form->create(NULL, array('url' => array('controller' => 'shop', 'action' => 'add'))); ?>
<?php echo $this->Form->input('id', array('type' => 'hidden', 'value' => $product['Product']['id'])); ?>
<?php echo $this->Form->button('Add to Cart', array('class' => 'btn btn-sm btn-primary addtocart', 'id' => $product['Product']['id']));?>
<?php echo $this->Form->end(); ?>

<br />

<?php echo $product['Product']['description']; ?>

<br />
<br />

Manufacturer: <?php echo $this->Html->link($product['Manufacturer']['name'], array('controller' => 'manufacturers', 'action' => 'view', 'slug' => $product['Manufacturer']['slug'])); ?>

<br />
<br />

Category: <?php echo $this->Html->link($product['Category']['name'], array('controller' => 'categories', 'action' => 'view', 'slug' => $product['Category']['slug'])); ?>

<br />
<br />

