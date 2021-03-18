<script>
showCaptcha=function(){   
   var img = document.images['captcha'];
   img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"<?php echo $this->Html->url('/users/captcha_image');?>/"+Math.random()*1000;    
}
</script>    	
   	<div class="breadcrumb">   	
		<div class="container">
			<h1>MEMBER LOGIN</h1>			
		</div>		
   	</div> 
	<div class="page-account">	
		<div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="account-wrapper">
                      <?php echo $this->Session->flash(); ?>	
                        <div class="tab-content">
                            <div id="login" class="tab-pane fade in active">
                                <div class="account-form-container login-form">
                                    <div class="account-form">
                                      <?php echo $this->Form->create('User'); ?>   
<input required="required" class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="data[User][username]" />
  <input required="required" class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="data[User][password]" /> 
  
                                            <div class="button-box">
                                                <div class="login-toggle-btn d-flex justify-content-between">
                                                	<div class="remember d-flex">     
						
                                                	</div>
                                                   	<div class="forgot">
                                                    	<a href="<?php echo $this->Html->url('/forgot_password',true);?>">Forgot Password?</a>                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-default btn-normal"><span>Login</span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
		</div>		
	</div>		