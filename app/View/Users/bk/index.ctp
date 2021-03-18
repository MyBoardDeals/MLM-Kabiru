		<div class="kt-subheader   kt-grid__item" id="kt_subheader">
								<div class="kt-container ">
									<div class="kt-subheader__main">
										<h3 class="kt-subheader__title">Referrals</h3>										
									</div>									
								</div>								
							</div>
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
		
		<div class="row">
			
			<div class="col-xl-6">

				
				<div class="kt-portlet">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">
								My Referrals
							</h3>
						</div>
					</div>
					<div class="kt-portlet__body">					
						<div class="kt-section">
							<div class="kt-section__info"></div>	
							<div class="kt-section__content">
								<div class="table-responsive">
								
								
								
								<table width="100%" class="table table-bordered">
							<thead>
							<tr>
								<th width="5%" ><a>No</a></th>
			
			
			<th width="11%"><?php echo $this->Paginator->sort('username'); ?></th>
			<th width="11%"><?php echo $this->Paginator->sort('first_name'); ?></th>	
			<th width="12%"><?php echo $this->Paginator->sort('last_name'); ?></th>	
			<th width="11%"><?php echo $this->Paginator->sort('username','Sponsor'); ?></th>	
			<th width="19%" ><?php echo $this->Paginator->sort('email'); ?></th>	
			<th width="11%"><?php echo $this->Paginator->sort('mobile_no'); ?></th>				
			
			<th width="10%" ><?php echo $this->Paginator->sort('plan_id'); ?></th>
			<th width="10%" ><?php echo $this->Paginator->sort('created','Date Joined'); ?></th>
							</tr>
							</thead>
							<tbody>
							<?php if(count($users)>0): ?>
							<?php foreach($users as $k=>$user): ?>
	<tr>
		<th scope="row"><?php echo h($k+1);?></th>
		
		
		<td><?php echo h($user['User']['username']); ?></td>
		<td><?php echo h($user['User']['first_name']); ?></td>
		<td><?php echo h($user['User']['last_name']); ?></td>
		<td><?php echo h($user['User']['susername']); ?></td>
		<td><?php echo h($user['User']['email']); ?></td>	
		<td><?php echo h($user['User']['mobile_no']); ?></td>		
		<td><?php echo h($user['Plan']['package_name']); ?></td>
		<td><?php echo date('d M,Y',strtotime($user['User']['created'])); ?></td>
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

