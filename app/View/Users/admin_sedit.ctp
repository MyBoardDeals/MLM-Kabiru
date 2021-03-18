<style>
.formcontrol {
    border: 1px solid #dadada;
    padding: 6px 2px;
}

</style>

<div class="kt-subheader  kt-grid__item" id="kt_subheader">
							<div class="kt-container  kt-container--fluid ">
								<div class="kt-subheader__main">
									<h3 class="kt-subheader__title">Staffs</h3>	
								</div>	
								<div class="kt-subheader__toolbar">
						 <div class="kt-subheader__wrapper">
		<a href="<?php echo $this->Html->url('/admin/users/sadd',true);?>" class="btn btn-label-primary"><i class="fa fa-plus-square"></i> Add Staff</a>
		<a href="<?php echo $this->Html->url('/admin/users/sindex',true);?>" class="btn btn-label-danger"><i class="fa fa-users"></i> View Staffs</a>
						 </div>
						</div>							
						</div>
						</div>
						
	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
  <div class="row">
  <div class="col-md-12">
   <div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
						Add Staff
					</h3>
				</div>
			</div>			   
			 <?php echo $this->Form->create('User',array('class'=>'kt-form kt-form--label-right','enctype'=>'multipart/form-data')); ?>
			  <?php echo $this->Form->input('id'); ?>				
				
				<div class="kt-portlet__body">					
					<?php echo $this->Session->flash(); ?>																	
											
										
											
													<div class="form-group row">
													<label class="col-3 col-form-label">Username</label>
													<div class="col-5">                                                   	
										 <?php	echo $this->Form->input('username',array('required'=>'required','class'=>'form-control','label'=>false,'div'=>false));	?>
													</div>
												</div>								
												
												<div class="form-group row">
													<label class="col-3 col-form-label">Password</label>
													<div class="col-5">
														<div class="input-group">
															<input type="password" placeholder="Password" name="data[User][password]" class="form-control">
															<span class="input-group-addon">
															<span class="glyphicon glyphicon-lock"></span>
															</span>
														</div>
													</div>
												</div>
												
												<div class="form-group row">
													<label class="col-3 col-form-label">First Name</label>
													<div class="col-5">                                                   	
										 <?php	echo $this->Form->input('first_name',array('required'=>'required','class'=>'form-control','label'=>false,'div'=>false));	?>
													</div>
												</div>
												
                                                <div class="form-group row">
													<label class="col-3 col-form-label">Last Name</label>
													<div class="col-5">
                                                    <?php		
										echo $this->Form->input('last_name',array('required'=>'required','class'=>'form-control','label'=>false,'div'=>false));?>
													</div>
												</div>									
												
												<div class="form-group row">
													<label class="col-3 col-form-label">Gender</label>
													<div class="col-5">
                                                    <?php		
										echo $this->Form->input('gender_id',array('required'=>'required','empty'=>'Select','class'=>'form-control','label'=>false,'div'=>false));?>
													</div>
												</div>												
												<div class="form-group row">
													<label class="col-3 col-form-label">Email</label>
													<div class="col-5">
                                                    <?php		
										echo $this->Form->input('email',array('required'=>'required','class'=>'form-control','label'=>false,'div'=>false));?>
													</div>
												</div>
																								
												<div class="form-group row">
													<label class="col-3 col-form-label">Mobile No</label>
													<div class="col-5">
                                                    <?php		
										echo $this->Form->input('mobile_no',array('class'=>'form-control','label'=>false,'div'=>false));?>
													</div>
												</div>												
												<div class="form-group row">
													<label class="col-3 col-form-label">Address</label>
													<div class="col-5">
                                                    <?php		
										echo $this->Form->input('address',array('required'=>'required','class'=>'form-control','label'=>false,'div'=>false));?>
													</div>
												</div>
												
												
												
												   <div class="form-group row">
												<label class="col-3 col-form-label">Country</label>
												<div class="col-5">
								 <?php		
					echo $this->Form->input('country_id',array('required'=>'required','class'=>'form-control','label'=>false,'div'=>false));?>				
												
                                                  
												</div>
											</div> 
											
											
                                               <div class="form-group row">
													<label class="col-3 col-form-label">Group</label>
													<div class="col-5">
                                                    <?php		
										echo $this->Form->input('group_id',array('required'=>'required','class'=>'form-control','label'=>false,'div'=>false));?>
													</div>
												</div>																			
					
				</div>
				<div class="kt-portlet__foot">
					<div class="kt-form__actions">
						<div class="row">
							<div class="col-3">
							</div>
							<div class="col-9">
								<button type="submit" class="btn btn-success">Update</button>								
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
</div>
</div>
</div>