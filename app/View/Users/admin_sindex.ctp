<style type="text/css">
.formcontrol { padding:3px 4px; border:1px solid #CCCCCC; }
</style>
<script>
changestatus=function($status,$id){  
	$url='<?php echo Configure::read('siteUrl');?>users/ajax_common';	  
	$.post($url,{act:'updatestatus',status:$status,id:$id},function(data){	
	
		if($status==1) { $('#changestatus'+$id).html('Active'); }
		if($status==0) { $('#changestatus'+$id).html('Inactive'); }	
	});
	
   }  
 </script>
 
 
 <div class="kt-subheader  kt-grid__item" id="kt_subheader">
							<div class="kt-container  kt-container--fluid ">
								<div class="kt-subheader__main">
									<h3 class="kt-subheader__title">Users</h3>	
								</div>	
								<div class="kt-subheader__toolbar">
						 <div class="kt-subheader__wrapper">
				<a href="<?php echo $this->Html->url('/admin/users/sadd',true);?>" class="btn btn-label-primary"><i class="fa fa-plus-square"></i> Add Staff</a>
                <a href="<?php echo $this->Html->url('/admin/users/sindex',true);?>" class="btn btn-label-danger"><i class="fa fa-users"></i> View Staffs</a>	
						 </div>
						</div>							
						</div>
						</div>	
												
	<div class="kt-container kt-container--fluid  kt-grid__item kt-grid__item--fluid">			
		<div class="row">			
			<div class="col-xl-6">				
				<div class="kt-portlet">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">
								View/ Edit View Staffs
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
			<th width="6%" ><?php echo $this->Paginator->sort('No'); ?></th>
			<th width="11%"><?php echo $this->Paginator->sort('username'); ?></th>	
			<th width="13%"><?php echo $this->Paginator->sort('first_name'); ?></th>
			<th width="13%"><?php echo $this->Paginator->sort('last_name'); ?></th>	
			<th width="19%" ><?php echo $this->Paginator->sort('email'); ?></th>	
			<th width="19%"><?php echo $this->Paginator->sort('mobile_no'); ?></th>	
			<th width="11%"><?php echo $this->Paginator->sort('status'); ?></th>								
			<th width="8%" align="center" class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($users as $k=>$user): ?>
	<tr>
		<th><?php echo h($k+1); ?></th>	
		<td><?php echo h($user['User']['username']); ?></td>
		<td><?php echo h($user['User']['first_name']); ?></td>
		<td><?php echo h($user['User']['last_name']); ?></td>
		<td><?php echo h($user['User']['email']); ?></td>	
		<td><?php echo h($user['User']['mobile_no']); ?></td>

	
		<td id="changestatus<?php echo h($user['User']['id']); ?>">
			<select name="status" class="formcontrol" onchange="changestatus(this.value,<?php echo h($user['User']['id']); ?>);">
			  <option value="1" <?php if($user['User']['status']==1) echo "selected";?>>Active</option>
			  <option value="0" <?php if($user['User']['status']==0) echo "selected";?>>Inactive</option>	
			 			</select>
			</td>	
		
		
		<td >																																									  																																													    <a title="Edit" href="<?php echo $this->Html->url('/admin/users/sedit/'.$user['User']['id']); ?>"><i class="fa fa-edit"></i></a>&nbsp;	
<a title="Delete" onclick="if (confirm('Are you sure you want to delete # <?php echo $user['User']['id'];?>?')) {return true } event.returnValue = false; return false;" 																																																					    href="<?php echo $this->Html->url('/admin/users/sdelete/'.$user['User']['id']); ?>"><i class="fa fa-trash"></i></a>
																																																								 </td>
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