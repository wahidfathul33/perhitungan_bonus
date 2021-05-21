<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<table>
		<tr><?php echo __('Id'); ?></tr>
		<tr>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</tr><br>
		<tr><?php echo __('Username'); ?></tr>
		<tr>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</tr><br>
		<!-- <tr><?php echo __('Password'); ?></tr>
		<tr>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</tr> --><br>
		<tr><?php echo __('Role'); ?></tr>
		<tr>
			<?php echo h($user['User']['role']); ?>
			&nbsp;
		</tr><br>
		<tr><?php echo __('Created'); ?></tr>
		<tr>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</tr><br>
		<tr><?php echo __('Modified'); ?></tr>
		<tr>
			<?php echo h($user['User']['modified']); ?>
			&nbsp;
		</tr><br>
	</table>
</div>
<div class="actions">
	<?php 
		$user = $this->Session->read('data_user');
		$role = $user['User']['role'];
	?>
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Payment'), array('controller' => 'payments', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Employee'), array('controller' => 'employees', 'action' => 'index')); ?></li>
		<?php if($role == 'admin'){ ?>
		<li><?php echo $this->Html->link(__('User'), array('controller' => 'users', 'action' => 'add')); ?></li>
		<?php } ?>
		<li><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?></li>
	</ul>
	<br>
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $user['User']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
	</ul>
</div>
