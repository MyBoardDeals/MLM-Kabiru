<style>
.formcontrol {
    border: 1px solid #dadada;
    padding: 6px 2px;
}

</style>


<script>
showreferral=function(){

   $susername=$('#UserSusername').val();  
   
   if($susername.length>0){
      $url='<?php echo Configure::read('siteUrl');?>users/ajax_common';	  
      $.post($url,{act:'find_referral',susername:$susername},function(data){		  
	   
	   $('#showreferrals').show();
	   $('#referralinfo').html(data);	
	  
	   });
	   
   } else {   
     alert('Please enter correct sponsor username!');
	 $('#UserSusername').focus();
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
      $url='<?php echo Configure::read('siteUrl');?>users/ajaxcommon';	  
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
						Edit User
					</h3>
				</div>
			</div>			   
			 <?php echo $this->Form->create('User',array('class'=>'kt-form kt-form--label-right','enctype'=>'multipart/form-data')); ?>
			<?php  echo $this->Form->input('id');?>							
				
				<div class="kt-portlet__body">					
					<?php echo $this->Session->flash(); ?>																	
											
							
											<div class="form-group row">
													<label class="col-3 col-form-label">Username</label>
													<div class="col-5">
                         <?php echo $this->Form->input('username',array('required'=>'required','class'=>'form-control','label'=>false,'div'=>false,'disabled'=>'disabled'));?>
													</div>
												</div>										
												
												<div class="form-group row">
													<label class="col-3 col-form-label">Password</label>
													<div class="col-5">
														<div class="input-group">
															<input type="password" name="data[User][password]" class="form-control">
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
                                                    <?php		
										echo $this->Form->input('gender_id',array('required'=>'required','class'=>'form-control input-small','label'=>false,'div'=>false));?>
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
					 <?php echo $this->Form->input('country_id',array('required'=>'required','class'=>'form-control','label'=>false,'div'=>false));?>	
												</div>
											</div> 
											 <div class="form-group row">
													<label class="col-3 col-form-label">State</label>
													<div class="col-5">
                                                    <?php		
										echo $this->Form->input('state',array('class'=>'form-control','label'=>false,'div'=>false));?>
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
												
												<div class="form-group row">
													<label class="col-3 col-form-label">Photo</label>
													<div class="col-5">
                                                    <?php echo $this->Form->file('member_photo',array('label'=>false,'div'=>false));?>
													</div>
												</div>
												
												<div class="form-group row">
													<label class="col-3 col-form-label">&nbsp;</label>
													<div class="col-5">
                                     <img src="<?php echo Configure::read('App.FilePath');?>user/thumb/<?php echo $this->request->data['User']['member_photo']; ?>" width="100" />
													</div>
												</div>
												
																							
																				
					
				</div>
				<div class="kt-portlet__foot">
					<div class="kt-form__actions">
						<div class="row">
							<div class="col-3">
							</div>
							<div class="col-9">
								<button type="submit" class="btn btn-success">Update</button>								
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
</div>
</div>
</div>	