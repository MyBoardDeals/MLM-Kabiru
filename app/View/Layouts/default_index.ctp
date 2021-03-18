<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" lang="en-US">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html lang="en-US">
<!--<![endif]-->
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1.0">
<link rel="shortcut icon" type="ico" href="cir.fw.png">
 <title><?php echo $setting['Setting']['site_title'];?></title>
<!--[if lt IE 9]>
<script src="<?php echo Configure::read('assetsPath');?>site/themes/js/html5.js" type="text/javascript"></script>
<![endif]-->
<!--[if lte IE 9]>
<link rel="stylesheet" type="text/css" href="<?php echo Configure::read('assetsPath');?>site/themes/css/ie.css" />
<![endif]-->
<style type="text/css" >
	@media only screen and (-webkit-min-device-pixel-ratio: 2),(min-resolution: 192dpi) {
		/* Retina Logo */
		.logo{background:url(<?php echo Configure::read('siteUrl');?>img/logo.gif) no-repeat center; display:inline-block !important; background-size:contain;}
		.logo img{ opacity:0; visibility:hidden}
		.logo *{display:inline-block}
		.affix-top .logo.sticky,
		.affix .logo{ display:none !important}
		.affix .logo.sticky{ background:transparent !important; display:block !important}
		.affix .logo.sticky img{ opacity:1; visibility: visible;}
	}
</style>

		<style type="text/css">
