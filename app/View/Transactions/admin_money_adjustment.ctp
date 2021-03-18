
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
						
	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
  <div class="row">
  <div class="col-md-12">
   <div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
						Monetary Adjustments
					</h3>
				</div>
			</div>			   
			 <?php echo $this->Form->create('User',array('class'=>'kt-form kt-form--label-right','enctype'=>'multipart/form-data')); ?>
								
				
				<div class="kt-portlet__body">					
					<?php echo $this->Session->flash(); ?>																	
											
										
												<div class="form-group row">
													<label class="col-3 col-form-label">Username</label>
													<div class="col-md-4" style="padding-top:10px;">
                                                        <?php echo h($result['User']['username']); ?>														
													</div>
												</div>
												
												<div class="form-group row">
													<label class="col-3 col-form-label">eWallet Balance</label>
													<div class="col-md-4" style="padding-top:10px;">
                                                       <?php echo $result['User']['ewallet'].$currency; ?>																										
													</div>
												</div>												
												
                                                <div class="form-group row">
													<label class="col-3 col-form-label">BW Balance</label>
													<div class="col-md-4" style="padding-top:10px;">
                                                     <?php echo $result['User']['bwewallet'].$currency; ?>																										
													</div>
												</div>
																					 	
												
                                                <div class="form-group row">
													<label class="col-3 col-form-label"><h3>Adjustment Amount</h3></label>
													
												</div>
												<div class="form-group row">
													<label class="col-3 col-form-label">Adjust Money To/ From</label>
													<div class="col-md-4">
                                                     <select name="data[Transaction][adjustment_tofrom]" class="form-control input-small">
													    <option value="1">E-Wallet</option>			
            											<option value="2">BW-Wallet</option>																									
         										     </select>	
														</div>
													</div>
                                                    <div class="form-group row">
													<label class="col-3 col-form-label">Adjustment Amount Type</label>
													<div class="col-md-4">
                                                   <select class="form-control input-small" name="data[Transaction][adjustment_type]">
                                                      <option value="1">+</option>
                                                      <option value="0">-</option>
                                                    </select>	
														</div>
													</div>
                                                    <div class="form-group row">
													<label class="col-3 col-form-label">Adjustment Amount</label>
													<div class="col-md-4">
                  <input type="text" name="data[Transaction][amount]" class="form-control" x-moz-errormessage="Please enter amount greater than 0." required="required" value="" />
														</div>
													</div>
                                                    <div class="form-group row">
													<label class="col-3 col-form-label">Remarks</label>
													<div class="col-md-4">
                                                   <textarea name="data[Transaction][remarks]" class="form-control" required="required"></textarea>
														</div>
													</div>
													
													
																					
								
								
																				
					
				</div>
				<div class="kt-portlet__foot">
					<div class="kt-form__actions">
						<div class="row">
							<div class="col-3">
							</div>
							<div class="col-9">
								<button type="submit" class="btn btn-success">Submit</button>								
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
</div>
</div>
</div>					
