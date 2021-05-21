<div class="payments form">
<form action="/payments/add" id="myForm" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>
	<fieldset>
		<legend><?php echo __('Add Payment'); ?></legend>
	<div class="form-group">
		<label for="exampleFormControlTextarea1">Judul</label>
		<input type="text" class="form-control" name="data[Payment][judul]" placeholder="Judul">
	</div>
	<div class="form-group">
		<label for="exampleFormControlTextarea1">Total Nominal</label>
		<input type="number" class="form-control" id="tot_nominal" name="data[Payment][nominal]" placeholder="Total Nominal">
	</div>
	<div class="form-group">
		<label>Buruh</label>
		<div class="row" align="center">
		    <div class="col-4">
		    	<label>Nama</label>
		    </div>
		    <div class="col-3">
		    	<label>Persen</label>
		    </div>
		    <div class="col-3">
		    	<label>Nominal</label>
		    </div>
		    <div class="col-2">
		    	<label>Aksi</label>
		    </div>
		</div>
		<div id="buruh"  style="padding-bottom: 0px; margin-top: -60px" ></div>
			
	<button class="btn-sm btn-primary" style=" z-index: initial; position:absolute;" type="button" onclick="addRow()">Tambah Buruh</button><br><br>
	</div>
	</fieldset>
<div class="submit"><button type="button" class="btn btn-success" onclick="save()">Submit</button></div></form></div>
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

		<li><?php echo $this->Html->link(__('List Payments'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
	</ul>
</div>
<script type="text/javascript">
	$(document).ready(function() {
    	addRow();
    });

    var tot_persen = 0;

    function addRow() {
	    $.ajax({
	        type: "GET",
	        url: '/payments/add_row_buruh',
	        dataType: 'html'
	    }).done(function(response) {
	        $('#buruh').append(response);
	    });
	}

	function delList(random) {
		var persen = $('#persen_'+random).val();
		tot_persen = tot_persen - parseInt(persen);
        $('#form_'+random).remove();
        console.log(tot_persen);
    }

    function hitung(random) {
    	var tot_nominal = $('#tot_nominal').val();

    	if (!tot_nominal) {
    		alert("Harap isi total nominal"); 
    		$('#persen_'+random).val(0);
    		$('#old_persen_'+random).val(0);
    		$('#nominal_'+random).val(0);
    		return false;
    	}

    	var persen = $('#persen_'+random).val();

		var old_persen = $('#old_persen_'+random).val();
		if (!old_persen) {
			tot_persen = tot_persen + parseInt(persen);
		} else {
			tot_persen = tot_persen - parseInt(old_persen);
			tot_persen = tot_persen + parseInt(persen);
		}

    	var nominal = tot_nominal * persen / 100;
    	$('#nominal_'+random).val(nominal);
    	$('#old_persen_'+random).val(persen);

    	if (tot_persen > 100) {
    		alert("Total persentase melebihi 100%!");
    		$('#persen_'+random).val(0);
    		$('#old_persen_'+random).val(0);
    		$('#nominal_'+random).val(0);
    		return false;
    	} 

    	console.log(tot_persen);
    }

    function save() {
    	if (tot_persen != 100) {
    		alert("Total persentase harus 100%!");
    		return false;
    	} else {
    		$('form#myForm').submit();
    	}
    }
</script>