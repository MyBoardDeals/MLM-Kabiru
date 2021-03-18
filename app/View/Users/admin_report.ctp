<style>.ui-datepicker-calendar th { background:none;}</style>
<?php echo $this->Html->css('jquery-ui'); ?>
<?php echo $this->Html->script('jquery-1.9.1'); ?>	


<script src="<?php echo Configure::read('assetsPath');?>global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo Configure::read('assetsPath');?>global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

<script>
changestatus=function($status,$uid){
  
	$url='<?php echo Configure::read('siteUrl');?>users/ajaxcommon';	  
	$.post($url,{act:'updatestatus',status:$status,uid:$uid},function(data){	
	
		if($status==1) { $('#changestatus'+$uid).html('Active'); }
		if($status==0) { $('#changestatus'+$uid).html('Inactive'); }
		if($status==2) { $('#changestatus'+$uid).html('Suspended'); }
	
	});
     
}
getserach=function(){
   $fdate=$('#fdate').val();
   $tdate=$('#tdate').val();
   if($fdate.length==10 && $tdate.length==10){
   window.location.href='<?php echo Configure::read('siteUrl');?>admin/users/report/'+$fdate+'/'+$tdate;
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
			<div class="col-md-6 col-sm-6">
			<a href="<?php echo $this->Html->url('/admin/users/report',true);?>" class="btn btn-success"><i class="glyphicon glyphicon-list-alt"></i> View User Reports</a>
			</div>
			<div class="col-md-6 col-sm-6">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
  	<td width="16%">&nbsp;</td>
    <td width="34%">From Date: 
      <input name="fdate" type="text" class="form-control" id="fdate" style="width:100px;"   /></td>
    <td width="32%" >To Date: 
      <input name="tdate" type="text" class="form-control" style="width:100px;"  id="tdate"  /></td>
    <td width="15%"><input name="search"  type="button" value="Search" class="btn btn-success" onclick="getserach();" /></td>
    <td width="3%"><a href="<?php echo $this->Html->url('/admin/users/user_csv/'.$fdate.'/'.$tdate,true);?>"><?php echo $this->Html->image('csv.png',array('alt'=>'','width'=>25));?></a></td>
  </tr>
</table>
</div>
				
	</div>			
		
			<div class="row">
				<div class="col-md-12">					
				
					<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="glyphicon glyphicon-list-alt"></i>View User Reports
							</div>							
						</div>
						<div class="portlet-body flip-scroll">
							<table class="table table-bordered table-striped table-condensed flip-content" width="100%">
							<thead class="flip-content">
							<tr>
								<th width="6%" ><?php echo $this->Paginator->sort('id'); ?></th>
			<th width="13%"><?php echo $this->Paginator->sort('member_code'); ?></th>			
			<th width="13%"><?php echo $this->Paginator->sort('first_name'); ?></th>	
			<th width="12%"><?php echo $this->Paginator->sort('last_name'); ?></th>		
			<th width="23%" ><?php echo $this->Paginator->sort('email'); ?></th>	
			<th width="14%"><?php echo $this->Paginator->sort('mobile_no'); ?></th>		
			<th width="9%"><?php echo $this->Paginator->sort('ewallet'); ?></th>				
			<th width="10%" ><?php echo $this->Paginator->sort('created'); ?></th>	
			
							</tr>
							</thead>
							<tbody>
							<?php foreach ($users as $k=>$user): ?>
	<tr>
		<td><?php echo $k+1; ?></td>
		<td><?php echo h($user['User']['member_code']); ?></td>		
		<td><?php echo h($user['User']['first_name']); ?></td>
		<td><?php echo h($user['User']['last_name']); ?></td>
		<td><?php echo h($user['User']['email']); ?></td>	
		<td><?php echo h($user['User']['mobile_no']); ?></td>	
		<td><?php echo h($user['User']['ewallet']); ?></td>
		<td><?php echo h($user['User']['created']); ?></td>
			
		
	</tr>
<?php endforeach; ?>
							
							</tbody>
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


