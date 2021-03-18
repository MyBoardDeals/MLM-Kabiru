	<div class="breadcrumb">
   	
		<div class="container">
			<h1>FORGOT PASSWORD</h1>			
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
<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Enter your email address" name="data[User][email]" />
                                            <div class="button-box">
                                                <div class="login-toggle-btn d-flex justify-content-between">
                                                	<div class="remember d-flex"> </div>    
					                       	
                                                   	<div class="forgot">
                                                    	<a href="<?php echo $this->Html->url('/login',true);?>">Login your account</a>                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-default btn-normal"><span>Submit</span></button>
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

