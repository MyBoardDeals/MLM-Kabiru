<!DOCTYPE html>
<html lang="en" >  
    <head>      
		<meta charset="utf-8"/>
		<title><?php echo $setting['Setting']['site_title'];?></title>
		<meta name="description" content="<?php echo $setting['Setting']['site_title'];?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">       
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">     
				
		<link href="<?php echo Configure::read('assetsPath');?>plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo Configure::read('assetsPath');?>plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		
		<link href="<?php echo Configure::read('assetsPath');?>plugins/custom/jstree/jstree.bundle.css" rel="stylesheet" type="text/css" />
		
		
		<link href="<?php echo Configure::read('assetsPath');?>css/style.bundle.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="<?php echo Configure::read('siteUrl');?>img/favicon.png" />	
		
    </head>
  
   <body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-page--loading">


<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
			<div class="kt-header-mobile__logo">
				<a href="<?php echo $this->Html->url('/admin/pages/index',true); ?>">
					<img alt="Logo" src="<?php echo Configure::read('siteUrl').'/files/logo/'.$setting['Setting']['site_logo']; ?>" width="50%" />
				</a> 
			</div>
			<div class="kt-header-mobile__toolbar">
				<button class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left" id="kt_aside_mobile_toggler"><span></span></button>			
				<button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
			</div>
		</div>
	
	
<div class="kt-grid kt-grid--hor kt-grid--root">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
							
           <button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
           <div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

          <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
	          <div class="kt-aside__brand-logo">
		           <a href="<?php echo $this->Html->url('/admin/pages/index',true); ?>">
					 <img alt="Logo" src="<?php echo Configure::read('siteUrl').'/files/logo/'.$setting['Setting']['site_logo']; ?>" width="75%" />
					</a>
	          </div>

			<div class="kt-aside__brand-tools">
							<button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler"><span></span></button>
						</div>
	</div>
				
		  <?php echo $this->element('admin_left_menu'); ?>	       		
       </div>
		
	  <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">		
		<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed " >
		<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
		<?php echo $this->element('admin_top_menu'); ?>	 
		</div>
	       <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">											
                 <?php echo $this->fetch('content'); ?>			
			</div>				
				
			
<div class="kt-footer  kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop" id="kt_footer">
	<div class="kt-container  kt-container--fluid ">
		<div class="kt-footer__copyright">
			<?php echo date('Y');?>&nbsp;&copy;&nbsp;<?php echo $setting['Setting']['company_name'];?>
		</div>		
	</div>
</div>
		</div>
		</div>
	</div>
	


		

  
		<div id="kt_scrolltop" class="kt-scrolltop">
				<i class="fa fa-arrow-up"></i>
		</div>
		
				
		<script src="<?php echo Configure::read('assetsPath');?>plugins/global/plugins.bundle.js" type="text/javascript"></script>
		<script src="<?php echo Configure::read('assetsPath');?>js/scripts.bundle.js" type="text/javascript"></script>

		
		<script src="<?php echo Configure::read('assetsPath');?>plugins/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>		
		<script src="<?php echo Configure::read('assetsPath');?>js/pages/dashboard.js" type="text/javascript"></script>	
		<script src="<?php echo Configure::read('assetsPath');?>plugins/custom/jstree/jstree.bundle.js" type="text/javascript"></script>
       
    
	
 <script>
	 <?php if($jstree==1): ?> 		
var KTTreeview = function () {  

     var ajaxTreeSample = function() {
	 
	 
	  $("#kt_tree_6").jstree({
            "core" : {
                "themes" : {
                    "responsive": false
                }, 
                // so that create works
                "check_callback" : true,
                'data' : {
                    'url' : function (node) {
                      return '<?php echo Configure::read('siteUrl');?>jstree_ajax_data.php?id=<?php echo $id;?>';
                    },
                    'data' : function (node) {
                      return { 'parent' : node.id };
                    }
                }
            },
            "types" : {
                "default" : {
                    "icon" : "fa fa-folder kt-font-brand"
                },
                "file" : {
                    "icon" : "fa fa-file  kt-font-brand"
                }
            },
            "state" : { "key" : "demo3" },
            "plugins" : [ "dnd", "state", "types" ]
        });        
    
    }
     
	

    return {        
        init: function () { 
			      
              ajaxTreeSample();
			
			
        }

    };

}();
 jQuery(document).ready(function() {    
       KTTreeview.init();
    });
<?php endif; ?> 	
	
	
</script>	
     
    </body>
  </html>

<?php //echo $this->element('sql_dump'); ?>