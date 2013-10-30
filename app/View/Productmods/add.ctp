<div class="productmods form">
<?php echo $this->Form->create('Productmod'); ?>
	<fieldset>
		<legend><?php echo __('Add Productmod'); ?></legend>
	<?php
		echo $this->Form->input('product_id');
		echo $this->Form->input('sku');
		echo $this->Form->input('active');
		echo $this->Form->input('name');
		echo $this->Form->input('price');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Productmods'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
