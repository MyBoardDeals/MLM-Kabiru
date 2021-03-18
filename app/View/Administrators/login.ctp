<script>
showCaptcha=function(){   
   var img = document.images['captcha'];
   img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"<?php echo $this->Html->url('/users/captcha_image');?>/"+Math.random()*1000;    
}
</script>

<div class="kt-login__signin">
					<div class="kt-login__head">					
						<h3 class="kt-login__title">Sign In To Admin</h3>	
						<?php echo $this->Session->flash(); ?>							
					</div>
					<?php echo $this->Form->create('Manager',array('class'=>'kt-form')); ?>  					
						<div class="input-group">
							<input class="form-control" type="text" required="required" placeholder="Username" name="data[User][username]" autocomplete="off" />
						</div>
						<div class="input-group">
							<input class="form-control" type="password" required="required" autocomplete="off" placeholder="Password" name="data[User][password]" />
						</div>
						<div class="input-group">
							<input name="data[User][rand_code]" required="required" class="form-control form-control-solid placeholder-no-fix" placeholder="Please enter captch code below" value="" id="AdministratorRandCode" aria-required="true" type="text">
						</div>
						
						<div class="row kt-login__extra">
							<div class="col">
							<img id="captcha" src="<?php echo $this->Html->url('/users/captcha_image');?>" alt="" /> <i class="fa fa-redo-alt" onclick="showCaptcha();" style="cursor:pointer;"></i> 	
							</div>
							<div class="col kt-align-right">
								<a href="javascript:;" id="kt_login_forgot" class="kt-login__link">Forget Password ?</a>
							</div>
						</div>
						<div class="kt-login__actions">
							<button type="submit" class="btn btn-brand btn-elevate kt-login__btn-primary">Sign In</button>
						</div>
					</form>
				</div>
				
				<div class="kt-login__forgot">
					<div class="kt-login__head">
						<h3 class="kt-login__title">Forgotten Password ?</h3>
						<div class="kt-login__desc">Enter your email to reset your password:</div>
					</div>
					<form class="kt-form" action="">
						<div class="input-group">
							<input class="form-control" type="text" placeholder="Email" name="email" id="kt_email" autocomplete="off">
						</div>
						<div class="kt-login__actions">
							<button id="kt_login_forgot_submit" class="btn btn-brand btn-elevate kt-login__btn-primary">Request</button>&nbsp;&nbsp;
							<button id="kt_login_forgot_cancel" class="btn btn-light btn-elevate kt-login__btn-secondary">Cancel</button>
						</div>
					</form>
				</div>	

         