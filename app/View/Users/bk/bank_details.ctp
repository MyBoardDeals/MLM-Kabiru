						<div class="kt-subheader   kt-grid__item" id="kt_subheader">
								<div class="kt-container ">
									<div class="kt-subheader__main">
										<h3 class="kt-subheader__title">Bank Details</h3>										
									</div>									
								</div>								
							</div>
						
						<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
											
						<div class="row">	
	<div class="col-lg-12">
		
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
						Edit Bank Details
					</h3>
				</div>
			</div>			
			<?php echo $this->Form->create('User',array('class'=>'kt-form','enctype'=>'multipart/form-data')); ?>
              <?php echo $this->Form->input('id');?> 
				<div class="kt-portlet__body">
				
				<?php echo $this->Session->flash(); ?>
					<div class="kt-section kt-section--first">
						
						<div class="kt-section__body">
						
						
		
		<div class="form-group row">
			<label class="col-xl-3 col-lg-3 col-form-label">Account Holder Name</label>
			<div class="col-lg-9 col-xl-9">
				  <?php echo $this->Form->input('account_name',array('required'=>'required','class'=>'form-control','label'=>false,'div'=>false));?>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-xl-3 col-lg-3 col-form-label">Account Number</label>
			<div class="col-lg-9 col-xl-9">
				  <?php echo $this->Form->input('account_no',array('required'=>'required','class'=>'form-control','label'=>false,'div'=>false));?>
			</div>
		</div>
			
			<div class="form-group row">
			<label class="col-xl-3 col-lg-3 col-form-label">Bank Name</label>
			<div class="col-lg-9 col-xl-9">
				  <?php		
                    echo $this->Form->input('bank_name',array('required'=>'required','class'=>'form-control','label'=>false,'div'=>false));?>
			</div>
		</div>	
		
		<div class="form-group row">
			<label class="col-xl-3 col-lg-3 col-form-label">Bank Branch</label>
			<div class="col-lg-9 col-xl-9">
				  <?php echo $this->Form->input('bank_branch',array('required'=>'required','class'=>'form-control','label'=>false,'div'=>false));?>
			</div>
		</div>					
			<div class="form-group row">
			<label class="col-xl-3 col-lg-3 col-form-label">Swift Code</label>
			<div class="col-lg-9 col-xl-9">
				  <?php echo $this->Form->input('swift_code',array('required'=>'required','class'=>'form-control','label'=>false,'div'=>false));?>
			</div>
		</div>				
						
						
						</div>				
							
			            </div>
		          
	            <div class="kt-portlet__foot">
					<div class="kt-form__actions">
						<div class="row">
							<div class="col-lg-3"></div>
							<div class="col-lg-6">
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
	            </div>