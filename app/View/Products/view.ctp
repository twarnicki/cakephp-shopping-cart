<?php echo $this->Html->script(array('addtocart.js'), array('inline' => false)); ?>

<h1><?php echo $product['Product']['name']; ?></h1>

<?php echo $this->Html->Image('/images/large/' . $product['Product']['image'], array('alt' => $product['Product']['name'], 'class' => 'image')); ?>

<br />

$ <?php echo $product['Product']['price']; ?>

<br />
<br />

<?php echo $this->Form->create(NULL, array('url' => array('controller' => 'shop', 'action' => 'add'))); ?>
<?php echo $this->Form->input('id', array('type' => 'hidden', 'value' => $product['Product']['id'])); ?>
<?php echo $this->Form->button('<i class="icon-shopping-cart icon-white"></i> Add to Cart', array('class' => 'btn btn-primary addtocart', 'id' => $product['Product']['id'], 'escape' => false));?>
<?php echo $this->Form->end(); ?>

<br />

<?php echo $product['Product']['description']; ?>

<br />
<br />
<br />

