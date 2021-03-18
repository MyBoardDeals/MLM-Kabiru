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
		<a href="<?php echo $this->Html->url('/admin/users/deleted',true);?>" class="btn btn-label-danger"><i class="fa fa-user-times"></i> Deleted Users</a>					  
						 </div>
						</div>							
						</div>
						</div>
						
						
						
<div class="kt-container kt-container--fluid  kt-grid__item kt-grid__item--fluid">		
	<div class="row alert alert-light">
     <div class="col-12">
         Username: <?php echo $userrs['User']['first_name'].' '.$userrs['User']['last_name'];?>
     </div>	
</div>
		
		<div class="row">			
			<div class="col-xl-6">				
				<div class="kt-portlet">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">
								View E-wallet Statements
							</h3>
						</div>
					</div>
					<div class="kt-portlet__body">	
					
					<?php echo $this->Session->flash(); ?>							
								
						<div class="kt-section">							
							<div class="kt-section__content">
								<table class="table table-bordered" width="100%">
							<thead>
							<tr>
		    <th width="7%"><?php echo $this->Paginator->sort('id','No'); ?></th>	
			<th width="18%" ><?php echo $this->Paginator->sort('created','Date'); ?></th>		 
			<th width="10%"><a href="#">In</a></th>
			<th width="12%"><a href="#">Out</a></th>		
			
			<th width="22%" ><?php echo $this->Paginator->sort('bonus_from','To/ From Account'); ?></th>			
			<th width="31%"><?php echo $this->Paginator->sort('remarks'); ?></th>
							
	</tr>
	</thead>
	<tbody>
	
		<?php $subtotal=0; ?>
		<?php if(count($statements)>0): ?>
		<?php foreach($statements as $k=>$statement): ?>	
		<tr>
		<td><?php echo h($k+1); ?></td>  
		<td width="18%"><?php echo date('Y-m-d',strtotime($statement['Transaction']['created']));?></td>                
		<td width="10%" ><?php if($statement['Transaction']['received_type']==1){ echo $statement['Transaction']['amount']; } else { echo '-';}?></td>
		<td width="12%" ><?php if($statement['Transaction']['received_type']==0){ echo $statement['Transaction']['amount']; } else { echo '-';}?></td>				 
		
		<td><?php echo h($statement['Transaction']['bonus_from']); ?></td>	
		<td width="31%"><?php echo $statement['Transaction']['remarks'];  ?></td> 	
		
		</tr>
		<?php endforeach; ?>
		<?php endif; ?>
				  
</tbody>
	</table>			
																			
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

