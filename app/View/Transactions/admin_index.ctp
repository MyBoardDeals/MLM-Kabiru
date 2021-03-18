<style>.ui-datepicker-calendar th { background:none;}</style>
<?php echo $this->Html->css('jquery-ui'); ?>
<?php echo $this->Html->script('jquery-1.9.1'); ?>	
<script type="text/javascript" src="<?php echo Configure::read('assetsPath');?>global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script>
updateStatus=function($status,$id){ 
        $('#completed'+$id).html('Processing...'); 
		$url='<?php echo Configure::read('siteUrl');?>users/ajax_common';	  
		$.post($url,{act:'status_change',status:$status,id:$id},function(data){		      
		  $('#completed'+$id).html(data);			  
		});   
}
getserach=function(){
   $userid=$('#userid').val();
   $fdate=$('#fdate').val();
   $tdate=$('#tdate').val();
   if($fdate.length==10 && $tdate.length==10){
   window.location.href='<?php echo Configure::read('siteUrl');?>admin/transactions/index/'+$userid+'/'+$fdate+'/'+$tdate;
   } else {
   window.location.reload();
   }   
}

$(function() {
var pickerOpts = {dateFormat:"yy-mm-dd"};  
$( "#fdate" ).datepicker({
    dateFormat:"yy-mm-dd",
	changeYear:true,
	yearRange:"-60:+0"
	});

$( "#tdate" ).datepicker({
    dateFormat:"yy-mm-dd",
	changeYear:true,
	yearRange:"-60:+0"
	});	

});

</script>


	
<div class="page-content">	

	<div class="row margin-bottom-20">
			<div class="col-md-4 col-sm-4">
			<a href="<?php echo $this->Html->url('/admin/transactions/index',true);?>" class="btn btn-primary"><i class="glyphicon glyphicon-list-alt"></i> View All Transactions</a>

			</div>
			
		<div class="col-md-8 col-sm-8">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
  	
   <td width="27%">Username : 
      <input name="userid" id="userid" type="text" class="form-control"  style="width:100px;" /></td>
    <td width="28%">From Date: 
      <input name="fdate" type="text" class="form-control" id="fdate" value="<?php echo $fdate;?>" style="width:100px;" /></td>
    <td width="28%" >To Date: 
      <input name="tdate" type="text" class="form-control" id="tdate" value="<?php echo $tdate;?>" style="width:100px;" /></td>
    <td width="13%"><input name="search"  type="button" value="Search" onclick="getserach();" class="btn btn-success" /></td>
    <td width="4%"><a href="<?php echo $this->Html->url('/admin/transactions/csv/1/'.$fdate.'/'.$tdate,true);?>"><?php echo $this->Html->image('csv.png',array('alt'=>'','width'=>25));?></a></td>
  </tr>
</table>
</div>
		
		<?php //debug($results);?>		
	</div>			
		
			<div class="row">
				<div class="col-md-12">					
				
					<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="glyphicon glyphicon-list-alt"></i> View All Transactions
							</div>							
						</div>
						<div class="portlet-body flip-scroll">
							<table class="table table-bordered table-striped table-condensed flip-content" width="100%">
							<thead class="flip-content">
                 


	<tr>
           <th width="4%" height="20"><?php echo $this->Paginator->sort('id'); ?></th>
		   <th width="13%"><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th width="10%"><a>Username</a></th>			
			<th width="16%"><?php echo $this->Paginator->sort('type'); ?></th>
			<th width="12%"><?php echo $this->Paginator->sort('amount'); ?></th>				
			<th width="13%" ><?php echo $this->Paginator->sort('payment_through'); ?></th>
					
			<th width="18%" ><?php echo $this->Paginator->sort('remarks'); ?></th>
			<th width="8%" ><?php echo $this->Paginator->sort('created'); ?></th>	
            <th width="6%" ><a>Action</a></th>
      </tr>	
   <?php     
   if(count($results)>0): ?>		  	
	<?php foreach ($results as $k=>$result): ?>
	<tr>
	     <td><?php echo $k+1; ?></td>
	     <td><?php echo h($result['User']['first_name'].' '.$result['User']['last_name']); ?></td>
		 <td><?php echo h($result['User']['username']); ?></td>
	  
		<td><?php 
		                    if($result['Transaction']['type']==1){ echo 'Joining New Member'; } 
							if($result['Transaction']['type']==2){ echo 'Product Purchased'; }
							if($result['Transaction']['type']==3){ echo 'Commission'; }
							if($result['Transaction']['type']==4){ echo 'Transfer Fund'; }
							if($result['Transaction']['type']==5){ echo 'Withdrawal Fund'; }	
							if($result['Transaction']['type']==6){ echo 'Deposit Fund'; }							
							?></td> 
		<td><?php echo h($result['Transaction']['amount']); ?></td>		
		<td><?php echo h($result['Transaction']['payment_through']); ?></td>
				
		<td><?php echo h($result['Transaction']['remarks']); ?></td>
		<td><?php echo date('Y-m-d',strtotime($result['Transaction']['created'])); ?></td>
        <td align="center"  class="center">
			
		<a onclick="if (confirm('Are you sure you want to delete # <?php echo $result['Transaction']['id']; ?>?')) {return true } event.returnValue = false; return false;" href="<?php             echo $this->Html->url('/admin/transactions/delete/'.$result['Transaction']['id']); ?>"><i class="fa fa-trash-o"></i></a>	</td>	
	</tr>
	<?php endforeach; ?>
	<?php endif; ?>
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
			</div>
			
		</div>	
		
		
