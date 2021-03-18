<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<head>
<meta charset="utf-8"/>
<title><?php echo $setting['Setting']['site_title'];?></title>	
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="<?php echo Configure::read('assetsPath');?>global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo Configure::read('assetsPath');?>global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo Configure::read('assetsPath');?>global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo Configure::read('assetsPath');?>global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo Configure::read('assetsPath');?>global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link href="<?php echo Configure::read('assetsPath');?>global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo Configure::read('assetsPath');?>global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo Configure::read('assetsPath');?>global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE STYLES -->
<link href="<?php echo Configure::read('assetsPath');?>admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="<?php echo Configure::read('assetsPath');?>global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?php echo Configure::read('assetsPath');?>global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo Configure::read('assetsPath');?>admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo Configure::read('assetsPath');?>admin/pages/css/todo.css" rel="stylesheet" type="text/css"/>

<link href="<?php echo Configure::read('assetsPath');?>admin/layout/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?php echo Configure::read('assetsPath');?>admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<body class="page-header-fixed page-quick-sidebar-over-content page-sidebar-closed-hide-logo page-container-bg-solid">
<div class="page-header navbar navbar-fixed-top">	
	<div class="page-header-inner">	
		<div class="page-logo">
			<a href="<?php echo $this->Html->url('/',true);?>">
			<img src="<?php echo Configure::read('App.FilePath');?>logo/<?php echo $setting['Setting']['site_logo'];?>" alt="logo" class="logo-default" width="80"/>
			</a>
			<div class="menu-toggler sidebar-toggler hide"></div>
		</div>
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"></a>
		
		<div class="top-menu">
		<?php echo $this->element('top_menu'); ?>	
		</div>	
	</div>	
</div>

<div class="clearfix"></div>
<div class="page-container">	
	<div class="page-sidebar-wrapper">	
		<?php echo $this->element('left_menu'); ?>		
	</div>		
	<div class="page-content-wrapper">
		<?php echo $this->fetch('content'); ?>
	</div>	
</div>

<div class="page-footer">
	<div class="page-footer-inner">
			<?php echo $setting['Setting']['copyright_message'];?>
	</div>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>
<!--[if lt IE 9]>
<script src="<?php echo Configure::read('assetsPath');?>global/plugins/respond.min.js"></script>
<script src="<?php echo Configure::read('assetsPath');?>global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="<?php echo Configure::read('assetsPath');?>global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo Configure::read('assetsPath');?>global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?php echo Configure::read('assetsPath');?>global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo Configure::read('assetsPath');?>global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo Configure::read('assetsPath');?>global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo Configure::read('assetsPath');?>global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo Configure::read('assetsPath');?>global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo Configure::read('assetsPath');?>global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo Configure::read('assetsPath');?>global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo Configure::read('assetsPath');?>global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo Configure::read('assetsPath');?>global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="<?php echo Configure::read('assetsPath');?>global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="<?php echo Configure::read('assetsPath');?>global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="<?php echo Configure::read('assetsPath');?>global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="<?php echo Configure::read('assetsPath');?>global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="<?php echo Configure::read('assetsPath');?>global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="<?php echo Configure::read('assetsPath');?>global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
<script src="<?php echo Configure::read('assetsPath');?>global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="<?php echo Configure::read('assetsPath');?>global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="<?php echo Configure::read('assetsPath');?>global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<script src="<?php echo Configure::read('assetsPath');?>global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="<?php echo Configure::read('assetsPath');?>global/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
<script src="<?php echo Configure::read('assetsPath');?>global/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->
<script src="<?php echo Configure::read('assetsPath');?>global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="<?php echo Configure::read('assetsPath');?>global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<script src="<?php echo Configure::read('assetsPath');?>global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo Configure::read('assetsPath');?>global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo Configure::read('assetsPath');?>admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo Configure::read('assetsPath');?>admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="<?php echo Configure::read('assetsPath');?>admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="<?php echo Configure::read('assetsPath');?>admin/pages/scripts/index.js" type="text/javascript"></script>
<script src="<?php echo Configure::read('assetsPath');?>admin/pages/scripts/tasks.js" type="text/javascript"></script>
<script src="<?php echo Configure::read('assetsPath');?>admin/pages/scripts/inbox.js" type="text/javascript"></script>

<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   QuickSidebar.init(); // init quick sidebar
   Demo.init(); // init demo features
   Index.init();   
   Index.initDashboardDaterange();
   Index.initJQVMAP(); // init index page's custom scripts
   Index.initCalendar(); // init index page's custom scripts
   Index.initCharts(); // init index page's custom scripts
   Index.initChat();
   Index.initMiniCharts();
   Tasks.initDashboardWidget();
});
</script>
<?php //echo $this->element('sql_dump'); ?>
</body>
</html>