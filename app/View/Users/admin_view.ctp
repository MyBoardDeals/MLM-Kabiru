<div class="kt-subheader  kt-grid__item" id="kt_subheader">
							<div class="kt-container  kt-container--fluid ">
								<div class="kt-subheader__main">
									<h3 class="kt-subheader__title">Users</h3>	
								</div>	
								<div class="kt-subheader__toolbar">
						 <div class="kt-subheader__wrapper">
		<a href="<?php echo $this->Html->url('/admin/users/add',true);?>" class="btn btn-label-primary"><i class="fa fa-plus-square"></i> Create User</a>
		<a href="<?php echo $this->Html->url('/admin/users/index',true);?>" class="btn btn-label-success"><i class="fa fa-users"></i> Active Users</a>
		<a href="<?php echo $this->Html->url('/admin/users/inactive',true);?>" class="btn btn-label-info"><i class="fa fa-user-times"></i> Inactive Users</a>
			<a href="<?php echo $this->Html->url('/admin/users/suspended',true);?>" class="btn btn-label-danger"><i class="fa fa-user-times"></i> Suspended Users</a>	  
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
								View User Details
							</h3>
						</div>
					</div>
					<div class="kt-portlet__body">	
						<div class="kt-section">							
							<div class="kt-section__content">
							<table class="table table-bordered" width="100%">
							<thead>
							<tr>
    <td width="30%"><?php echo __('Id'); ?></td>
    <td width="70%"><?php echo h($user['User']['id']); ?></td>
  </tr>
   
   <tr>
    <td width="30%">E-Wallet</td>
    <td width="70%"><?php echo h($currency.$user['User']['ewallet']); ?> </td>
  </tr>

  <tr>
    <td><?php echo __('First Name'); ?></td>
    <td><?php echo h($user['User']['first_name']); ?></td>
  </tr>
 
  <tr>
    <td><?php echo __('Last Name'); ?></td>
    <td><?php echo h($user['User']['last_name']); ?></td>
  </tr>
  <tr>
    <td><?php echo __('Username'); ?></td>
    <td><?php echo h($user['User']['username']); ?></td>
  </tr>


  <tr>
    <td><?php echo __('Gender'); ?></td>
    <td><?php echo h($user['Gender']['name']); ?></td>
  </tr>
  
   <tr>
    <td><?php echo __('Email'); ?></td>
    <td><?php echo h($user['User']['email']); ?></td>
  </tr>
  <tr>
    <td><?php echo __('Mobile No'); ?></td>
    <td><?php echo h($user['User']['mobile_no']); ?></td>
  </tr>
   <tr>
    <td>Address</td>
    <td><?php echo h($user['User']['address']); ?></td>
  </tr>
   
   <tr>
	<td><?php echo __('Country'); ?></td>
	<td><?php echo h($user['Country']['name']); ?></td>
	</tr>
   
	 <tr>
	<td><?php echo __('State'); ?></td>
	<td><?php echo h($user['User']['state']); ?></td>	
	</tr>
		
	
	<tr>
	<td><?php echo __('City'); ?></td>
	<td><?php echo h($user['User']['city']); ?></td>	
	</tr>
	
	<tr>
	<td>Zip Code</td>
	<td><?php echo h($user['User']['zip_code']); ?></td>	
	</tr>
			
		
	<tr>
    <td><?php echo __('Created'); ?></td>
    <td><?php echo h($user['User']['created']); ?></td>
  </tr>
  </thead>
</table>
										
																			
								</div>
							</div>
						</div>
					</div>					
				</div>			
			</div>	
	</div>