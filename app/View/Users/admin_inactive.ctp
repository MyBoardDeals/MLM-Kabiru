<style type="text/css">
.formcontrol { padding:3px 4px; border:1px solid #CCCCCC; }
</style>
<?php echo $this->Html->script('jquery-1.9.1'); ?>	
<?php echo $this->Html->script('jquery-ui'); ?>	
<script>
changestatus=function($status,$id){
  
	$url='<?php echo Configure::read('siteUrl');?>users/ajaxcommon';	  
	$.post($url,{act:'updatestatus',status:$status,id:$id},function(data){		
		if($status==1) { $('#changestatus'+$id).html('Active'); }
		if($status==0) { $('#changestatus'+$id).html('Inactive'); }
		if($status==2) { $('#changestatus'+$id).html('Suspended'); }	
	});     
}



 getsearch=function(){
	$key=$('#key').val();
	$sby=$('#sby').val();   
	$fdate=$('#fdate').val();
	$tdate=$('#tdate').val();
	
	if($fdate.length!=10 || $tdate.length!=10){
	  $fdate=0;
	  $tdate=0;
	} 
   window.location.href='<?php echo Configure::read('siteUrl');?>admin/users/inactive/'+$fdate+'/'+$tdate+'/'+$sby+'/'+$key;   
   }
   
   
$(function() {
	$( "#fdate" ).datepicker({format: 'yyyy-mm-dd'});
	$( "#tdate" ).datepicker({format:"yyyy-mm-dd"});	
});
</script> 
 
 <div class="kt-subheader  kt-grid__item" id="kt_subheader">
							<div class="kt-container  kt-container--fluid ">
								<div class="kt-subheader__main">
									<h3 class="kt-subheader__title">Users</h3>	
								</div>	
								<div class="kt-subheader__toolbar">
						 <div class="kt-subheader__wrapper">
		<a href="<?php echo $this->Html->url('/admin/users/add',true);?>" class="btn btn-label-primary"><i class="fa fa-plus-square"></i> Create User</a>
		<a href="<?php echo $this->Html->url('/admin/users/index',true);?>" class="btn btn-label-success"><i class="fa fa-users"></i> Active Users</a>
		<a href="<?php echo $this->Html->url('/admin/users/inactive',true);?>" class="btn btn-label-info"><i class="fa fa-user-times"></i> Inactive Users</a>
		<a href="<?php echo $this->Html->url('/admin/users/suspended',true);?>" class="btn btn-label-danger"><i class="fa fa-user-times"></i> Suspended Users</a>					  
						 </div>
						</div>							
						</div>
						</div>							
	<div class="kt-container kt-container--fluid  kt-grid__item kt-grid__item--fluid">	
	
	<div class="row alert alert-light">
     <div class="col-2">
          <input type="text" class="form-control" id="fdate" readonly placeholder="Select From Date"/>
     </div>
	 <div class="col-2">
          <input type="text" class="form-control" id="tdate" readonly placeholder="Select To Date"/>
    </div>
	<div class="col-2">
	       <select name="sby" id="sby" class="form-control">
		    <option value="0">Select</option>
			<option value="1">Username</option>
			<option value="2">Sponsor</option>		
			<option value="3">First Name</option>
			<option value="4">Last Name</option>							
			</select>	
    </div>	
	 <div class="col-2">
          <input name="key" class="form-control" placeholder="Keyword" type="text" id="key" value="" />	
    </div>
	 <div class="col-2">
          <input type="button" class="btn btn-danger" value="Search" onclick="getsearch();" />
    </div>
</div>
		
		<div class="row">			
			<div class="col-xl-6">				
				<div class="kt-portlet">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">
								View/ Edit Inactive Users
							</h3>
						</div>
					</div>
					<div class="kt-portlet__body">	
					
					<?php echo $this->Session->flash(); ?>							
								
						<div class="kt-section">							
							<div class="kt-section__content">
								<div class="table-responsive">
								<table class="table table-bordered" width="100%">
							<thead>
							<tr>
			<th width="4%"><?php echo $this->Paginator->sort('id'); ?></th>
			<th width="10%" ><?php echo $this->Paginator->sort('created','Date Join'); ?></th>				
			<th width="11%"><?php echo $this->Paginator->sort('username'); ?></th>				
			<th width="11%"><?php echo $this->Paginator->sort('first_name'); ?></th>					
			<th width="11%" ><?php echo $this->Paginator->sort('last_name'); ?></th>				
			<th width="11%"><?php echo $this->Paginator->sort('susername','Sponsor'); ?></th>			
			<th width="12%"><?php echo $this->Paginator->sort('mobile_no'); ?></th>
			<th width="14%" class="actions">Position <br/>Referral ID</th>
			<th width="8%"><?php echo $this->Paginator->sort('status'); ?></th>	
			<th width="8%" align="center" class="actions"><?php echo __('Actions'); ?></th>
							</tr>
							</thead>
							<tbody>
	<?php foreach($users as $k=>$user): ?>
	<?php $rspositions=$user['Position'];  ?>
	<tr>
		<td><?php echo h($k+1); ?></td>
		<td><?php echo h($user['User']['created']); ?></td>
	     <td><?php echo h($user['User']['username']); ?></td>		
		<td><?php echo h($user['User']['first_name']); ?></td>
		<td><?php echo h($user['User']['last_name']); ?></td>			
		<td><?php echo h($user['User']['susername']); ?></td>					
		<td><?php echo h($user['User']['mobile_no']); ?></td>				
		<td>
		<?php 
		if(count($rspositions)>0){
		   foreach($rspositions as $k=>$rsposition){ 
		 ?>  
	<a href="<?php echo $this->Html->url('/admin/users/add/'.$rsposition['referralcode'],true);?>"><strong><?php  echo h($rsposition['referralcode']);?></strong></a><br/>	     
		<?php   
		 }		
		} 
		?>		
		
		</td>				
		<td id="changestatus<?php echo h($user['User']['id']); ?>">
		<select name="status" class="formcontrol" onchange="changestatus(this.value,<?php echo h($user['User']['id']); ?>);">
		  <option value="1" <?php if($user['User']['status']==1) echo "selected";?>>Active</option>
		  <option value="0" <?php if($user['User']['status']==0) echo "selected";?>>Inactive</option>
		  <option value="2" <?php if($user['User']['status']==2) echo "selected";?>>Suspended</option>				 
		</select>		</td>		
		<td align="center">	
<a href="<?php echo $this->Html->url('/admin/transactions/money_adjustment/'.$user['User']['id'],true);?>" title="Money Adjustment"><span class="fa fa-money-check"></span></a>		
<a href="<?php echo $this->Html->url('/admin/transactions/statement/'.$user['User']['id'],true);?>"><span class="fa fa-th"></span></a>
<a href="<?php echo $this->Html->url('/admin/users/view/'.$user['User']['id']); ?>"><i class="fa fa-th-large"></i></a>			   																																														<a href="<?php echo $this->Html->url('/admin/users/edit/'.$user['User']['id']); ?>"><i class="fa fa-edit"></i></a>		   																																																		<a onclick="if (confirm('Are you sure you want to suspended # <?php echo $user['User']['id'];?>?')) {return true } event.returnValue = false; return false;" 																																																					   href="<?php echo $this->Html->url('/admin/users/delete/'.$user['User']['id']); ?>"><i class="fa fa-trash"></i></a>																																																								</td>
	</tr>
<?php endforeach; ?>
							</tbody>
							</table>												
								</div>
							</div>
						</div>
					</div>					
				</div>			
			</div>
		</div>
		
		<div class="row">
								<div class="col-xl-12">								
									<div class="kt-portlet">
										<div class="kt-portlet__body">
										
	<?php echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'))); ?>	
											<div class="kt-pagination kt-pagination--brand">
											
												<ul class="kt-pagination__links">
													 <?php 
                    echo $this->Paginator->prev( '<', array( 'class' => '', 'tag' => 'li' ), null, array( 'class' => 'kt-pagination__link--first', 'tag' => 'li' ) );
                    echo $this->Paginator->numbers( array( 'tag' => 'li', 'separator' => '', 'currentClass' => 'kt-pagination__link--active' ) );
                    echo $this->Paginator->next( '>', array( 'class' => '', 'tag' => 'li' ), null, array( 'class' => 'kt-pagination__link--last', 'tag' => 'li' ) );
                ?>
												</ul>												
											</div>

											
										</div>
									</div>

									
								</div>
							</div>
	</div>