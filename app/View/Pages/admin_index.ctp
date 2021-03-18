<style>
.kt-callout .kt-callout__body .kt-callout__content .kt-callout__title {
    font-size: 1.40rem !important;
    font-weight: 300 !important;
}   
</style>
<div class="kt-subheader  kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">            
            <h3 class="kt-subheader__title">Dashboard<small>reports & statistics</small></h3>              
        </div>
        
    </div>
</div>

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
				
			
			
			
		
			<div class="row">
			
	<div class="col-lg-4">
		<div class="kt-portlet kt-callout gradient-light-green-amber">
			<div class="kt-portlet__body">
				<div class="kt-callout__body">
					<div class="kt-callout__content">
						<h3 class="kt-callout__title">Total<br/> Members</h3>
						<p class="kt-callout__desc">							
						</p>
					</div>
					<div class="kt-callout__action">
		<a href="<?php echo $this->Html->url('/admin/users/index',true);?>" class="btn btn-primary btn-bold btn-upper btn-font-sm btn-brand"> <?php echo $total_customers;?></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	
<?php /*?>	<div class="col-lg-4">
		<div class="kt-portlet kt-callout gradient-light-green-amber">
			<div class="kt-portlet__body">
				<div class="kt-callout__body">
					<div class="kt-callout__content">
						<h3 class="kt-callout__title">Free<br/> Members</h3>
						<p class="kt-callout__desc">							
						</p>
					</div>
					<div class="kt-callout__action">
		<a href="<?php echo $this->Html->url('/admin/users/index',true);?>" class="btn btn-primary"> <?php echo $total_free_customers;?></a>
					</div>
				</div>
			</div>
		</div>
	</div><?php */?>			
	 <?php /*?><div class="col-lg-4">
		<div class="kt-portlet kt-callout gradient-light-green-amber">
			<div class="kt-portlet__body">
				<div class="kt-callout__body">
					<div class="kt-callout__content">
						<h3 class="kt-callout__title">Paid<br/> Members</h3>
						<p class="kt-callout__desc">							
						</p>
					</div>
					<div class="kt-callout__action">
		<a href="<?php echo $this->Html->url('/admin/users/index',true);?>" class="btn btn-primary"> <?php echo $total_paid_customers;?></a>
					</div>
				</div>
			</div>
		</div>
	</div>			<?php */?>
				
				
		<div class="col-lg-4">
		<div class="kt-portlet kt-callout gradient-light-green-amber">
			<div class="kt-portlet__body">
				<div class="kt-callout__body">
					<div class="kt-callout__content">
						<h3 class="kt-callout__title"> Subscription <br/> Fees</h3>
						<p class="kt-callout__desc">							
						</p>
					</div>
					<div class="kt-callout__action">
		<a href="<?php echo $this->Html->url('/admin/invoices/index',true);?>" class="btn btn-primary"> <?php echo $total_sale_amount;?></a>
					</div>
				</div>
			</div>
		</div>
	</div>		
	
	<div class="col-lg-4">
		<div class="kt-portlet kt-callout gradient-light-green-amber">
			<div class="kt-portlet__body">
				<div class="kt-callout__body">
					<div class="kt-callout__content">
						<h3 class="kt-callout__title"> Capital <br/> Refund</h3>
						<p class="kt-callout__desc">							
						</p>
					</div>
					<div class="kt-callout__action">
		<a href="javascript:;" class="btn btn-primary"> <?php echo $capitalrefund;?></a>
					</div>
				</div>
			</div>
		</div>
	</div>	
	
	<div class="col-lg-4">
		<div class="kt-portlet kt-callout gradient-light-green-amber">
			<div class="kt-portlet__body">
				<div class="kt-callout__body">
					<div class="kt-callout__content">
						<h3 class="kt-callout__title"> Extra  <br/> Commission</h3>
						<p class="kt-callout__desc">							
						</p>
					</div>
					<div class="kt-callout__action">
		<a href="javascript:;" class="btn btn-primary"> <?php echo $extracommission;?></a>
					</div>
				</div>
			</div>
		</div>
	</div>	
	
	<div class="col-lg-4">
		<div class="kt-portlet kt-callout gradient-light-green-amber">
			<div class="kt-portlet__body">
				<div class="kt-callout__body">
					<div class="kt-callout__content">
						<h3 class="kt-callout__title"> Upline <br/> Commission</h3>
						<p class="kt-callout__desc">							
						</p>
					</div>
					<div class="kt-callout__action">
		<a href="javascript:;" class="btn btn-primary"> <?php echo $uplinecommission;?></a>
					</div>
				</div>
			</div>
		</div>
	</div>	
	
	
	
	<div class="col-lg-4">
		<div class="kt-portlet kt-callout gradient-light-green-amber">
			<div class="kt-portlet__body">
				<div class="kt-callout__body">
					<div class="kt-callout__content">
						<h3 class="kt-callout__title"> Total <br/> BW</h3>
						<p class="kt-callout__desc">							
						</p>
					</div>
					<div class="kt-callout__action">
		<a href="javascript:;" class="btn btn-primary"> <?php echo $total_bw;?></a>
					</div>
				</div>
			</div>
		</div>
	</div>
				
				
   </div>
			
		
			
				<div class="row">
								
					<div class="col-xl-4 col-lg-6 order-lg-3 order-xl-1">									
									<div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
										<div class="kt-portlet__head">
											<div class="kt-portlet__head-label">
												<h3 class="kt-portlet__head-title">
													New Users
												</h3>
											</div>											
										</div>
										<div class="kt-portlet__body">
											
												<div class="tab-pane active" id="kt_widget4_tab1_content">
													<div class="kt-widget4">
													
													 <?php if(count($users)>0): ?>
                                                      <?php foreach($users as $user): ?>
														<div class="kt-widget4__item">
															<div class="kt-widget4__pic kt-widget4__pic--pic">
								 <img src="<?php echo Configure::read('App.FilePath');?>user/thumb/<?php echo $user['User']['member_photo']; ?>" />																
															</div>
															<div class="kt-widget4__info">
																<a class="kt-widget4__username">
																	<?php echo h($user['User']['first_name']); ?> <?php echo h($user['User']['last_name']); ?>
																</a>
																<p class="kt-widget4__text">
																	<?php echo h($user['User']['email']); ?>
																</p>
															</div>
															<a  class="btn btn-sm"><?php echo date('d M, Y',strtotime($user['User']['created'])); ?></a>
														</div>
														<?php endforeach; ?>
                                                       <?php endif; ?>	
													</div>
												</div>
										</div>
									</div>									
								</div>
								
					<div class="col-xl-4 col-lg-6 order-lg-3 order-xl-1">									
									<div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
										<div class="kt-portlet__head">
											<div class="kt-portlet__head-label">
												<h3 class="kt-portlet__head-title">
													Latest Subscription Orders 
												</h3>
											</div>											
										</div>
										<div class="kt-portlet__body">
											
												<div class="tab-pane active" id="kt_widget4_tab1_content">
													<div class="kt-widget4">
													
													<?php if(count($invoices)>0): ?>
                                                    <?php foreach($invoices as $invoice): ?>
														<div class="kt-widget4__item">
															<div class="kt-widget4__pic kt-widget4__pic--pic">
								 <img src="<?php echo Configure::read('App.FilePath');?>user/thumb/<?php echo $invoice['User']['member_photo']; ?>" />																
															</div>
															<div class="kt-widget4__info">
																<a class="kt-widget4__username">
																	<?php echo h($invoice['User']['first_name']); ?>  <?php echo h($invoice['User']['last_name']); ?>
																</a>
																<p class="kt-widget4__text">
																	Payment Status: <?php echo ($invoice['Invoice']['payment_status']==0) ? 'Pending':'Completed'; ?>
																	
																</p>
															
															</div>
															<a  class="btn btn-sm"><?php echo h($invoice['Invoice']['amount']); ?></a>
															<?php echo date('d M, Y',strtotime($user['User']['created'])); ?>
														</div>
														<?php endforeach; ?>
                                                       <?php endif; ?>	
													</div>
												</div>
										</div>
									</div>									
								</div>
			
			 					
			   </div>
			
			
						
			
						
		</div>
