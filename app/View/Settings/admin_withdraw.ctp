<h1 class="page-title">Withdraw Setting</h1>
<div class="grid simple">

<div class="users form">



<?php echo $this->Form->create('Setting',array('enctype'=>'multipart/form-data')); ?>
	<fieldset>
		
	<?php
	    echo $this->Form->input('id');
	    echo $this->Form->input('minimum_withdraw_amount',array('required'=>'required'));		 
		echo $this->Form->input('maximum_withdraw_amount',array('required'=>'required'));
		echo $this->Form->input('admin_withdraw_commission',array('required'=>'required','label'=>'Admin Withdraw Charge'));				
	?>
	<?php echo $this->Form->end(__('Update')); ?>
	</fieldset>

</div>
</div>