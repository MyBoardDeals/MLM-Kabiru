<div class="kt-subheader  kt-grid__item" id="kt_subheader">
							<div class="kt-container  kt-container--fluid ">
								<div class="kt-subheader__main">
									<h3 class="kt-subheader__title">
										Groups </h3>									
								</div>	
								<div class="kt-subheader__toolbar">
						 <div class="kt-subheader__wrapper">		
		<?php /*?><a href="<?php echo $this->Html->url('/admin/groups/add',true);?>" class="btn btn-primary"><i class="fa fa-plus"></i> Create Group</a><?php */?>
			<a href="<?php echo $this->Html->url('/admin/groups/index',true);?>" class="btn btn-danger"><i class="fa fa-group"></i> View Groups</a>
						  
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
						Edit Group
					</h3>
				</div>
			</div>			   
			 <?php echo $this->Form->create('Group',array('class'=>'kt-form kt-form--label-right','enctype'=>'multipart/form-data')); ?>
						<?php echo $this->Form->input('id'); ?>	
				
				<div class="kt-portlet__body">
					<?php echo $this->Session->flash(); ?>					
					<div class="form-group row">
						<label for="example-text-input" class="col-4 col-form-label">Name</label>
						<div class="col-5">
						<?php echo $this->Form->input('name',array('required'=>'required','class'=>'form-control','label'=>false,'div'=>false));?>
						</div>
					</div>					
												
										
				</div>				
				<div class="kt-portlet__foot">
					<div class="kt-form__actions">
						<div class="row">
							<div class="col-4"></div>
							<div class="col-5">
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










