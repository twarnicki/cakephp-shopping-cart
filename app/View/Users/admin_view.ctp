

<h2>User</h2>

<dl>
	<dt><?php echo __('Id'); ?></dt>
	<dd>
	<?php echo h($user['User']['id']); ?>
	</dd>
	<dt><?php echo __('Username'); ?></dt>
	<dd>
	<?php echo h($user['User']['username']); ?>
	</dd>
	<dt><?php echo __('Password'); ?></dt>
	<dd>
	<?php echo h($user['User']['password']); ?>
	</dd>
	<dt>Created</dt>
	<dd>
	<?php echo h($user['User']['created']); ?>
	</dd>
	<dt>Modified</dt>
	<dd>
	<?php echo h($user['User']['modified']); ?>
	</dd>
</dl>

<br />
<br />

<div class="actions">
	<h3>Actions</h3>
	<ul>
		<li><?php echo $this->Html->link('Edit User', array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>

	</ul>
</div>
