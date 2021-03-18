<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
<div id="kt_aside_menu" class="kt-aside-menu" data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
	<ul class="kt-menu__nav">
		
		<li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true">
		<a href="<?php echo $this->Html->url('/admin/pages/index',true); ?>" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-architecture-and-city"></i><span class="kt-menu__link-text">Dashboard</span></a></li>
		
		
		<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
		<a href="javascript:;" class="kt-menu__link kt-menu__toggle">		
		<span class="kt-menu__link-icon"><i class="fa fa-cogs"></i></span>
		<span class="kt-menu__link-text">Settings</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>			
			<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
				<ul class="kt-menu__subnav">					
				    <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
					<a href="<?php echo $this->Html->url('/admin/users/change_password',true); ?>" class="kt-menu__link kt-menu__toggle">
					<span class="kt-menu__link-icon"><i class="fa fa-lock"></i></span>											
					<span class="kt-menu__link-text">Change Password</span></a></li>	
				
					<li class="kt-menu__item kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
					<a href="<?php echo $this->Html->url('/admin/settings/index',true); ?>" class="kt-menu__link ">
					<span class="kt-menu__link-icon"><i class="fa fa-wrench"></i></span>
					<span class="kt-menu__link-text">Website Settings</span></a></li>
					
					
					<li class="kt-menu__item kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
					<a href="<?php echo $this->Html->url('/admin/settings/general_setting',true); ?>" class="kt-menu__link ">
					<span class="kt-menu__link-icon"><i class="fa fa-wrench"></i></span>
					<span class="kt-menu__link-text">General Settings</span></a></li>	
					
					<li class="kt-menu__item kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
					<a href="<?php echo $this->Html->url('/admin/settings/commission_setting',true); ?>" class="kt-menu__link ">
					<span class="kt-menu__link-icon"><i class="fa fa-wrench"></i></span>
					<span class="kt-menu__link-text">Commission Settings</span></a></li>	
										
					<li class="kt-menu__item kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
					<a href="<?php echo $this->Html->url('/admin/settings/bw_setting',true); ?>" class="kt-menu__link ">
					<span class="kt-menu__link-icon"><i class="fa fa-wrench"></i></span>
					<span class="kt-menu__link-text">Board Worth (BW) Settings</span></a></li>	
									
				</ul>
			</div>
		</li>
				
			
		<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
		<a href="javascript:;" class="kt-menu__link kt-menu__toggle">
		<span class="kt-menu__link-icon"><i class="fa fa-globe"></i></span>
		<span class="kt-menu__link-text">Countries</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>	
			<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
				<ul class="kt-menu__subnav">				
					
					<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
					<a href="<?php echo $this->Html->url('/admin/countries/add',true); ?>" class="kt-menu__link kt-menu__toggle">
					<span class="kt-menu__link-icon"><i class="fa fa-plus-square"></i></span>											
					<span class="kt-menu__link-text"> Add Country</span></a></li>
															
					<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
					<a href="<?php echo $this->Html->url('/admin/countries/index',true); ?>" class="kt-menu__link kt-menu__toggle">
					<span class="kt-menu__link-icon"><i class="fa fa-globe"></i></span>											
					<span class="kt-menu__link-text"> View countries</span></a></li>						
				</ul>
			</div>
		</li>	
						
			
		
		<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
		<a href="javascript:;" class="kt-menu__link kt-menu__toggle">
		<span class="kt-menu__link-icon"><i class="fa fa-users"></i></span>
		<span class="kt-menu__link-text">Site Users</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>			
			<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
				<ul class="kt-menu__subnav">					
					<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
					<a href="<?php echo $this->Html->url('/admin/users/add',true); ?>" class="kt-menu__link kt-menu__toggle">
					<span class="kt-menu__link-icon"><i class="fa fa-user-plus"></i></span>											
					<span class="kt-menu__link-text"> Add User</span></a></li>
					
					<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
					<a href="<?php echo $this->Html->url('/admin/users/index',true); ?>" class="kt-menu__link kt-menu__toggle">
					<span class="kt-menu__link-icon"><i class="fa fa-users"></i></span>											
					<span class="kt-menu__link-text"> Active Users</span></a></li>
					
					<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
					<a href="<?php echo $this->Html->url('/admin/users/inactive',true); ?>" class="kt-menu__link kt-menu__toggle">
					<span class="kt-menu__link-icon"><i class="fa fa-user-times"></i></span>											
					<span class="kt-menu__link-text"> Inactive Users</span></a></li>
					
					<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
					<a href="<?php echo $this->Html->url('/admin/users/suspended',true); ?>" class="kt-menu__link kt-menu__toggle">
					<span class="kt-menu__link-icon"><i class="fa fa-user-times"></i></span>											
					<span class="kt-menu__link-text"> Suspended Users</span></a></li>	
					
					<?php /*?><li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
					<a href="<?php echo $this->Html->url('/admin/users/unpaid',true); ?>" class="kt-menu__link kt-menu__toggle">
					<span class="kt-menu__link-icon"><i class="fa fa-user-times"></i></span>											
					<span class="kt-menu__link-text"> Unpaid Users</span></a></li>	<?php */?>
				
						
				</ul>
			</div>
		</li>
	
	
	
	
	
	<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
		<a href="javascript:;" class="kt-menu__link kt-menu__toggle">
		<span class="kt-menu__link-icon"><i class="fa fa-users"></i></span>
		<span class="kt-menu__link-text">Admin Staffs</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>	
			<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
				<ul class="kt-menu__subnav">	
					<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
					<a href="<?php echo $this->Html->url('/admin/users/sadd',true); ?>" class="kt-menu__link kt-menu__toggle">
					<span class="kt-menu__link-icon"><i class="fa fa-user-plus"></i></span>											
					<span class="kt-menu__link-text"> Add Staff</span></a></li>															
					<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
					<a href="<?php echo $this->Html->url('/admin/users/sindex',true); ?>" class="kt-menu__link kt-menu__toggle">
					<span class="kt-menu__link-icon"><i class="fa fa-users"></i></span>											
					<span class="kt-menu__link-text"> View Staffs</span></a></li>						
				</ul>
			</div>
		</li>
	
		    
		
		 <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
		<a href="javascript:;" class="kt-menu__link kt-menu__toggle">
		<span class="kt-menu__link-icon"><i class="fa fa-gift"></i></span>
		<span class="kt-menu__link-text">Bonuses</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>	
			<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
				<ul class="kt-menu__subnav">						
					<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
					<a href="<?php echo $this->Html->url('/admin/transactions/capital_refund',true); ?>" class="kt-menu__link kt-menu__toggle">
					<span class="kt-menu__link-icon"><i class="fa fa-pen-square"></i></span>											
					<span class="kt-menu__link-text">Capital Refund</span></a></li>	
					
					<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
					<a href="<?php echo $this->Html->url('/admin/transactions/extra_commission',true); ?>" class="kt-menu__link kt-menu__toggle">
					<span class="kt-menu__link-icon"><i class="fa fa-pen-square"></i></span>											
					<span class="kt-menu__link-text">Extra Commission</span></a></li>	
					
					<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
					<a href="<?php echo $this->Html->url('/admin/transactions/upline_commission',true); ?>" class="kt-menu__link kt-menu__toggle">
					<span class="kt-menu__link-icon"><i class="fa fa-pen-square"></i></span>											
					<span class="kt-menu__link-text"> Upline Commission</span></a></li>	
					
					<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
					<a href="<?php echo $this->Html->url('/admin/transactions/bwhistory',true); ?>" class="kt-menu__link kt-menu__toggle">
					<span class="kt-menu__link-icon"><i class="fa fa-pen-square"></i></span>											
					<span class="kt-menu__link-text"> BW History</span></a></li>
					
					<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
					<a href="<?php echo $this->Html->url('/admin/transactions/commission_summary',true); ?>" class="kt-menu__link kt-menu__toggle">
					<span class="kt-menu__link-icon"><i class="fa fa-pen-square"></i></span>											
					<span class="kt-menu__link-text">Commission Summary</span></a></li>						
					
				</ul>
			</div>
		</li>
		
	<li class="kt-menu__item " aria-haspopup="true">
		<a href="<?php echo $this->Html->url('/admin/users/buy_position',true); ?>" class="kt-menu__link ">
		<i class="kt-menu__link-icon fa fa-edit"></i><span class="kt-menu__link-text">Buy Position</span></a></li>	
	 			
		<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
		<a href="javascript:;" class="kt-menu__link kt-menu__toggle">
		<span class="kt-menu__link-icon"><i class="fa fa-money-check-alt"></i></span>
		<span class="kt-menu__link-text">Subscription Orders Lists</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>	
			<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
				<ul class="kt-menu__subnav">											
								
					<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
					<a href="<?php echo $this->Html->url('/admin/invoices/index',true); ?>" class="kt-menu__link kt-menu__toggle">
					<span class="kt-menu__link-icon"><i class="fa fa-th-large"></i></span>											
					<span class="kt-menu__link-text">Subscription orders Lists</span></a></li>
					
					<?php /*?><li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
					<a href="<?php echo $this->Html->url('/admin/invoices/completed',true); ?>" class="kt-menu__link kt-menu__toggle">
					<span class="kt-menu__link-icon"><i class="fa fa-th-large"></i></span>											
					<span class="kt-menu__link-text">Completed Orders Lists</span></a></li>
					
					<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
					<a href="<?php echo $this->Html->url('/admin/invoices/canceled',true); ?>" class="kt-menu__link kt-menu__toggle">
					<span class="kt-menu__link-icon"><i class="fa fa-th-large"></i></span>											
					<span class="kt-menu__link-text">Cancelled/ Rejected Orders Lists</span></a></li><?php */?>
																									
				</ul>
			</div>
		</li>		
		
					
		
		<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
		<a href="javascript:;" class="kt-menu__link kt-menu__toggle">
		<span class="kt-menu__link-icon"><i class="fa fa-tree"></i></span>
		<span class="kt-menu__link-text">Networks</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>	
			<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
				<ul class="kt-menu__subnav">											
									
					<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
					<a href="<?php echo $this->Html->url('/admin/trees/index',true); ?>" class="kt-menu__link kt-menu__toggle">
					<span class="kt-menu__link-icon"><i class="fa fa-tree"></i></span>											
					<span class="kt-menu__link-text">Network Tree Users</span></a></li>
																								
				</ul>
			</div>
		</li>				
		
				
	<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
		<a href="javascript:;" class="kt-menu__link kt-menu__toggle">
		<span class="kt-menu__link-icon"><i class="fa fa-money-check-alt"></i></span>
		<span class="kt-menu__link-text">Transactions</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>								
		
			<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
				<ul class="kt-menu__subnav">					
											
					<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
					<a href="<?php echo $this->Html->url('/admin/transactions/wallet_statement',true); ?>" class="kt-menu__link kt-menu__toggle">
					<span class="kt-menu__link-icon"><i class="fa fa-money-check"></i></span>											
					<span class="kt-menu__link-text">Wallet Adjustment Statement</span></a></li>										
				</ul>
			</div>
		</li>

				
		<li class="kt-menu__item kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
		<a href="javascript:;" class="kt-menu__link kt-menu__toggle">
		 <span class="kt-menu__link-icon"><i class="fa fa-envelope"></i></span>
		  <span class="kt-menu__link-text">Email Templates</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>	
			<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
				<ul class="kt-menu__subnav">	
					<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
					<a href="<?php echo $this->Html->url('/admin/email_templates/index',true); ?>" class="kt-menu__link kt-menu__toggle">
					<span class="kt-menu__link-icon"><i class="fa fa-envelope"></i></span>											
					<span class="kt-menu__link-text"> View Email Templates</span></a></li>															
				</ul>
			</div>
		</li>	
		
							
		
   <li class="kt-menu__item " aria-haspopup="true">
		<a href="<?php echo $this->Html->url('/users/logout',true); ?>" class="kt-menu__link ">
		<span class="kt-menu__link-icon"><i class="fa fa-power-off"></i></span>
		<span class="kt-menu__link-text">Logout</span></a></li>								

		
	</ul>
</div>
</div>