<div class="kt-subheader  kt-grid__item" id="kt_subheader">
							<div class="kt-container  kt-container--fluid ">
								<div class="kt-subheader__main">
									<h3 class="kt-subheader__title">
										Countries </h3>									
								</div>	
								<div class="kt-subheader__toolbar">
						 <div class="kt-subheader__wrapper">		
					<a href="<?php echo $this->Html->url('/admin/countries/add',true);?>" class="btn btn-label-info"><i class="fa fa-plus-square"></i> Add Country</a>
					<a href="<?php echo $this->Html->url('/admin/countries/index',true);?>" class="btn btn-label-danger"><i class="fa fa-question-circle"></i> View Countries</a>
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
						Add Country
					</h3>
				</div>
			</div>			   
			 <?php echo $this->Form->create('Country',array('class'=>'kt-form kt-form--label-right','enctype'=>'multipart/form-data')); ?>
												
				
				<div class="kt-portlet__body">					
					<?php echo $this->Session->flash(); ?>						
					<div class="form-group row">
						<label for="example-text-input" class="col-3 col-form-label">Country Name</label>
						<div class="col-7">
					      <?php echo $this->Form->input('name',array('required'=>'required','class'=>'form-control','label'=>false,'div'=>false));?>			
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