<?php extract($records);?>
<style>
* {
	margin: 0;
	padding: 0;
}
.popovers{
	cursor:pointer;}
.tree {
	text-align:center;
	width:950px;
 	margin:0 auto;
	 
}
.tree ul {
	padding-top:0px;
	position: relative;
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}
.tree li {
	float: left;
	text-align: center;
	list-style-type: none;
	position: relative;
	padding: 20px 1px 0 1px;
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}
.tree li::before, .tree li::after {
	content: '';
	position: absolute;
	top: 0;
	right: 50%;
	border-top: 1px solid #ccc;
	width: 50%;
	height: 20px;
}
.tree li::after {
	right: auto;
	left: 50%;
	border-left: 1px solid #ccc;
}
/*We need to remove left-right connectors from elements without 
any siblings*/
.tree li:only-child::after, .tree li:only-child::before {
	display: none;
}
/*Remove space from the top of single children*/
.tree li:only-child {
	padding-top: 0;
}
/*Remove left connector from first child and 
right connector from last child*/
.tree li:first-child::before, .tree li:last-child::after {
	border: 0 none;
}
/*Adding back the vertical connector to the last nodes*/
.tree li:last-child::before {
	border-right: 1px solid #ccc;
	border-radius: 0 5px 0 0;
	-webkit-border-radius: 0 5px 0 0;
	-moz-border-radius: 0 5px 0 0;
}
.tree li:first-child::after {
	border-radius: 5px 0 0 0;
	-webkit-border-radius: 5px 0 0 0;
	-moz-border-radius: 5px 0 0 0;
}
/*Time to add downward connectors from parents*/
.tree ul ul::before {
	content: '';
	position: absolute;
	top: 0;
	left: 50%;
	border-left: 1px solid #ccc;
	width: 0;
	height: 20px;
}
.tree li a {
	/*border: 1px solid #ccc;*/
	padding: 1px;
	text-decoration: none;
	color: #666;
	font-family: arial, verdana, tahoma;
	font-size: 11px;
	/*display: inline-block;*/
	border-radius: 5px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}
/*Time for some hover effects*/
/*We will apply the hover effect the the lineage of the element also*/
.tree li a:hover, .tree li a:hover+ul li a {
	/*background: #c8e4f8;*/
	color: #000;
	/*border: 1px solid #94a0b4;*/
}
/*Connector styles on hover*/
.tree li a:hover+ul li::after, .tree li a:hover+ul li::before, .tree li a:hover+ul::before, .tree li a:hover+ul ul::before {
	border-color: #ccc;
}	


.vendas{
	z-index:9999; position:absolute; margin-left:25px; margin-top:-10px;
	}
	
.img-circle {
    border-radius: 50%; border:1px solid #CCCCCC; 
}		
</style>

<script>
checkuser=function($username){     
      $url='<?php echo Configure::read('siteUrl');?>users/ajaxcommon';	
      $.post($url,{act:'validateusername',username:$username},function(data){	    
	  
	     var dataary=data.split(':');	  		
		 $('#chkusername').html('<span style="color:#FF0000;">'+dataary[0]+'</span>');		
		 $('#username').focus();		 
		 $('#userId').val(dataary[1]);	  
	  });
    
}

getserach=function(){
   $username=$('#username').val();
  
   if(!$username==null){     
   window.location.href='<?php echo Configure::read('siteUrl');?>admin/trees/matrix/'+$username;
    } else {
	alert('Please enter correct username');
	}
}


</script>


<?php echo $this->Html->script('/js/jquery.min'); ?>
<?php echo $this->Html->css('styl-sheet'); ?>
<?php echo $this->Html->script('stickytooltip'); ?>	
<?php echo $this->Html->css('stickytooltip'); ?>


<div class="kt-subheader kt-grid__item" id="kt_subheader">
			<div class="kt-container  kt-container--fluid ">
				<div class="kt-subheader__main">
					<h3 class="kt-subheader__title">
						Networks </h3>									
				</div>
				<div class="kt-subheader__toolbar">
		 <div class="kt-subheader__wrapper">
