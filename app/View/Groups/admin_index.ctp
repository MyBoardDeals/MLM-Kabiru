<div class="kt-subheader  kt-grid__item" id="kt_subheader">
							<div class="kt-container  kt-container--fluid ">
								<div class="kt-subheader__main">
									<h3 class="kt-subheader__title">
										Groups </h3>									
								</div>	
								<div class="kt-subheader__toolbar">
						 <div class="kt-subheader__wrapper">
		
		<?php /*?><a href="<?php echo $this->Html->url('/admin/groups/add',true);?>" class="btn btn-primary"><i class="fa fa-plus"></i> Create Group</a><?php */?>
			<a href="<?php echo $this->Html->url('/admin/groups/index',true);?>" class="btn btn-danger"><i class="fa fa-group"></i> View Groups</a>
					  
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
								View/ Edit Groups
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
			<th width="6%"><?php echo $this->Paginator->sort('id'); ?></th>
			<th width="83%"><?php echo $this->Paginator->sort('name'); ?></th>		
			
			
			<th width="11%" ><a><?php echo __('Actions'); ?></a></th>
	</tr>
	</thead>
	<tbody>
	<?php if(count($results)>0): ?>
	<?php foreach($results as $plan): ?>
	<tr>
		<th scope="row"><?php echo $plan['Group']['id']; ?></th> 
		<td><?php echo $plan['Group']['name']; ?></td>		
		
		<td align="center" class="center">	
		<a href="<?php echo $this->Html->url('/admin/groups/edit/'.$plan['Group']['id']); ?>"><i class="fa fa-edit"></i></a></td>
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