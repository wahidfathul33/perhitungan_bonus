<div class="payments view">
<h2><?php //pr($paymentEmployees); 
	echo __('Payment'); ?></h2>
	<table style="border: none;" class="table table-borderless">
		<tr>
			<td>Judul</td>
			<td><?php echo $payment['Payment']['judul']; ?></td>
		</tr>
		<tr>
			<td>Nominal</td>
			<td><?php echo $payment['Payment']['nominal']; ?></td>
		</tr>
	</table>
	<h3>Buruh</h3>
	<table style="border: none;" class="table">
		<thead>
			<th>Nama</th>
			<th>Persen</th>
			<th>Nominal</th>
		</thead>
		<?php foreach($paymentEmployees as $key => $employee) : ?>
		<tr>
			<td><?= $employee['Employee']['nama'] ?></td>
			<td><?= $employee['PaymentEmployee']['persen'] ?>%</td>
			<td>Rp <?= $employee['PaymentEmployee']['nominal'] ?></td>
		</tr>
		<?php endforeach; ?>
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
		<li><?php echo $this->Html->link(__('Edit Payment'), array('action' => 'edit', $payment['Payment']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Payment'), array('action' => 'delete', $payment['Payment']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $payment['Payment']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Payments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payment'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Employees'); ?></h3>
	<?php if (!empty($payment['Employee'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nama'); ?></th>
		<th><?php echo __('Payment Id'); ?></th>
		<th><?php echo __('Nominal'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($payment['Employee'] as $employee): ?>
		<tr>
			<td><?php echo $employee['id']; ?></td>
			<td><?php echo $employee['nama']; ?></td>
			<td><?php echo $employee['payment_id']; ?></td>
			<td><?php echo $employee['nominal']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'employees', 'action' => 'view', $employee['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'employees', 'action' => 'edit', $employee['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'employees', 'action' => 'delete', $employee['id']), array('confirm' => __('Are you sure you want to delete # %s?', $employee['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