<a href="<?php echo $this->Html->url('/admin/trees/index',true);?>" class="btn btn-label-primary"><i class="fa fa-sitemap"></i>Network Tree Users</a>
		  
		 </div>
		</div>								
			</div>
		</div>	
												
	<div class="kt-container kt-container--fluid  kt-grid__item kt-grid__item--fluid">	
	
	
	<div class="row">			
			<div class="col-xl-6">				
				<div class="kt-portlet">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">
								View Matrix Tree 
							</h3>
						</div>
					</div>
					<div class="kt-portlet__body">														
								
						<div class="kt-section">
							
							<div class="kt-section__content">
								<div class="table-responsive">								
							  								
      <ul style="margin:0px; padding:0px;" class="tree">
        <li style="margin:0px; padding:0px;">   
		   <a  href="<?php echo $this->Html->url('/admin/trees/matrix/'.$id1,true);?>">
		   <?php echo $this->Html->image('/img/plan_icons/'.$member_icon1,array('alt'=>'','data-tooltip'=>'sticky1','width'=>45,'class'=>'img-circle'));?></a>
           <ul>	
            <li>  			
		        <?php if($id2>0): ?>
				<a  href="<?php echo $this->Html->url('/admin/trees/matrix/'.$id2,true);?>">
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon2,array('alt'=>'','data-tooltip'=>'sticky2','width'=>30,'class'=>'img-circle'));?></a> 
				<?php else: ?>  				
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon2,array('alt'=>'','data-tooltip'=>'sticky2','width'=>30,'class'=>'img-circle'));?> 								 				
				<?php endif; ?> 			
				
					
              <ul>	  
				<li>    
                <?php if($id5>0): ?>
				<a  href="<?php echo $this->Html->url('/admin/trees/matrix/'.$id5,true);?>">
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon5,array('alt'=>'','data-tooltip'=>'sticky5','width'=>30,'class'=>'img-circle'));?></a> 
				<?php else: ?>	
				
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon5,array('alt'=>'','data-tooltip'=>'sticky5','width'=>30,'class'=>'img-circle'));?> 
				
				<?php endif; ?> 	
				
				
				<ul>	  
				<li>    
                <?php if($id14>0): ?>
				<a  href="<?php echo $this->Html->url('/admin/trees/matrix/'.$id14,true);?>">
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon14,array('alt'=>'','data-tooltip'=>'sticky14','width'=>30,'class'=>'img-circle'));?></a> 
				<?php else: ?>  				
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon14,array('alt'=>'','data-tooltip'=>'sticky14','width'=>30,'class'=>'img-circle'));?> 
								
				<?php endif; ?> 				
			     </li>                
                <li>                 
                 <?php if($id15>0): ?>
				<a  href="<?php echo $this->Html->url('/admin/trees/matrix/'.$id15,true);?>">
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon15,array('alt'=>'','data-tooltip'=>'sticky15','width'=>30,'class'=>'img-circle'));?></a> 
				<?php else: ?>  
				
				
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon15,array('alt'=>'','data-tooltip'=>'sticky15','width'=>30,'class'=>'img-circle'));?> 
					
				
				<?php endif; ?> 	 
				 </li>
				 
				 <li>                 
                 <?php if($id16>0): ?>
				<a  href="<?php echo $this->Html->url('/admin/trees/matrix/'.$id16,true);?>">
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon16,array('alt'=>'','data-tooltip'=>'sticky16','width'=>30,'class'=>'img-circle'));?></a> 
				<?php else: ?> 
				
				
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon16,array('alt'=>'','data-tooltip'=>'sticky16','width'=>30,'class'=>'img-circle'));?> 
						 
				
				<?php endif; ?> 	 
				 </li>				 
              </ul>
				
				
							
			     </li>                
                <li>                 
                 <?php if($id6>0): ?>
				<a  href="<?php echo $this->Html->url('/admin/trees/matrix/'.$id6,true);?>">
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon6,array('alt'=>'','data-tooltip'=>'sticky6','width'=>30,'class'=>'img-circle'));?></a> 
				<?php else: ?>  
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon6,array('alt'=>'','data-tooltip'=>'sticky6','width'=>30,'class'=>'img-circle'));?> 								
				<?php endif; ?> 
				
				<ul>	  
				<li>    
                <?php if($id17>0): ?>
				<a  href="<?php echo $this->Html->url('/admin/trees/matrix/'.$id17,true);?>">
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon17,array('alt'=>'','data-tooltip'=>'sticky17','width'=>30,'class'=>'img-circle'));?></a> 
				<?php else: ?>  
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon17,array('alt'=>'','data-tooltip'=>'sticky17','width'=>30,'class'=>'img-circle'));?> 
				<?php endif; ?> 				
			     </li>                
                <li>                 
                 <?php if($id18>0): ?>
				<a  href="<?php echo $this->Html->url('/admin/trees/matrix/'.$id18,true);?>">
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon18,array('alt'=>'','data-tooltip'=>'sticky18','width'=>30,'class'=>'img-circle'));?></a> 
				<?php else: ?> 				
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon18,array('alt'=>'','data-tooltip'=>'sticky18','width'=>30,'class'=>'img-circle'));?> 							
				<?php endif; ?> 	 
				 </li>
				 
				 <li>                 
                 <?php if($id19>0): ?>
				<a  href="<?php echo $this->Html->url('/admin/trees/matrix/'.$id19,true);?>">
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon19,array('alt'=>'','data-tooltip'=>'sticky19','width'=>30,'class'=>'img-circle'));?></a> 
				<?php else: ?>  				
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon19,array('alt'=>'','data-tooltip'=>'sticky19','width'=>30,'class'=>'img-circle'));?> 
								
				<?php endif; ?> 	 
				 </li>				 
              </ul>
				
				
					 
				 </li>
				 
				 <li>                 
                 <?php if($id7>0): ?>
				<a  href="<?php echo $this->Html->url('/admin/trees/matrix/'.$id7,true);?>">
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon7,array('alt'=>'','data-tooltip'=>'sticky7','width'=>30,'class'=>'img-circle'));?></a> 
				<?php else: ?>  				 
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon7,array('alt'=>'','data-tooltip'=>'sticky7','width'=>30,'class'=>'img-circle'));?> 				
				<?php endif; ?> 
				
				<ul>	  
				<li>    
                <?php if($id20>0): ?>
				<a  href="<?php echo $this->Html->url('/admin/trees/matrix/'.$id20,true);?>">
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon20,array('alt'=>'','data-tooltip'=>'sticky20','width'=>30,'class'=>'img-circle'));?></a> 
				<?php else: ?>  				
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon20,array('alt'=>'','data-tooltip'=>'sticky20','width'=>30,'class'=>'img-circle'));?> 
				<?php endif; ?> 				
			     </li>                
                <li>                 
                 <?php if($id21>0): ?>
				<a  href="<?php echo $this->Html->url('/admin/trees/matrix/'.$id21,true);?>">
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon21,array('alt'=>'','data-tooltip'=>'sticky21','width'=>30,'class'=>'img-circle'));?></a> 
				<?php else: ?> 				
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon21,array('alt'=>'','data-tooltip'=>'sticky21','width'=>30,'class'=>'img-circle'));?> 
				<?php endif; ?> 	 
				 </li>
				 
				 <li>                 
                 <?php if($id22>0): ?>
				<a  href="<?php echo $this->Html->url('/admin/trees/matrix/'.$id22,true);?>">
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon22,array('alt'=>'','data-tooltip'=>'sticky22','width'=>30,'class'=>'img-circle'));?></a> 
				<?php else: ?> 
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon22,array('alt'=>'','data-tooltip'=>'sticky22','width'=>30,'class'=>'img-circle'));?> 
				<?php endif; ?> 	 
				 </li>				 
              </ul>
				
					 
				 </li>				 
              </ul>			  
            </li>					
			
            <li>             
                <?php if($id3>0): ?>
				<a  href="<?php echo $this->Html->url('/admin/trees/matrix/'.$id3,true);?>">
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon3,array('alt'=>'','data-tooltip'=>'sticky3','width'=>30,'class'=>'img-circle'));?></a> 
				<?php else: ?>  
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon3,array('alt'=>'','data-tooltip'=>'sticky3','width'=>30,'class'=>'img-circle'));?> 
				<?php endif; ?>  
				            
              <ul>			  
			   <li>                 
                 <?php if($id8>0): ?>
				<a  href="<?php echo $this->Html->url('/admin/trees/matrix/'.$id8,true);?>">
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon8,array('alt'=>'','data-tooltip'=>'sticky8','width'=>30,'class'=>'img-circle'));?></a> 
				<?php else: ?>  				
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon8,array('alt'=>'','data-tooltip'=>'sticky8','width'=>30,'class'=>'img-circle'));?> 
				<?php endif; ?> 
				
				
				<ul>	  
				<li>    
                <?php if($id23>0): ?>
				<a  href="<?php echo $this->Html->url('/admin/trees/matrix/'.$id23,true);?>">
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon23,array('alt'=>'','data-tooltip'=>'sticky23','width'=>30,'class'=>'img-circle'));?></a> 
				<?php else: ?>  
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon23,array('alt'=>'','data-tooltip'=>'sticky23','width'=>30,'class'=>'img-circle'));?> 
				<?php endif; ?> 				
			     </li>                
                <li>                 
                 <?php if($id24>0): ?>
				<a  href="<?php echo $this->Html->url('/admin/trees/matrix/'.$id24,true);?>">
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon24,array('alt'=>'','data-tooltip'=>'sticky24','width'=>30,'class'=>'img-circle'));?></a> 
				<?php else: ?>  				
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon24,array('alt'=>'','data-tooltip'=>'sticky24','width'=>30,'class'=>'img-circle'));?> 				
				<?php endif; ?> 	 
				 </li>
				 
				 <li>                 
                 <?php if($id25>0): ?>
				<a  href="<?php echo $this->Html->url('/admin/trees/matrix/'.$id25,true);?>">
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon25,array('alt'=>'','data-tooltip'=>'sticky25','width'=>30,'class'=>'img-circle'));?></a> 
				<?php else: ?>  
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon25,array('alt'=>'','data-tooltip'=>'sticky25','width'=>30,'class'=>'img-circle'));?> 
			
								
				<?php endif; ?> 	 
				 </li>				 
              </ul>
				
								 				 
				 </li>				 
				 <li>    
                <?php if($id9>0): ?>
				<a  href="<?php echo $this->Html->url('/admin/trees/matrix/'.$id9,true);?>">
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon9,array('alt'=>'','data-tooltip'=>'sticky9','width'=>30,'class'=>'img-circle'));?></a> 
				<?php else: ?>				
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon9,array('alt'=>'','data-tooltip'=>'sticky9','width'=>30,'class'=>'img-circle'));?> 				
				<?php endif; ?>		
				
				
				<ul>	  
				<li>    
                <?php if($id26>0): ?>
				<a  href="<?php echo $this->Html->url('/admin/trees/matrix/'.$id26,true);?>">
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon26,array('alt'=>'','data-tooltip'=>'sticky26','width'=>30,'class'=>'img-circle'));?></a> 
				<?php else: ?>  				
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon26,array('alt'=>'','data-tooltip'=>'sticky26','width'=>30,'class'=>'img-circle'));?> 
				<?php endif; ?> 				
			     </li>                
                <li>                 
                 <?php if($id27>0): ?>
				<a  href="<?php echo $this->Html->url('/admin/trees/matrix/'.$id27,true);?>">
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon27,array('alt'=>'','data-tooltip'=>'sticky27','width'=>30,'class'=>'img-circle'));?></a> 
				<?php else: ?> 
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon27,array('alt'=>'','data-tooltip'=>'sticky27','width'=>30,'class'=>'img-circle'));?> 
				
				<?php endif; ?> 	 
				 </li>
				 
				 <li>                 
                 <?php if($id28>0): ?>
				<a  href="<?php echo $this->Html->url('/admin/trees/matrix/'.$id28,true);?>">
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon28,array('alt'=>'','data-tooltip'=>'sticky28','width'=>30,'class'=>'img-circle'));?></a> 
				<?php else: ?>  				
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon28,array('alt'=>'','data-tooltip'=>'sticky28','width'=>30,'class'=>'img-circle'));?> 
				<?php endif; ?> 	 
				 </li>				 
              </ul>
				
				
				
						
			     </li>                
                <li >                 
                 <?php if($id10>0): ?>
				<a  href="<?php echo $this->Html->url('/admin/trees/matrix/'.$id10,true);?>">
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon10,array('alt'=>'','data-tooltip'=>'sticky10','width'=>30,'class'=>'img-circle'));?></a> 
				<?php else: ?>  
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon10,array('alt'=>'','data-tooltip'=>'sticky10','width'=>30,'class'=>'img-circle'));?> 
				<?php endif; ?>  
				
				
				<ul>	  
				<li>    
                <?php if($id29>0): ?>
				<a  href="<?php echo $this->Html->url('/admin/trees/matrix/'.$id29,true);?>">
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon29,array('alt'=>'','data-tooltip'=>'sticky29','width'=>30,'class'=>'img-circle'));?></a> 
				<?php else: ?>  								
					<?php echo $this->Html->image('/img/plan_icons/'.$member_icon29,array('alt'=>'','data-tooltip'=>'sticky29','width'=>30,'class'=>'img-circle'));?> 
				<?php endif; ?> 				
			     </li>                
                <li>                 
                 <?php if($id30>0): ?>
				<a  href="<?php echo $this->Html->url('/admin/trees/matrix/'.$id30,true);?>">
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon30,array('alt'=>'','data-tooltip'=>'sticky30','width'=>30,'class'=>'img-circle'));?></a> 
				<?php else: ?>  
					<?php echo $this->Html->image('/img/plan_icons/'.$member_icon30,array('alt'=>'','data-tooltip'=>'sticky30','width'=>30,'class'=>'img-circle'));?> 
					<?php endif; ?> 	 
				 </li>
				 
				 <li>                 
                 <?php if($id31>0): ?>
				<a  href="<?php echo $this->Html->url('/admin/trees/matrix/'.$id31,true);?>">
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon31,array('alt'=>'','data-tooltip'=>'sticky31','width'=>30,'class'=>'img-circle'));?></a> 
				<?php else: ?>  				
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon31,array('alt'=>'','data-tooltip'=>'sticky31','width'=>30,'class'=>'img-circle'));?> 
				<?php endif; ?> 	 
				 </li>				 
              </ul>
				
				
				
				 </li>  	
				 		
              </ul>
            </li>
			
			
			
			<li>             
                <?php if($id4>0): ?>
				<a  href="<?php echo $this->Html->url('/admin/trees/matrix/'.$id4,true);?>">
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon4,array('alt'=>'','data-tooltip'=>'sticky4','width'=>30,'class'=>'img-circle'));?></a> 
				<?php else: ?>  
				
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon4,array('alt'=>'','data-tooltip'=>'sticky4','width'=>30,'class'=>'img-circle'));?> 
				
				<?php endif; ?>				
            
              <ul>
			  
			   <li>                 
                 <?php if($id11>0): ?>
				<a  href="<?php echo $this->Html->url('/admin/trees/matrix/'.$id11,true);?>">
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon11,array('alt'=>'','data-tooltip'=>'sticky11','width'=>30,'class'=>'img-circle'));?></a> 
				<?php else: ?>  				
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon11,array('alt'=>'','data-tooltip'=>'sticky11','width'=>30,'class'=>'img-circle'));?> 
			
				<?php endif; ?>  
				
				
				<ul>	  
				<li>    
                <?php if($id32>0): ?>
				<a  href="<?php echo $this->Html->url('/admin/trees/matrix/'.$id32,true);?>">
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon32,array('alt'=>'','data-tooltip'=>'sticky32','width'=>30,'class'=>'img-circle'));?></a> 
				<?php else: ?> 				
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon32,array('alt'=>'','data-tooltip'=>'sticky32','width'=>30,'class'=>'img-circle'));?> 
				
									<?php endif; ?> 				
			     </li>                
                <li>                 
                 <?php if($id33>0): ?>
				<a  href="<?php echo $this->Html->url('/admin/trees/matrix/'.$id33,true);?>">
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon33,array('alt'=>'','data-tooltip'=>'sticky33','width'=>30,'class'=>'img-circle'));?></a> 
				<?php else: ?>  
				
				 
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon33,array('alt'=>'','data-tooltip'=>'sticky33','width'=>30,'class'=>'img-circle'));?> 
				
								
				<?php endif; ?> 	 
				 </li>
				 
				 <li>                 
                 <?php if($id34>0): ?>
				<a  href="<?php echo $this->Html->url('/admin/trees/matrix/'.$id34,true);?>">
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon34,array('alt'=>'','data-tooltip'=>'sticky34','width'=>30,'class'=>'img-circle'));?></a> 
				<?php else: ?>  
				
				
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon34,array('alt'=>'','data-tooltip'=>'sticky34','width'=>30,'class'=>'img-circle'));?> 
				<?php endif; ?>				
				
					 
				 </li>				 
              </ul>
				
				
												 
				 </li>				 
				  <li>                 
                 <?php if($id12>0): ?>
				<a  href="<?php echo $this->Html->url('/admin/trees/matrix/'.$id12,true);?>">
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon12,array('alt'=>'','data-tooltip'=>'sticky12','width'=>30,'class'=>'img-circle'));?></a> 
				<?php else: ?>  
				
				
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon12,array('alt'=>'','data-tooltip'=>'sticky12','width'=>30,'class'=>'img-circle'));?> 
				<?php endif; ?>
							
				
				
				<ul>	  
				<li>    
                <?php if($id35>0): ?>
				<a  href="<?php echo $this->Html->url('/admin/trees/matrix/'.$id35,true);?>">
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon35,array('alt'=>'','data-tooltip'=>'sticky35','width'=>30,'class'=>'img-circle'));?></a> 
				<?php else: ?>  
				
				
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon35,array('alt'=>'','data-tooltip'=>'sticky35','width'=>30,'class'=>'img-circle'));?> 
				<?php endif; ?>					
						
			     </li>                
                <li>                 
                 <?php if($id36>0): ?>
				<a  href="<?php echo $this->Html->url('/admin/trees/matrix/'.$id36,true);?>">
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon36,array('alt'=>'','data-tooltip'=>'sticky36','width'=>30,'class'=>'img-circle'));?></a> 
				<?php else: ?>  
				
				
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon36,array('alt'=>'','data-tooltip'=>'sticky36','width'=>30,'class'=>'img-circle'));?> 
				<?php endif; ?>		
				
				 
				 </li>
				 
				 <li>                 
                 <?php if($id37>0): ?>
				<a  href="<?php echo $this->Html->url('/admin/trees/matrix/'.$id37,true);?>">
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon37,array('alt'=>'','data-tooltip'=>'sticky37','width'=>30,'class'=>'img-circle'));?></a> 
				<?php else: ?> 
				
				
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon37,array('alt'=>'','data-tooltip'=>'sticky37','width'=>30,'class'=>'img-circle'));?>
				<?php endif; ?>				 
				 
				
				 </li>				 
              </ul>
				
				
				
				 </li>
				  <li >                 
                 <?php if($id13>0): ?>
				<a  href="<?php echo $this->Html->url('/admin/trees/matrix/'.$id13,true);?>">
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon13,array('alt'=>'','data-tooltip'=>'sticky13','width'=>30,'class'=>'img-circle'));?></a> 
				<?php else: ?>  
				
				
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon13,array('alt'=>'','data-tooltip'=>'sticky13','width'=>30,'class'=>'img-circle'));?> 
				<?php endif; ?>				
				
				
				
				
				<ul>	  
				<li>    
                <?php if($id38>0): ?>
				<a  href="<?php echo $this->Html->url('/admin/trees/matrix/'.$id38,true);?>">
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon38,array('alt'=>'','data-tooltip'=>'sticky38','width'=>30,'class'=>'img-circle'));?></a> 
				<?php else: ?>  
				
				
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon38,array('alt'=>'','data-tooltip'=>'sticky38','width'=>30,'class'=>'img-circle'));?> 
				<?php endif; ?>					
				
							
			     </li>                
                <li>                 
                 <?php if($id39>0): ?>
				<a  href="<?php echo $this->Html->url('/admin/trees/matrix/'.$id39,true);?>">
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon39,array('alt'=>'','data-tooltip'=>'sticky39','width'=>30,'class'=>'img-circle'));?></a> 
				<?php else: ?>  
				
			
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon39,array('alt'=>'','data-tooltip'=>'sticky39','width'=>30,'class'=>'img-circle'));?> 
				<?php endif; ?>
				
			
				 </li>
				 
				 <li>                 
                 <?php if($id40>0): ?>
				<a  href="<?php echo $this->Html->url('/admin/trees/matrix/'.$id40,true);?>">
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon40,array('alt'=>'','data-tooltip'=>'sticky40','width'=>30,'class'=>'img-circle'));?></a> 
				<?php else: ?>  
				
			
				<?php echo $this->Html->image('/img/plan_icons/'.$member_icon40,array('alt'=>'','data-tooltip'=>'sticky40','width'=>30,'class'=>'img-circle'));?> 
				<?php endif; ?>
				
				
				
					 
				 </li>				 
              </ul>
				
				
				
				
				 </li>	 
				  
				 				
              </ul>
            </li>	
			
			
			
          </ul>
        </li>
      </ul>     
   			
								</div>
							</div>
						</div>
					</div>					
				</div>			
			</div>
		</div>
	
		
		
		<div class="row">			
			<div class="col-xl-6">				
				<div class="kt-portlet">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">
								 Directly sponsored 
							</h3>
						</div>
					</div>
					<div class="kt-portlet__body">	
					
														
								
						<div class="kt-section">
							
							<div class="kt-section__content">
								<div class="table-responsive">
								<table class="table table-bordered" width="100%">
							<thead>
							<tr>
								<th width="5%" >No.</th>
			
	
			<th width="9%"><?php echo $this->Paginator->sort('username'); ?></th>		
			
			<th width="11%"><?php echo $this->Paginator->sort('first_name'); ?></th>				
			<th width="11%"><?php echo $this->Paginator->sort('last_name'); ?></th>		
			<th width="31%" ><?php echo $this->Paginator->sort('email'); ?></th>
			<th width="13%" ><?php echo $this->Paginator->sort('mobile_no'); ?></th>
			
			<th width="13%" ><?php echo $this->Paginator->sort('created','Date Join'); ?></th> 
			
			
			<th width="7%" ><?php echo $this->Paginator->sort('status'); ?></th>
			</tr>
							</thead>
							<tbody>
							<?php foreach ($users as $k=>$user):   ?>
	<tr>
		<th><?php echo h($k+1); ?></th>
		

		<td><?php echo h($user['User']['username']); ?></td>
		
		
		<td><?php echo h($user['User']['first_name']); ?></td>
		
		<td><?php echo h($user['User']['last_name']); ?></td>
		<td><?php echo h($user['User']['email']); ?></td>
		<td><?php echo h($user['User']['mobile_no']); ?></td>	
		
		<td><?php echo date('d M Y',strtotime($user['User']['created']));?></td>
		<td><?php echo ($user['User']['status']==0) ? 'Inactive':'Active';?></td>
		</tr>
