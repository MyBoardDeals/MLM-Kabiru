<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width">
<meta charset="UTF-8" />
 <title><?php echo $setting['Setting']['site_title'];?></title>	
<meta name="description" content="" />

</head>
<body>
<div class="wrapper">
     <div class="headertop">	
     <div class="logo"><span class="logoimg"><a href="<?php echo $this->Html->url('/index/',true);?>">
	 <?php echo $this->Html->image('logo.gif',array('alt'=>'','border'=>0));?></a></span></div>
	 <div class="slogan"></div>  
     <div class="headerright" style="padding-top:10px;">
	
	
	</div>        
</div>	 
	 </div>
     
<div class="body_container">  
 <div class="body-Area">
  <div class="left_homr_panel_page roundedwhite" style="height:200px;">
   <?php echo $content_for_layout; ?> 	</div>
  </div>   	
 </div>
<div style="width:998px; margin:0 auto; padding-top:10px;">	
      <p> <?php echo $setting['Setting']['copyright_message'];?>  </p> 
  </div>
 </div>
</body>
</html>
