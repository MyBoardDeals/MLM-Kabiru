                       <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper"></div>								
						<div class="kt-header__topbar">										
							
							
							<div class="kt-header__topbar-item kt-header__topbar-item--langs">
								<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
									<span class="kt-header__topbar-icon">
										<img class="" src="<?php echo Configure::read('assetsPath');?>media/flags/020-flag.svg" alt="" />
									</span>
								</div>
							   </div>
							
							<div class="kt-header__topbar-item kt-header__topbar-item--user">
								<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
									<div class="kt-header__topbar-user">
										<span class="kt-header__topbar-welcome kt-hidden-mobile">Hi,</span>										
										<span class="kt-header__topbar-username kt-hidden-mobile"><?php echo $display_name;?></span>										
										<img alt="Pic" src="<?php echo Configure::read('App.FilePath');?>user/thumb/user.png<?php //echo $photo_url;?>" />										
										<span class="kt-hidden kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">S</span>
										
									</div>
								</div>
								<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">									
							<div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url(<?php echo Configure::read('assetsPath');?>media/misc/bg-1.jpg)">
										<div class="kt-user-card__avatar">
											<img alt="Pic" src="<?php echo Configure::read('App.FilePath');?>user/thumb/user.png<?php //echo $photo_url;?>" />										
											
										</div>
										<div class="kt-user-card__name">
											<?php echo $display_name;?>
										</div>										
									</div>
									
									<div class="kt-notification">
										<a href="<?php echo $this->Html->url('/admin/pages/index',true);?>" class="kt-notification__item">
											<div class="kt-notification__item-icon">
												<i class="flaticon-home kt-font-success"></i>
											</div>
											<div class="kt-notification__item-details">
												<div class="kt-notification__item-title kt-font-bold">
													Dashboard
												</div>
												<div class="kt-notification__item-time">
													Website statistics and more
												</div>
											</div>
										</a>
										<a href="<?php echo $this->Html->url('/admin/settings/index',true);?>" class="kt-notification__item">
											<div class="kt-notification__item-icon">
												<i class="flaticon-cogwheel kt-font-success"></i> 


											</div>
											<div class="kt-notification__item-details">
												<div class="kt-notification__item-title kt-font-bold">
													Settings
												</div>
												<div class="kt-notification__item-time">
													Website settings and more
												</div>
											</div>
										</a>
										<a href="<?php echo $this->Html->url('/admin/users/change_password',true);?>" class="kt-notification__item">
											<div class="kt-notification__item-icon">
												<i class="flaticon2-lock kt-font-warning"></i>
											</div>
											<div class="kt-notification__item-details">
												<div class="kt-notification__item-title kt-font-bold">
													Change Password
												</div>
												<div class="kt-notification__item-time">
													Reset admin password
												</div>
											</div>
										</a>
										<a href="<?php echo $this->Html->url('/admin/users/index',true);?>" class="kt-notification__item">
											<div class="kt-notification__item-icon">
												<i class="flaticon2-user kt-font-danger"></i>
											</div>
											<div class="kt-notification__item-details">
												<div class="kt-notification__item-title kt-font-bold">
													Users
												</div>
												<div class="kt-notification__item-time">
													Active Users
												</div>
											</div>
										</a>
										<a href="<?php echo $this->Html->url('/admin/users/sindex',true);?>" class="kt-notification__item">
											<div class="kt-notification__item-icon">
												<i class="flaticon2-user kt-font-brand"></i>
											</div>
											<div class="kt-notification__item-details">
												<div class="kt-notification__item-title kt-font-bold">
													Admin Staff 
												</div>
												<div class="kt-notification__item-time">
													Admin Staff
												</div>
											</div>
										</a>
										
										<div class="kt-notification__custom kt-space-between">
											<a href="<?php echo $this->Html->url('/admin/users/logout',true);?>" class="btn btn-label btn-label-brand btn-sm btn-bold">Sign Out</a>
											
										</div>
									</div>									
								</div>
							</div>						
						</div>



