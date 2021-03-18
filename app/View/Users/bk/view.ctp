<div class="title"><h5>User</h5></div>      
<section class="widget first">
<div class="pagehead"><h5 class="iGraph"><?php  echo __('User Details'); ?></h5></div>
<div class="body">
<section class="details_form">




	<ul>
		<li class="text"><label for="ID"><?php echo __('Id'); ?></label></li>	
			<?php echo h($user['User']['id']); ?>
		<li class="text"><label for="ID"><?php echo __('Created'); ?></li>
		
			<?php echo h($user['User']['created']); ?>
			
		
		<li class="text"><label for="ID"><?php echo __('Modified'); ?></li>
		
			<?php echo h($user['User']['modified']); ?>
			
		
			
		<li class="text"><label for="ID"><?php echo __('First Name'); ?></li>
		
			<?php echo h($user['User']['first_name']); ?>
			
		
		<li class="text"><label for="ID"><?php echo __('Middle Name'); ?></li>
		
			<?php echo h($user['User']['middle_name']); ?>
			
		
		<li class="text"><label for="ID"><?php echo __('Last Name'); ?></li>
		
			<?php echo h($user['User']['last_name']); ?>
			
		
		<li class="text"><label for="ID"><?php echo __('Username'); ?></li>
		
			<?php echo h($user['User']['username']); ?>
			
		
	
			
		
		
			
		
		<li class="text"><label for="ID"><?php echo __('Mobile No'); ?></li>
		
			<?php echo h($user['User']['mobile_no']); ?>
			
		
	</dl>

	</section>
</div>
</section>

