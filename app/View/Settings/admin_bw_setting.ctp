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
						View/ Edit BW Settings
					</h3>
				</div>
			</div>			   
			 <?php echo $this->Form->create('Setting',array('class'=>'kt-form kt-form--label-right','enctype'=>'multipart/form-data')); ?>
			<?php echo $this->Form->input('id'); ?>											
				
				<div class="kt-portlet__body">					
					<?php echo $this->Session->flash(); ?>	
					
					<div class="form-group row">
						<label for="example-search-input" class="col-4 col-form-label">Unique Entry  BW<br/>(up to 5 sponsor's parents upperlines)</label>
						<div class="col-5">
							 <?php echo $this->Form->input('bwpoint',array('required'=>'required','class'=>'form-control','label'=>false,'div'=>false));?>
						</div>
					</div>				
					
				</div>
				<div class="kt-portlet__foot">
					<div class="kt-form__actions">
						<div class="row">
							<div class="col-4">
							</div>
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