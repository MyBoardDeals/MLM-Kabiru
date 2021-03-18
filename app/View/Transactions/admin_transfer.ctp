<?php echo $this->Html->css('jquery-ui'); ?>
<?php echo $this->Html->script('jquery-1.9.1'); ?>	


<script src="<?php echo Configure::read('assetsPath');?>global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo Configure::read('assetsPath');?>global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

<script>
updateStatus=function($status,$id){ 
        $('#completed'+$id).html('Processing...'); 
		$url='<?php echo Configure::read('siteUrl');?>users/ajax_common';	  
		$.post($url,{act:'status_change',status:$status,id:$id},function(data){		      
		  $('#completed'+$id).html(data);			  
		});   
}
getserach=function(){
   $fdate=$('#fdate').val();
   $tdate=$('#tdate').val();
   if($fdate.length==10 && $tdate.length==10){
   window.location.href='<?php echo Configure::read('siteUrl');?>admin/transactions/transfer/'+$fdate+'/'+$tdate;
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
<h3 class="page-title">Fund Transfer</h3>
	<div class="row margin-bottom-20">
			<div class="col-md-12 col-sm-12">
            <div style="float:right; font-size:12px; width:700px; padding-top:2px;">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
  <td width="33%">&nbsp;</td>
    <td width="26%">From Date: 
      <input name="fdate" type="text" class="form-control" id="fdate" value="<?php echo $fdate;?>" style="width:100px;" /></td>
    <td width="24%" >To Date: 
      <input name="tdate" type="text" class="form-control" id="tdate" value="<?php echo $tdate;?>" style="width:100px;" /></td>
    <td width="13%"><input name="search" type="button" value="Search" class="btn btn-success" onclick="getserach();" /></td>
    <td width="4%"><?php /*?><a href="<?php echo $this->Html->url('/transactions/csv/4/'.$fdate.'/'.$tdate,true);?>"><?php echo $this->Html->image('csv.png',array('alt'=>'','width'=>25));?></a><?php */?></td>
  </tr>
</table>
</div>
			</div>
			
				
	</div>			
		
			<div class="row">
				<div class="col-md-12">					
				
					<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-usd"></i> View Transfer Funds
							</div>							
						</div>
						<div class="portlet-body flip-scroll">
							<table class="table table-bordered table-striped table-condensed flip-content" width="100%">
							<thead class="flip-content">
							<tr>




           <th width="5%" height="20"><?php echo $this->Paginator->sort('id'); ?></th>
		   			
			<th width="9%"><?php echo $this->Paginator->sort('in'); ?></th>
			<th width="9%"><?php echo $this->Paginator->sort('out'); ?></th>				
			<th width="15%" ><?php echo $this->Paginator->sort('payment_through'); ?></th>
			<th width="31%" ><?php echo $this->Paginator->sort('remarks'); ?></th>
			<th width="14%"><?php echo $this->Paginator->sort('bonus_from','From/ To Account'); ?></th>
			<th width="17%" ><?php echo $this->Paginator->sort('created'); ?></th>	
      </tr>	
   <?php     
   if(count($results)>0): ?>		  	
	<?php foreach ($results as $k=>$result): ?>
	<tr>
	     <td align="center"><?php echo $k+1; ?></td>
	    	
		<td align="center"><?php 
		                    if($result['Transaction']['received_type']==1){ echo h($result['Transaction']['amount']); }	else { echo '-';}			
							
							?></td> 
		<td align="center"><?php 
		                    if($result['Transaction']['received_type']==0){ echo h($result['Transaction']['amount']); }	else { echo '-';}				
							
							?></td>		
		<td align="center" ><?php echo h($result['Transaction']['payment_through']); ?></td>			
		<td align="center"><?php echo h($result['Transaction']['remarks']); ?></td>
		<td align="center"><?php echo h($result['Transaction']['bonus_from']); ?></td>	
		<td align="center"><?php echo h($result['Transaction']['created']); ?></td>	
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