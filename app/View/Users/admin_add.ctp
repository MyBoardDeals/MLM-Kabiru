<style>
.formcontrol {
    border: 1px solid #dadada;
    padding: 6px 2px;
}

</style>


<script>
showreferral=function(){

   $position_referralid=$('#position_referralid').val();  
   
   if($position_referralid.length>0){
      $url='<?php echo Configure::read('siteUrl');?>users/ajax_common';	  
      $.post($url,{act:'positionreferralid',referralid:$position_referralid},function(data){		   
	    $('#referralinfo').html(data);		  
	   });
	   
   } else {   
     alert('Please enter correct Sponsor Position Referral ID!');
	 $('#position_referralid').focus();
   }
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

checkusername=function(){
      $username=$('#UserUsername').val();
      $url='<?php echo Configure::read('siteUrl');?>users/ajax_common';	  
      $.post($url,{act:'checkusername',username:$username},function(data){	
	    
	   $('#usernameinfo').show();
	   $('#usernameinfo').html(data);	
	  
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
		<a href="<?php echo $this->Html->url('/admin/users/add',true);?>" class="btn btn-label-primary"><i class="fa fa-plus-square"></i> Create User</a>
		<a href="<?php echo $this->Html->url('/admin/users/index',true);?>" class="btn btn-label-success"><i class="fa fa-users"></i> Active Users</a>
		<a href="<?php echo $this->Html->url('/admin/users/inactive',true);?>" class="btn btn-label-info"><i class="fa fa-user-times"></i> Inactive Users</a>
		<a href="<?php echo $this->Html->url('/admin/users/suspended',true);?>" class="btn btn-label-danger"><i class="fa fa-user-times"></i> Suspended Users</a>	
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
						Add User
					</h3>
				</div>
			</div>			   
			 <?php echo $this->Form->create('User',array('class'=>'kt-form kt-form--label-right','enctype'=>'multipart/form-data')); ?>
								
				
				<div class="kt-portlet__body">					
					<?php echo $this->Session->flash(); ?>																	
											
					<h3>Sponsor Information:</h3>
										 
						   <div class="form-group row">
								<label class="col-3 col-form-label">Sponsor Position Referral ID</label>
								<div class="col-5">		  
		<input name="data[User][position_referralid]" required="required" value="<?php echo $positioncode;?>" class="form-control" maxlength="10" onkeyup="showreferral();" type="text" id="position_referralid">  
		  
		  <span id="referralinfo"></span>
								</div>
								<label class="col-4" style="text-align:left;"></label>
							</div>		
										
												
						<h3>Account Information:</h3>					
												
											<div class="form-group row">
													<label class="col-3 col-form-label">Username</label>
													<div class="col-5">
                                                    <?php		
		        echo $this->Form->input('username',array('required'=>'required','class'=>'form-control','label'=>false,'div'=>false,'maxlength'=>25,'onkeyup'=>'checkusername();','onkeypress'=>'return alpha(event)'));?><span class="help-block" style="display:none;" id="usernameinfo"> Please correct the error </span>
													</div>
													<label class="col-md-4" style="text-align:left;">Username must be unique</label>
												</div>	
												
												
												<div class="form-group row">
													<label class="col-3 col-form-label">Password</label>
													<div class="col-5">
														<div class="input-group">
															<input type="password" required="required" name="data[User][password]" class="form-control">
															<span class="input-group-addon">
															<span class="glyphicon glyphicon-lock"></span>
															</span>
														</div>
													</div>
												</div>	
												
												
												<div class="form-group row">
													<label class="col-3 col-form-label">First Name</label>
													<div class="col-5">                                                   	
										 <?php	echo $this->Form->input('first_name',array('required'=>'required','class'=>'form-control','label'=>false,'div'=>false));	?>
													</div>
												</div>
												
												
												
												
                                                <div class="form-group row">
													<label class="col-3 col-form-label">Last Name</label>
													<div class="col-5">
                                                    <?php		
										echo $this->Form->input('last_name',array('required'=>'required','class'=>'form-control','label'=>false,'div'=>false));?>
													</div>
												</div>                                                
												
                                                <div class="form-group row">
													<label class="col-3 col-form-label">Gender</label>
													<div class="col-5">
                                                    		
										<?php echo $this->Form->input('gender_id',array('required'=>'required','class'=>'form-control input-small','label'=>false,'div'=>false));?>
													</div>
												</div>												
												
                                                 <div class="form-group row">
													<label class="col-3 col-form-label">Email</label>
													<div class="col-5">
                                                    <?php		
										echo $this->Form->input('email',array('required'=>'required','class'=>'form-control','label'=>false,'div'=>false));?>
													</div>
												</div>
												
                                                <div class="form-group row">
													<label class="col-3 col-form-label">Mobile No</label>
													<div class="col-5">
                                                    <?php		
										echo $this->Form->input('mobile_no',array('required'=>'required','class'=>'form-control','label'=>false,'div'=>false));?>
													</div>
												</div>
												
                                                <div class="form-group row">
													<label class="col-3 col-form-label">Address</label>
													<div class="col-5">
                                                    <?php		
										echo $this->Form->input('address',array('required'=>'required','class'=>'form-control','label'=>false,'div'=>false));?>
													</div>
												</div>
												
                                                <div class="form-group row">
												<label class="col-3 col-form-label">Country</label>
												<div class="col-5">
                                                    <?php		
					echo $this->Form->input('country_id',array('required'=>'required','class'=>'form-control','label'=>false,'div'=>false));?>	
												</div>
											</div> 
											 <div class="form-group row">
													<label class="col-3 col-form-label">State</label>
													<div class="col-5">
                                                   		
									 <?php echo $this->Form->input('state',array('class'=>'form-control','label'=>false,'div'=>false));?>
													</div>
												</div>
												
												 <div class="form-group row">
													<label class="col-3 col-form-label">City</label>
													<div class="col-5">
                                                    <?php		
										echo $this->Form->input('city',array('class'=>'form-control','label'=>false,'div'=>false));?>
													</div>
												</div>
												
												 <div class="form-group row">
													<label class="col-3 col-form-label">Zip Code</label>
													<div class="col-5">
                                                    <?php		
										echo $this->Form->input('zip_code',array('class'=>'form-control','label'=>false,'div'=>false));?>
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

<script>
 window.onload=function(){    
	placementusername('<?php echo $sponsor;?>');
 }
</script>