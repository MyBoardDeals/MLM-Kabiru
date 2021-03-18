<script src="<?php echo Configure::read('assetsPath');?>pages/scripts/signup.min.js" type="text/javascript"></script>
<script>
showreferral=function($susername){
     
      $('#submitbtn').hide();
      $url='<?php echo Configure::read('siteUrl');?>users/ajaxcommon';	
      $.post($url,{act:'findreferral',username:$susername},function(data){	
	    
	   $('#showreferrals').show();
	   $('#showreferrals').html(data);	
	   $('#submitbtn').show();
	   });  
}


checkuser=function($username){     
      $url='<?php echo Configure::read('siteUrl');?>users/ajaxcommon';	
      $.post($url,{act:'checkusername',username:$username},function(data){	    
	  
	    $len=data.length;
		if($len==26){
	       $('#chkusername').html('<span style="color:#63c726;">'+data+'</span>');	
		} else {
		 $('#chkusername').html('<span style="color:#FF0000;">'+data+'</span>');	
		// $('#UserUsername').val('');
		 $('#UserUsername').focus();
		}
	  
	  });
    
}


checkpass=function(){

	$password=$('#User2Password').val();
	$confirm_password=$('#UserConfirmPassword').val();
  
  if($password.length<6){
      $('#passworddiv').html("Password should be minimum 6 character long.");
  } else {
      $('#passworddiv').html('');
	  
   }
	
   
	
	if($confirm_password!=''){
	  if($password!=$confirm_password){
	     $('#passworddiv2').html('');
	     $('#passworddiv').html("Password & confirm password are not match.");
	  } else {
	     $('#passworddiv').html('');
	     $('#passworddiv2').html("Password & confirm password are matched.");
	  }
	}
	
	
	
}

checkpass2=function(){

	$password=$('#User2Password').val();
	$confirm_password=$('#UserConfirmPassword').val();
	
	if($confirm_password.length<6){
	
      $('#passworddiv').html("Confirm password should be minimum 6 character long.");
	  
   } else {
   
      $('#passworddiv').html('');
	  
	  if($password!=''){
	  if($password!=$confirm_password){
	     $('#passworddiv2').html('');
	     $('#passworddiv').html("Password & confirm password are not match.");
	  } else {
	     $('#passworddiv').html('');
	     $('#passworddiv2').html("Password & confirm password are matched.");
	  }
	} 
	  
   }
	
   
	
	
}


function showhide(){
    $('#submitshow').hide();
	$('#submithide').show();
}

showCaptcha=function(){   
   var img = document.images['captcha'];
   img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"<?php echo $this->Html->url('/users/captcha_image');?>/"+Math.random()*1000;    
}
</script>
<style>
.register-form { display:block !important; }
</style>

			
           <?php echo $this->Form->create('User',array('class'=>'register-form')); ?> 		          
                <h3 class="font-green">Sign Up</h3>
				 <?php echo $this->Session->flash(); ?>			
                <p class="hint"> Enter your personal details below: </p>
                
				<div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Sponsor</label>
                    <input class="form-control placeholder-no-fix" required="required"  type="text" placeholder="Sponsor Username" name="data[User][susername]" onkeyup="showreferral(this.value);" /> 
					<div id="showreferrals" style="text-align:left;"></div>
				</div>
				
				<div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">First Name</label>
                    <input class="form-control placeholder-no-fix" type="text" required="required" placeholder="First Name" name="data[User][first_name]" /> 
				</div>
				<div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Last Name</label>
                    <input class="form-control placeholder-no-fix" type="text" required="required" placeholder="Last Name" name="data[User][last_name]" /> 
				</div>
					
                <div class="form-group">                 
                    <label class="control-label visible-ie8 visible-ie9">Email Address</label>
                    <input class="form-control placeholder-no-fix" type="text" required="required" placeholder="Email" name="data[User][email]" /> </div>
					
				 <div class="form-group">                 
                    <label class="control-label visible-ie8 visible-ie9">Gender</label>                 
						<?php echo $this->Form->input('gender_id',array('required'=>'required','label'=> false,'class'=>'form-control placeholder-no-fix','div'=>false));?>
					 </div>	
					
				 <div class="form-group">                 
                    <label class="control-label visible-ie8 visible-ie9">Mobile Number</label>
                    <input class="form-control placeholder-no-fix" type="text" required="required" placeholder="Mobile Number" name="data[User][mobile_no]" /> </div>	
					
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Address</label>
                    <input class="form-control placeholder-no-fix" required="required" type="text" placeholder="Address" name="address" /> </div>
              
			   <?php /*?> <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">City/Town</label>
                    <input class="form-control placeholder-no-fix" type="text" placeholder="City/Town" name="city" /> </div>
					<?php */?>
					
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Country</label>
					<?php echo $this->Form->input('country_id',array('required'=>'required','label'=> false,'class'=>'form-control','div'=>false));?>
                </div>
                <p class="hint"> Enter your account details below: </p>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Username</label>
                    <input class="form-control placeholder-no-fix" type="text" autocomplete="off" required="required" placeholder="Username" name="data[User][username]" onkeyup="checkuser(this.value);" /> 
					 <div id="chkusername" style="text-align:center;"></div>
					</div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
               <input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="User2Password" required="required" placeholder="Password" name="data[User][password]" onkeyup="checkpass();" /> 
			   <div for="password" id="passworddiv"></div>	
			   </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>
                    <input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="UserConfirmPassword" required="required" placeholder="Re-type Your Password" name="data[User][confirm_password]" onkeyup="checkpass2();" /> 
					 <div for="password" id="passworddiv2"></div>	 	
					</div>
                <div class="form-group">
                    <label class="mt-checkbox mt-checkbox-outline">
                        <input type="checkbox" name="agree" required="required"  /> I agree to the <a href="<?php echo $this->Html->url('/terms_conditions',true);?>" target="_blank">Terms of Service </a> 
                        <span></span>
                    </label>                   
                </div>
				
                <div class="form-actions margin-bottom-20">                    
                    <button type="submit" class="btn btn-success uppercase">Submit</button>					
                </div>				
				
				<div class="create-account">
                    <p>
                        <a href="<?php echo $this->Html->url('/login',true);?>" class="uppercase">Login your account</a>
                    </p>
                </div>
            </form>