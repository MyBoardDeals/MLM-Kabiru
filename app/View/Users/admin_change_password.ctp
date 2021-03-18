<div class="kt-subheader kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
              <h3 class="kt-subheader__title">Settings</h3>
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
						Change Password
					</h3>
				</div>
			</div>			   
			 <?php echo $this->Form->create('User',array('class'=>'kt-form kt-form--label-right','enctype'=>'multipart/form-data')); ?>
			<?php echo $this->Form->input('id'); ?>											
				
				<div class="kt-portlet__body">					
					<?php echo $this->Session->flash(); ?>						
					<div class="form-group row">
						<label for="example-text-input" class="col-3 col-form-label">Username</label>
						<div class="col-5">
					 <?php echo $this->Form->input('username',array('required'=>'required','class'=>'form-control','label'=>false,'div'=>false));?>
						</div>
					</div>
					
					<div class="form-group row">
						<label for="example-search-input" class="col-3 col-form-label">Password</label>
						<div class="col-5">
							<input name="data[User][password]" required="required" class="form-control" value="" id="UserPassword" type="password">				
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