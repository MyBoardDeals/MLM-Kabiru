<script>
updateWithdrawalStatus=function($status,$id){
 
        $('#withdrawal_status'+$id).html('Processing...');		  
		$url='<?php echo Configure::read('siteUrl');?>admin/transactions/ajax_common';			  
		$.post($url,{act:'status_change',status:$status,id:$id},function(data){		      
		  $('#withdrawal_status'+$id).html(data);	
		});   
}

</script>
<style>.ui-datepicker-calendar th { background:none;}</style>
<?php echo $this->Html->css('jquery-ui'); ?>
<?php echo $this->Html->script('jquery-1.9.1'); ?>	
<?php echo $this->Html->script('jquery-ui'); ?>

<div class="page-content">	

	<div class="row margin-bottom-20">
			<div class="col-md-9 col-sm-9">
			<a href="<?php echo $this->Html->url('/admin/transactions/today_withdrawal_request',true);?>" class="btn btn-primary"><i class="glyphicon glyphicon-list-alt"></i> Today's Requests</a>&nbsp;<a href="<?php echo $this->Html->url('/admin/transactions/pending_withdrawal_request',true);?>" class="btn btn-danger"><i class="glyphicon glyphicon-list-alt"></i> Pending Request</a>&nbsp;<a href="<?php echo $this->Html->url('/admin/transactions/completed_withdrawal_request',true);?>" class="btn btn-success"><i class="glyphicon glyphicon-list-alt"></i> Completed Request</a>
			</div>
			
				
	</div>			
		
			<div class="row">
				<div class="col-md-12">					
				
					<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-usd"></i> Today's Withdrawal Requests
							</div>							
						</div>
						<div class="portlet-body flip-scroll">
							<table class="table table-bordered table-striped table-condensed flip-content" width="100%">
							<thead class="flip-content">
							<tr>



		 <th width="4%" height="20"><a>No</a></th>
		<th width="14%"><?php echo $this->Paginator->sort('user_id'); ?></th>			
		<th width="9%"><a href="#">Member ID</a></th>
		<th width="13%"><?php echo $this->Paginator->sort('transaction_number'); ?></th>
		<th width="6%"><?php echo $this->Paginator->sort('amount'); ?></th>				
		<th width="10%" ><?php echo $this->Paginator->sort('payment_through'); ?></th>
		<th width="14%"><?php echo $this->Paginator->sort('withdrawal_status'); ?></th>		
		<th width="16%" ><?php echo $this->Paginator->sort('remarks'); ?></th>
		<th width="14%" ><?php echo $this->Paginator->sort('created'); ?></th>	
      </tr>	
   <?php     
   if(count($results)>0): ?>		  	
	<?php foreach ($results as $k=>$result): ?>
	<tr>
	     <td align="center"><?php echo h($k+1); ?></td>
	     <td align="center"><?php echo h($result['User']['first_name']); ?> <?php echo h($result['User']['last_name']); ?></td>		
		 <td align="center"><?php echo h($result['User']['member_code']); ?></td>
		 <td align="center">
		 <?php if(strlen($result['Transaction']['transaction_number'])>3): ?>
		  <?php echo $result['Transaction']['transaction_number'];?>
		 <?php else: ?>
		 <a href="<?php echo $this->Html->url('/admin/transactions/addtransaction/'.$result['Transaction']['id'],true);?>" class="thickbox"  ><strong>Add&nbsp;Transaction&nbsp;Number</strong></a>
		 <?php endif; ?>		 </td>
	    <td align="center"><?php echo h($result['Transaction']['amount']); ?></td>		
		<td align="center" ><?php echo h($result['Transaction']['payment_through']); ?></td>
		
			<td align="center" id="withdrawal_status<?php echo h($result['Transaction']['id']); ?>"> 
		   <select name="withdrawal_status" id="withdrawal_status" onchange="updateWithdrawalStatus(this.value,<?php echo h($result['Transaction']['id']); ?>);" >
		      <option value="0" <?php if(h($result['Transaction']['withdrawal_status'])=='0') echo "selected"; ?>>Request For Withdrawal</option>
			  <option value="1" <?php if(h($result['Transaction']['withdrawal_status'])=='1') echo "selected"; ?>>Processing</option>
			  <option value="2" <?php if(h($result['Transaction']['withdrawal_status'])=='2') echo "selected"; ?>>Canceled</option>
			  <option value="3" <?php if(h($result['Transaction']['withdrawal_status'])=='3') echo "selected"; ?>>Completed</option>
	      </select></td>
		<td align="center"><?php echo h($result['Transaction']['remarks']); ?></td>
		<td align="center"><?php echo date('Y-m-d',strtotime($result['Transaction']['created'])); ?></td>	
	</tr>
	<?php endforeach; ?>
	<?php endif; ?>
    </thead>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
</div>
</div>