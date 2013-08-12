<?php echo $this->Html->script('addtocart.js', array('inline' => false)); ?>

<?php if($ajax != 1): ?>

<?php $this->Html->addCrumb('Search'); ?>

<h1>Search</h1>

<br />

<div class="row">

<?php echo $this->Form->create('Product', array('type' => 'GET')); ?>

<div class="col col-lg-4">
	<?php echo $this->Form->input('search', array('label' => false, 'div' => false, 'class' => 'form-control input-small', 'autocomplete' => 'off', 'value' => $search)); ?>
</div>

<div class="col col-lg-3">
	<?php echo $this->Form->button('Search', array('div' => false, 'class' => 'btn btn-sm btn-primary')); ?>
</div>

<?php echo $this->Form->end(); ?>

</div>

<br />
<br />

<?php endif; ?>

<?php // echo $this->Html->script('search.js', array('inline' => false)); ?>

<?php if(!empty($search)) : ?>

<?php $this->Html->addCrumb($search); ?>

<?php if(!empty($products)) : ?>

<div class="row">
<?php
$i = 0;
foreach ($products as $product):
$i++;
if (($i % 4) == 0) { echo "\n<div class=\"row\">\n\n";}
?>
<div class="col col-lg-3">
<?php echo $this->Html->image('/images/small/' . $product['Product']['image'], array('url' => array('controller' => 'products', 'action' => 'view', 'slug' => $product['Product']['slug']), 'alt' => $product['Product']['name'], 'width' => 150, 'height' => 150, 'class' => 'image')); ?>
<br />
<?php echo $this->Html->link($product['Product']['name'], array('controller' => 'products', 'action' => 'view', 'slug' => $product['Product']['slug'])); ?>
<br />
$<?php echo $product['Product']['price']; ?>
<br />
<?php echo $this->Form->create(NULL, array('url' => array('controller' => 'shop', 'action' => 'add'))); ?>
<?php echo $this->Form->input('id', array('type' => 'hidden', 'value' => $product['Product']['id'])); ?>
<?php echo $this->Form->button('Add to Cart', array('class' => 'btn btn-sm btn-primary addtocart', 'id' => $product['Product']['id']));?>
<?php echo $this->Form->end();?>
<br />
<br />
</div>
<?php
if (($i % 4) == 0) { echo "\n</div>\n\n";}
endforeach;
?>
</div>

<br />
<br />
<br />

<?php else: ?>

<h3>No Results</h3>

<?php endif; ?>
<?php endif; ?>