img.wp-smiley,
img.emoji {
	display: inline !important;
	border: none !important;
	box-shadow: none !important;
	height: 1em !important;
	width: 1em !important;
	margin: 0 .07em !important;
	vertical-align: -0.1em !important;
	background: none !important;
	padding: 0 !important;
}
</style>
<link rel='stylesheet' id='pmpro_frontend-css'  href='<?php echo Configure::read('assetsPath');?>site/paid-memberships-pro/css/frontend.css?ver=1.8.10.4' type='text/css' media='screen' />
<link rel='stylesheet' id='pmpro_print-css'  href='<?php echo Configure::read('assetsPath');?>site/paid-memberships-pro/css/print.css?ver=1.8.10.4' type='text/css' media='print' />
<link rel='stylesheet' id='owl-carousel-css'  href='<?php echo Configure::read('assetsPath');?>site/applay-showcase/js/owl-carousel/owl.carousel.css?ver=4.6' type='text/css' media='all' />
<link rel='stylesheet' id='owl-carousel-theme-css'  href='<?php echo Configure::read('assetsPath');?>site/applay-showcase/js/owl-carousel/owl.theme.css?ver=4.6' type='text/css' media='all' />
<link rel='stylesheet' id='ias-css-css'  href='<?php echo Configure::read('assetsPath');?>site/applay-showcase/style.css?ver=4.6' type='text/css' media='all' />
<link rel='stylesheet' id='ias-devide-css'  href='<?php echo Configure::read('assetsPath');?>site/applay-showcase/devices/assets/style.css?ver=4.6' type='text/css' media='all' />
<link rel='stylesheet' id='ias-devide-new-css'  href='<?php echo Configure::read('assetsPath');?>site/applay-showcase/devices/new/devices.min.css?ver=4.6' type='text/css' media='all' />
<link rel='stylesheet' id='font-awesome-css'  href='<?php echo Configure::read('assetsPath');?>site/js_composer/assets/lib/bower/font-awesome/css/font-awesome.min.css?ver=4.11.2.1' type='text/css' media='all' />
<link rel='stylesheet' id='woocommerce-layout-css'  href='<?php echo Configure::read('assetsPath');?>site/woocommerce/assets/css/woocommerce-layout.css?ver=2.6.4' type='text/css' media='all' />
<link rel='stylesheet' id='woocommerce-smallscreen-css'  href='<?php echo Configure::read('assetsPath');?>site/woocommerce/assets/css/woocommerce-smallscreen.css?ver=2.6.4' type='text/css' media='only screen and (max-width: 768px)' />
<link rel='stylesheet' id='woocommerce-general-css'  href='<?php echo Configure::read('assetsPath');?>site/woocommerce/assets/css/woocommerce.css?ver=2.6.4' type='text/css' media='all' />
<link rel='stylesheet' id='prettyPhoto-css'  href='<?php echo Configure::read('assetsPath');?>site/wp-ajax-query-shortcode/js/prettyPhoto/css/prettyPhoto.css?ver=4.6' type='text/css' media='all' />
<link rel='stylesheet' id='wpajax-css'  href='<?php echo Configure::read('assetsPath');?>site/wp-ajax-query-shortcode/style.css?ver=4.6' type='text/css' media='all' />
<link rel='stylesheet' id='wp-pagenavi-css'  href='<?php echo Configure::read('assetsPath');?>site/wp-pagenavi/pagenavi-css.css?ver=2.70' type='text/css' media='all' />
<link rel='stylesheet' id='google-font-css'  href='//fonts.googleapis.com/css?family=Raleway%7COswald%3A400&#038;ver=4.6' type='text/css' media='all' />
<link rel='stylesheet' id='bootstrap-css'  href='<?php echo Configure::read('assetsPath');?>site/themes/css/bootstrap.min.css?ver=4.6' type='text/css' media='all' />
<link rel='stylesheet' id='lightbox2-css'  href='<?php echo Configure::read('assetsPath');?>site/themes/js/colorbox/colorbox.css?ver=4.6' type='text/css' media='all' />
<link rel='stylesheet' id='style-css'  href='<?php echo Configure::read('assetsPath');?>site/themes/style.css?ver=4.6' type='text/css' media='all' />
<link rel='stylesheet' id='modern-style-css'  href='<?php echo Configure::read('assetsPath');?>site/themes/css/modern-style.css?ver=4.6' type='text/css' media='all' />
<link rel='stylesheet' id='custom-css-css'  href='<?php echo Configure::read('assetsPath');?>site/themes/css/custom.css.php?ver=4.6' type='text/css' media='all' />
<link rel='stylesheet' id='js_composer_front-css'  href='<?php echo Configure::read('assetsPath');?>site/js_composer/assets/css/js_composer.min.css?ver=4.11.2.1' type='text/css' media='all' />
<link rel='stylesheet' id='UserAccessManagerAdmin-css'  href='<?php echo Configure::read('assetsPath');?>site/user-access-manager/css/uamAdmin.css?ver=1.0' type='text/css' media='screen' />
<link rel='stylesheet' id='UserAccessManagerLoginForm-css'  href='<?php echo Configure::read('assetsPath');?>site/user-access-manager/css/uamLoginForm.css?ver=1.0' type='text/css' media='screen' />
<script type='text/javascript' src='<?php echo Configure::read('assetsPath');?>site/js/jquery.js'></script>	
<script type='text/javascript' src='<?php echo Configure::read('assetsPath');?>site/js/jquery/jquery.js?ver=1.12.4'></script>
<script type='text/javascript' src='<?php echo Configure::read('assetsPath');?>site/js/jquery/jquery-migrate.min.js?ver=1.4.1'></script>
<script type='text/javascript' src='<?php echo Configure::read('assetsPath');?>site/paid-memberships-pro/js/paid-memberships-pro.js?ver=4.6'></script>
<script type='text/javascript' src='<?php echo Configure::read('assetsPath');?>site/woocommerce/assets/js/frontend/add-to-cart.min.js?ver=2.6.4'></script>
<script type='text/javascript' src='<?php echo Configure::read('assetsPath');?>site/wp-ajax-query-shortcode/js/prettyPhoto/jquery.prettyPhoto.js?ver=4.6'></script>
<script type='text/javascript' src='<?php echo Configure::read('assetsPath');?>site/js_composer/assets/js/vendors/woocommerce-add-to-cart.js?ver=4.11.2.1'></script>
<script type='text/javascript' src='<?php echo Configure::read('assetsPath');?>site/user-access-manager/js/functions.js?ver=4.6'></script>

<!--<link rel="canonical" href="http://straightlineapps.biz/" />
<link rel='shortlink' href='http://straightlineapps.biz/' />-->

<!--[if lte IE 9]>
<link rel="stylesheet" type="text/css" href="<?php echo Configure::read('assetsPath');?>site/js_composer/assets/css/vc_lte_ie9.min.css" media="screen"><![endif]--><!--[if IE  8]>
<link rel="stylesheet" type="text/css" href="<?php echo Configure::read('assetsPath');?>site/js_composer/assets/css/vc-ie8.min.css" media="screen">
<![endif]-->

<link rel="icon" href="favcon.png" sizes="32x32" />
<link rel="icon" href="favcon2.png" sizes="192x192" />
<link rel="apple-touch-icon-precomposed" href="favcon-180x180.png" />
<meta name="msapplication-TileImage" content="favcon-270x270.png" />

