<!DOCTYPE html>
<html lang="en"> 
    <head>
		<meta charset="utf-8"/>
		<title><?php echo $setting['Setting']['site_title'];?></title>
		<meta name="description" content="Login page example">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    				
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">	
		<link href="<?php echo Configure::read('assetsPath');?>css/pages/login/login-3.css" rel="stylesheet" type="text/css" />		
		<link href="<?php echo Configure::read('assetsPath');?>plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo Configure::read('assetsPath');?>css/style.bundle.css" rel="stylesheet" type="text/css" />		
		<link rel="shortcut icon" href="<?php echo Configure::read('siteUrl');?>img/favicon.png" />
		
    </head>
   
    <body  class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading"  >
       
    
	<div class="kt-grid kt-grid--ver kt-grid--root">
		<div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v3 kt-login--signin" id="kt_login">
	<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url(<?php echo Configure::read('assetsPath');?>media//bg/bg-3.jpg);">
		<div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
			<div class="kt-login__container">
				<div class="kt-login__logo">
					
						<?php echo $this->Html->image('/files/logo/'.$setting['Setting']['site_logo']);?>
					
				</div>
				
				 <?php echo $content_for_layout; ?>	
				
				
				
				
				<div class="kt-login__account">
					<span class="kt-login__account-msg">
						<?php echo $setting['Setting']['copyright_message'];?>
					</span>					
				</div>
			</div>	
		</div>
	</div>
</div>	
	</div>       
            
    	    	   <script src="<?php echo Configure::read('assetsPath');?>vendors/global/vendors.bundle.js" type="text/javascript"></script>
		    	   <script src="<?php echo Configure::read('assetsPath');?>js/demo1/scripts.bundle.js" type="text/javascript"></script>                   
                   <script src="<?php echo Configure::read('assetsPath');?>js/demo1/pages/login/login-general.js" type="text/javascript"></script>
                       
  </body>
</html>