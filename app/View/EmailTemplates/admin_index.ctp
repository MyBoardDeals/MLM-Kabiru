<div class="kt-subheader  kt-grid__item" id="kt_subheader">
							<div class="kt-container  kt-container--fluid ">
								<div class="kt-subheader__main">
									<h3 class="kt-subheader__title">Email Templates</h3>	
								</div>	
								<div class="kt-subheader__toolbar">
						 <div class="kt-subheader__wrapper">				
                <a href="<?php echo $this->Html->url('/admin/email_templates/index',true);?>" class="btn btn-label-danger"><i class="fa fa-envelope"></i> View Email Templates</a>	
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
								View/ Edit Email Templates
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

           <th width="4%"><a href="#">No</a></th>	
			
			<th width="57%"><?php echo $this->Paginator->sort('email_subject'); ?></th>
			<th width="24%"><?php echo $this->Paginator->sort('email_address'); ?></th>
				
			<th width="8%"><?php echo $this->Paginator->sort('status'); ?></th>					
			<th width="7%" class="actions" ><?php echo __('Actions'); ?></th>
      </tr>
	  </thead>
	<tbody>	
	  <?php if(count($results)>0): ?>	
	<?php foreach($results as $k=>$result): ?>
	<tr>
	    <th><?php echo h($k+1); ?></th>	
		<td><?php echo h($result['EmailTemplate']['email_subject']); ?></td>		
		<td><?php echo h($result['EmailTemplate']['email_address']); ?></td>		
		<td><?php echo ($result['EmailTemplate']['status']==1) ? 'Active':'Inactive'; ?></td>			
		<td align="center">
		<a href="<?php echo $this->Html->url('/admin/email_templates/view/'.$result['EmailTemplate']['id']); ?>"><i class="fa fa-th-large"></i></a>
		<a href="<?php echo $this->Html->url('/admin/email_templates/edit/'.$result['EmailTemplate']['id']); ?>"><i class="fa fa-edit"></i></a>
	  </td>
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