<style type="text/css" data-type="vc_shortcodes-custom-css">

.vc_custom_1467554474518{
margin-top: 0px !important;
margin-bottom: 0px !important;padding-top: 160px !important;
padding-bottom: 35px !important;
background-image: url(<?php echo Configure::read('siteUrl');?>img/hotoaday.jpg) !important;
background-position: center !important;
background-repeat: no-repeat !important;
background-size: cover !important;
}

.vc_custom_1414922479404{margin-bottom: 0px !important;padding-top: 45px !important;padding-bottom: 25px !important;background-color: #f2f2f2 !important;}

.vc_custom_1412180374138{margin-bottom: 0px !important;padding-top: 60px !important;background-color: #ffffff !important;}

.vc_custom_1414920754627{margin-bottom: 0px !important;padding-top: 60px !important;padding-bottom: 60px !important;}

.vc_custom_1467554645935{margin-bottom: 0px !important;padding-top: 80px !important;padding-bottom: 80px !important;background-image: url(<?php echo Configure::read('siteUrl');?>img/imgbg1.jpg) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}

.vc_custom_1414921892842{margin-bottom: 0px !important;padding-top: 80px !important;}.vc_custom_1467554696863{margin-bottom: 0px !important;padding-top: 65px !important;padding-bottom: 51px !important;background-image: url(<?php echo Configure::read('siteUrl');?>img/img2.jpg) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}

.vc_custom_1467554727456{margin-bottom: 0px !important;padding-top: 80px !important;padding-bottom: 60px !important;background-image: url(http://straightlineapps.biz/wp-content/uploads/2014/11/7erBZvZMQ2mmuFQ10vcA_IMGP4512.jpg?id=3064) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1472409067334{margin-bottom: 20px !important;}.vc_custom_1414930551493{margin-bottom: 40px !important;padding-top: 20px !important;}

.vc_custom_1414930539805{margin-top: -40px !important;margin-bottom: -50px !important;}.vc_custom_1472429608842{margin-bottom: 25px !important;}.vc_custom_1412697251983{padding-top: 20px !important;}.vc_custom_1414173244735{padding-bottom: 20px !important;}

.message { color:#FF0000 !important; font-family: "Oswald",Times,serif !important; font-weight: normal !important; }
label { font-family: "Oswald",Times,serif !important; font-weight: normal !important; font-size:14px;}
</style>



</head>

<body class="home page page-id-701 page-template page-template-page-templates page-template-front-page page-template-page-templatesfront-page-php pmpro-body-has-access full-width template-front-page custom-background-empty wpb-js-composer js-comp-ver-4.11.2.1 vc_responsive mozilla windows pc">

<a style="height:0; position:absolute; top:0;" id="top"></a>
<div id="pageloader" class="dark-div" style="position:fixed; top:0; left:0; width:100%; height:100%; z-index:99999; background:#111;">
    <div class="loader loader-2"><i></i><i></i><i></i><i></i></div>
</div>
<script>
setTimeout(function() {
    jQuery('#pageloader').fadeOut();
}, 30000);
</script>

<div id="body-wrap">
    <div id="wrap">
	
       <?php echo $this->element('header'); ?>	
			
	<?php /*?><div class="top-sidebar">
		<div class="container">
			<div class="row"></div>
		</div>
	   </div><?php */?>
  
       <div id="body">
	    <?php echo $this->Session->flash(); ?>
         <?php echo $content_for_layout; ?> 
		 	
	   </div>
						
		<?php /*?><div id="bottom-sidebar">
            <div class="container">
                <div class="row normal-sidebar"></div>                                  
            </div>
        </div><?php */?>
		
		 <?php echo $this->element('footer'); ?>	
		
        </div>
    </div>
	
    <div class="mobile-menu-wrap dark-div  visible-xs ">
        <a href="#" class="mobile-menu-toggle"><i class="fa fa-times"></i></a>
        <ul class="mobile-menu">
            <li id="menu-item-1638" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-701 current_page_item menu-item-1638"><a title="Homepage" href="<?php echo $this->Html->url('/',true);?>">WELCOME  PAGE</a></li>


<li id="menu-item-3716" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3716"><a href="<?php echo $this->Html->url('/luxury_club',true);?>">Luxury Club</a></li>


<?php if(!$logged_in): ?>
<li id="menu-item-3773" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3773">
<a href="<?php echo $this->Html->url('/users/joinnow',true);?>">Signup</a></li>
<li id="menu-item-3764" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3764">
<a href="<?php echo $this->Html->url('/login',true);?>">Login</a></li>
<?php else: ?>
<li id="menu-item-3773" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3773">
<a href="<?php echo $this->Html->url('/home',true);?>">My Account</a></li>
<li id="menu-item-3764" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3764">
<a href="<?php echo $this->Html->url('/logout',true);?>">Logout</a></li>
<?php endif; ?>

<li id="menu-item-3163" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children parent menu-item-3163">
<a href="<?php echo $this->Html->url('/contact_us',true);?>">CONTACT  US</a>
<ul class="sub-menu">
	<li id="menu-item-3255" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3255"><a href="<?php echo $this->Html->url('/terms',true);?>">TERMS OF USE</a></li>
	<li id="menu-item-2672" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2672"><a href="<?php echo $this->Html->url('/privacy_policy',true);?>">PRIVACY POLICY</a></li>
</ul>
</li>
                    </ul>
    </div>
	    
<script>
setTimeout(function() {
    jQuery('#pageloader').fadeOut();
}, 10000);
</script>    
	
<script type='text/javascript' src='<?php echo Configure::read('assetsPath');?>site/js_composer/assets/lib/waypoints/waypoints.min.js?ver=4.11.2.1'></script>

<script type='text/javascript' src='<?php echo Configure::read('assetsPath');?>site/applay-showcase/js/owl-carousel/owl.carousel.min.js?ver=1'></script>
<script type='text/javascript' src='<?php echo Configure::read('assetsPath');?>site/applay-showcase/devices/new/devices.js?ver=1'></script>
<script type='text/javascript' src='<?php echo Configure::read('assetsPath');?>site/applay-showcase/js/main.js?ver=1'></script>
<?php /*?><script type='text/javascript' src='<?php echo Configure::read('assetsPath');?>site/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min.js?ver=2.70'></script>
<script type='text/javascript' src='<?php echo Configure::read('assetsPath');?>site/woocommerce/assets/js/frontend/woocommerce.min.js?ver=2.6.4'></script>
<script type='text/javascript' src='<?php echo Configure::read('assetsPath');?>site/woocommerce/assets/js/jquery-cookie/jquery.cookie.min.js?ver=1.4.1'></script>

<script type='text/javascript' src='<?php echo Configure::read('assetsPath');?>site/woocommerce/assets/js/frontend/cart-fragments.min.js?ver=2.6.4'></script>
<script type='text/javascript' src='<?php echo Configure::read('assetsPath');?>site/wp-ajax-query-shortcode/js/masonry.min.js?ver=2.2.2'></script>
<script type='text/javascript' src='<?php echo Configure::read('assetsPath');?>site/wp-ajax-query-shortcode/js/main.js?ver=2.2.2'></script>
<?php */?><script type='text/javascript' src='<?php echo Configure::read('assetsPath');?>site/themes/js/bootstrap.min.js?ver=4.6'></script>
<script type='text/javascript' src='<?php echo Configure::read('assetsPath');?>site/js/comment-reply.min.js?ver=4.6'></script>
<script type='text/javascript' src='<?php echo Configure::read('assetsPath');?>site/themes/js/template.js?ver=4.6'></script>
<script type='text/javascript' src='<?php echo Configure::read('assetsPath');?>site/js/wp-embed.min.js?ver=4.6'></script>
<script type='text/javascript' src='<?php echo Configure::read('assetsPath');?>site/js_composer/assets/js/dist/js_composer_front.min.js?ver=4.11.2.1'></script>
<script type='text/javascript' src='<?php echo Configure::read('assetsPath');?>site/themes/js/colorbox/jquery.colorbox-min.js?ver=4.6'></script>
<script type='text/javascript' src='<?php echo Configure::read('assetsPath');?>site/js/jquery/ui/core.min.js?ver=1.11.4'></script>
<script type='text/javascript' src='<?php echo Configure::read('assetsPath');?>site/js/jquery/ui/widget.min.js?ver=1.11.4'></script>
<script type='text/javascript' src='<?php echo Configure::read('assetsPath');?>site/js/jquery/ui/accordion.min.js?ver=1.11.4'></script>
</body>
</html>
