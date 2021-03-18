<div class="kt-subheader  kt-grid__item" id="kt_subheader">
							<div class="kt-container  kt-container--fluid ">
								<div class="kt-subheader__main">
									<h3 class="kt-subheader__title">
										Countries </h3>									
								</div>	
								<div class="kt-subheader__toolbar">
						 <div class="kt-subheader__wrapper">		
						  <a href="<?php echo $this->Html->url('/admin/countries/add',true);?>" class="btn btn-label-info"><i class="fa fa-plus-square"></i> Add Country</a>
						  <a href="<?php echo $this->Html->url('/admin/countries/index',true);?>" class="btn btn-label-danger"><i class="fa fa-question-circle"></i> View Countries</a>
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
								View/ Edit Countries
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

           <th width="5%"><?php echo $this->Paginator->sort('id'); ?></th>
			
			<th width="88%"><?php echo $this->Paginator->sort('name'); ?></th>
		
	
			
			<th width="7%" class="actions" ><?php echo __('Actions'); ?></th>
      </tr>	
	  </thead>
	<tbody>
	<?php if(count($countries)>0): ?>	
	<?php foreach ($countries as $k=>$country): ?>
	<tr>
	<td><?php echo $k+1; ?></td>
	
		<td><?php echo h($country['Country']['name']); ?></td>
	
	
		
		<td>						 
			<a href="<?php echo $this->Html->url('/admin/countries/edit/'.$country['Country']['id']); ?>"><i class="fa fa-edit"></i></a>&nbsp;
			<a onclick="if (confirm('Are you sure you want to delete # <?php echo $country['Country']['id'];?>?')) {return true } event.returnValue = false; return false;" 																																																					        href="<?php echo $this->Html->url('/admin/countries/delete/'.$country['Country']['id']); ?>"><i class="fa fa-trash"></i></a>			</td>
	</tr>
	<?php endforeach; ?>
	<?php endif; ?>
	</tbody>
	</table>				</div>
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