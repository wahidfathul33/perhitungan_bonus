<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		//echo $this->Form->input('role');
		echo $this->Form->input('role', array(
		    'options' => array("admin" => "Admin", 'user' => 'User'),
		    'empty' => '(choose one)'
		));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
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

		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
	</ul>
</div>