<?php endforeach; ?>
							</tbody>
							</table>				
								</div>
							</div>
						</div>
					</div>					
				</div>			
			</div>
		</div>
		
		<div class="row">
								<div class="col-xl-12">								
									<div class="kt-portlet">
										<div class="kt-portlet__body">
										
	<?php echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'))); ?>	
											<div class="kt-pagination kt-pagination--brand">
											
												<ul class="kt-pagination__links">
													 <?php 
                    echo $this->Paginator->prev( '<', array( 'class' => '', 'tag' => 'li' ), null, array( 'class' => 'kt-pagination__link--first', 'tag' => 'li' ) );
                    echo $this->Paginator->numbers( array( 'tag' => 'li', 'separator' => '', 'currentClass' => 'kt-pagination__link--active' ) );
                    echo $this->Paginator->next( '>', array( 'class' => '', 'tag' => 'li' ), null, array( 'class' => 'kt-pagination__link--last', 'tag' => 'li' ) );
                ?>
												</ul>												
											</div>

											
										</div>
									</div>

									
								</div>
							</div>
	</div>
	
	<div id="mystickytooltip" class="stickytooltip">
	<div style="padding:1px">
	  <?php for($i=1;$i<=40;$i++){ ?>
	  <?php if($records['isComp'.$i]==1): ?>
		<div id="sticky<?php echo $i;?>" class="atip" style="width:300px">
			<table width="100%" cellpadding="0" cellspacing="0">
			<tr>
					<td align="left">Country</td>
					<td align="left"><b>:</b> <?php echo $records['country_name'.$i];?></td>
				</tr>
				<tr>
					<td align="left">Username</td>
					<td align="left"><b>:</b> <?php echo $records['username'.$i];?></td>
				</tr>
				<tr>
					<td align="left">Name</td>
					<td align="left"><b>:</b> <?php echo $records['name'.$i];?></td>
				</tr>
				
				
				<tr>
					<td width="42%" align="left">Sponsor</td>
					<td width="58%" align="left"><b>:</b> <?php echo $records['susername'.$i];?></td>
				</tr>
											
				<tr>
					<td width="42%" align="left">Position ID</td>
					<td width="58%" align="left"><b>:</b> <?php echo $records['position'.$i];?></td>
				</tr>
				<tr>
					<td width="42%" align="left">Joining Date</td>
					<td width="58%" align="left"><b>:</b> <?php echo date('d M Y',strtotime($records['joining_date'.$i]));?></td>
				</tr>	
				
			</table>
		</div>
		<?php endif; ?>
		<?php } ?>		
		
	</div>
	<div class="stickystatus"></div>
</div>
    
  


    
  




	