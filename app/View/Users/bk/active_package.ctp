<script>
function showctodiv(id){

      $url='<?php echo Configure::read('siteUrl');?>users/ajaxcommon';	  
      $.post($url,{act:'find_cto_binus',id:id},function(data){
	   
	    if(data==1){	
		   
	       $('#ctodiv').show();
		   $('#cto_bonus_settings').attr("required","required");
		   
	    } else {
		  
		  $('#ctodiv').hide();
		  $('#cto_bonus_settings').removeAttr("required");
		  
		}	  
	  });
}
</script>
<div class="kt-subheader  kt-grid__item" id="kt_subheader">
							<div class="kt-container  kt-container--fluid ">
								<div class="kt-subheader__main">
									<h3 class="kt-subheader__title">
										Upgrade Package</h3>									
								</div>
								<div class="kt-subheader__toolbar">
						 <div class="kt-subheader__wrapper">		
        <a href="<?php echo $this->Html->url('/transactions/deposit',true);?>" class="btn btn-label-success" ><i class="fa fa-money-check"></i> Deposit Fund</a>		
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
						Active Package 
					</h3>
				</div>
			</div>			   
			 <?php echo $this->Form->create('User',array('class'=>'kt-form kt-form--label-right','enctype'=>'multipart/form-data')); ?>
								
				
				<div class="kt-portlet__body">					
					<?php echo $this->Session->flash(); ?>																	
											
										     
											 
											 
											 <div class="form-group row">
													<label class="col-3 col-form-label">Username</label>
													<div class="col-6" style="padding-top:10px;">
                                                        <?php echo h($userl['User']['username']); ?>														
													</div>
												</div>											
                                                
												<div class="form-group row">
													<label class="col-3 col-form-label">C-Wallet Balance</label>
													<div class="col-6" style="padding-top:8px;">
                                                         <?php echo $currency.$userl['User']['cwallet']; ?>															
													</div>
												</div>
																							
												 <div class="form-group row">
													<label class="col-3 col-form-label">E-Wallet Balance</label>
													<div class="col-6" style="padding-top:8px;">
                                                         <?php echo $currency.$userl['User']['ewallet']; ?>															
													</div>
												</div>	
												<div class="form-group row">
													<label class="col-3 col-form-label">CTO-Wallet Balance</label>
													<div class="col-6" style="padding-top:8px;">
                                                         <?php echo $currency.$userl['User']['ctowallet']; ?>															
													</div>
												</div>
																						
									            <div class="form-group row">
													<label class="col-3 col-form-label">Note:</label>
													<div class="col-6" style="padding-top:8px;">
                                                         <strong>C-Wallet:</strong><?php echo $setting['Setting']['cwallet']; ?>%/ <strong>E-Wallet:</strong><?php echo $setting['Setting']['ewallet']; ?>%/ <strong>CTO-Wallet:</strong><?php echo $setting['Setting']['ctowallet']; ?>% 														
													</div>
												</div> 
											 																			
									 
									 
									 													
												<div class="form-group row">
													<label class="col-3 col-form-label">Package</label> 
													<div class="col-6">
													<select name="data[User][plan_id]" required="required" class="form-control" onchange="showctodiv(this.value);">
													<option value="">Select Package</option>
													<?php if(count($resuts_plans)>0): ?>
													<?php foreach($resuts_plans as $resuts_plan): ?>
													<option value="<?php echo $resuts_plan['Plan']['id'];?>"><?php echo $resuts_plan['Plan']['package_name'];?> (RM<?php echo $resuts_plan['Plan']['package_amount'];?>)</option>
													<?php endforeach; ?>
													<?php endif; ?>																										
													</select>                                                        
														</div>														
													</div>
													
											 <div class="form-group row" style="display:none;" id="ctodiv">
													<label class="col-3 col-form-label">CTO Bonus Settings</label> 
													<div class="col-6" style="padding-top:10px;">
													
													<select name="data[User][cto_bonus_settings]" class="form-control" id="cto_bonus_settings">
													    <option value="">Select CTO Bonus</option>
													    <option value="1">Active CTO Bonus</option>
													    <option value="2">Passive CTO Bonus</option>							
													</select>												                                                      
														</div>														
													</div>		
									 		
														
													
												<div class="form-group row">
													<label class="col-3 col-form-label">Activate Username</label> 
													<div class="col-6">		
													<input type="text" required="required" name="data[User][activate_username]" value="" class="form-control">											                                                     
														</div>														
													</div>		
																																				
                                                   
                                                   <div class="form-group row">
													<label class="col-3 col-form-label">Remarks</label>
													<div class="col-6">
                                                   <textarea name="data[User][remarks]" class="form-control" required="required"></textarea>
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