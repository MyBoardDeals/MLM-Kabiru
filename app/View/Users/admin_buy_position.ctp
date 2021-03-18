<style>
.formcontrol {
    border: 1px solid #dadada;
    padding: 6px 2px;
}

</style>
<script>


<?php /*?>showreferral=function(){

   $position_referralid=$('#UserReferralid').val();  
   
   if($position_referralid.length>0){
      $url='<?php echo Configure::read('siteUrl');?>users/ajax_common';	  
      $.post($url,{act:'positionreferralid',referralid:$position_referralid},function(data){		   
	     $('#usernameinfo').show();
	     $('#usernameinfo').html(data);		  
	   });
	   
   } else {   
     alert('Please enter correct Sponsor Position Referral ID!');
	 $('#UserReferralid').focus();
   }
} <?php */?>

placereferral=function(){

   $position_referralid=$('#UserPlacementReferralid').val();  
   
   if($position_referralid.length>0){
      $url='<?php echo Configure::read('siteUrl');?>users/ajax_common';	  
      $.post($url,{act:'positionreferralid',referralid:$position_referralid},function(data){		   
	     $('#pusernameinfo').show();
	     $('#pusernameinfo').html(data);		  
	   });
	   
   } else {   
     alert('Please enter correct Placement Position Referral ID!');
	 $('#UserPlacementReferralid').focus();
   }
}


checkusername=function(){
      $username=$('#UserUsername').val();
      $url='<?php echo Configure::read('siteUrl');?>users/ajax_common';	  
      $.post($url,{act:'findusername',username:$username},function(data){	
	    
	   $('#usernameinfo').show();
	   $('#usernameinfo').html(data);	
	  
	   });
}
 


function alpha(e) {

    if(e.keyCode==9){ return; }
	
    var k;
    document.all ? k = e.keyCode : k = e.which;
    return ((k > 64 && k < 91) || (k > 96 && k < 123) || (k == 8) || (k >= 48 && k <= 57));
   
}

function beta(e) {   
    var k;
    document.all ? k = e.keyCode : k = e.which;
    return (k != 32);
}


</script>

	
	<div class="kt-subheader  kt-grid__item" id="kt_subheader">
							<div class="kt-container  kt-container--fluid ">
								<div class="kt-subheader__main">
									<h3 class="kt-subheader__title">Users</h3>	
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
						Buy Position
					</h3>
				</div>
			</div>			   
			 <?php echo $this->Form->create('User',array('class'=>'kt-form kt-form--label-right','enctype'=>'multipart/form-data')); ?>
								
				
				<div class="kt-portlet__body">					
					<?php echo $this->Session->flash(); ?>																	
											
						 <div class="form-group row">
													<label class="col-3 col-form-label">Maximum Buy Position Limit</label>
													<div class="col-5" style="padding-top:10px;">
                                                    <?php echo $setting['Setting']['max_stage_one_buy_position'];?>											
													</div>
												</div>	
												
												
										 <div class="form-group row">
													<label class="col-3 col-form-label">Position Fees</label>
													<div class="col-5" style="padding-top:10px;">
                                                    <?php echo $setting['Setting']['joining_fees'].$currency;?>	
													</div>
												</div>												
						
											<div class="form-group row">
													<label class="col-3 col-form-label">Member Username</label>
													<div class="col-5">
                                                    <?php		
		        echo $this->Form->input('username',array('required'=>'required','class'=>'form-control','label'=>false,'div'=>false,'maxlength'=>25,'onkeyup'=>'checkusername();','onkeypress'=>'return alpha(event)'));?><span class="help-block" style="display:none;" id="usernameinfo"> Please correct the error </span>
													</div>													
												</div>	
												
												<div class="form-group row">
													<label class="col-3 col-form-label">Placement Position Referral ID</label>
													<div class="col-5">
                                                    <?php		
		        echo $this->Form->input('placement_referralid',array('required'=>'required','class'=>'form-control','label'=>false,'div'=>false,'maxlength'=>25,'onkeyup'=>'placereferral();','onkeypress'=>'return alpha(event)'));?><span class="help-block" style="display:none;" id="pusernameinfo"> Please correct the error </span>
													</div>													
												</div>
																								
												
                                                <div class="form-group row">
													<label class="col-3 col-form-label">Remarks</label>
													<div class="col-5">
                                                    <?php		
										echo $this->Form->input('remarks',array('required'=>'required','class'=>'form-control','label'=>false,'div'=>false));?>
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
