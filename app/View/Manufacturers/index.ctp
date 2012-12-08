<h2>Manufacturers</h2>

<table class="table-striped table-bordered table-condensed table-hover">
	<tr>
		<th>Name</th>
	</tr>
	<?php foreach ($manufacturers as $manufacturer): ?>
	<tr>
		<td><?php echo $this->Html->link($manufacturer['Manufacturer']['name'], array('action' => 'view', $manufacturer['Manufacturer']['id'])); ?></td>
	</tr>
	<?php endforeach; ?>
</table>

<br />
<br />
