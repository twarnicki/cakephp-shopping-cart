<?php echo $this->Html->script(array('addtocart.js'), array('inline' => false)); ?>

<h1><?php echo Configure::read('Settings.SHOP_TITLE'); ?></h1>

<br />

<?php echo $this->element('products'); ?>