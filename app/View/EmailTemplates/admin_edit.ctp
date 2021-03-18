<?php echo $this->Html->script('/js/tinymce/tinymce.min'); ?>
<script type="text/javascript">
 tinymce.init({selector: "textarea",
 plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern imagetools"
    ],
 toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
 toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor | print preview code ",
 image_advtab: true , 
 relative_urls: false
 });
 </script>
 
<div class="kt-subheader  kt-grid__item" id="kt_subheader">
							<div class="kt-container  kt-container--fluid ">
								<div class="kt-subheader__main">
									<h3 class="kt-subheader__title">Email Templates</h3>	
								</div>	
								<div class="kt-subheader__toolbar">
						 <div class="kt-subheader__wrapper">				
                <a href="<?php echo $this->Html->url('/admin/email_templates/index',true);?>" class="btn btn-label-danger"><i class="fa fa-envelope"></i> View Email Templates</a>	
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
						Edit Email Template
					</h3>
				</div>
			</div>			   
			 <?php echo $this->Form->create('EmailTemplate',array('class'=>'kt-form kt-form--label-right','enctype'=>'multipart/form-data')); ?>
			<?php echo $this->Form->input('id'); ?>	
				
				<div class="kt-portlet__body">
					
								<?php echo $this->Session->flash(); ?>							
					
					
					<div class="form-group row">
												<label class="col-3 col-form-label">Subject</label>
												<div class="col-7">
                                                    <?php		
		echo $this->Form->input('email_subject',array('required'=>'required','class'=>'form-control','label'=>false,'div'=>false));?>
												</div>
											</div>
                                           
											<div class="form-group row">
												<label class="col-3 col-form-label">Address</label>
												<div class="col-7">
		<?php echo $this->Form->input('email_address',array('required'=>'required','class'=>'form-control','label'=>false,'div'=>false));?>
												</div>
											</div>
											
								<div class="form-group row">
												<label class="col-3 col-form-label">Message</label>
												<div class="col-7">
		                          <?php echo $this->Form->input('email_message',array('label'=>false,'div'=>false));?>
												</div>
											</div>				
											
							<div class="form-group row">
												<label class="col-3 col-form-label">Status</label>
												<div class="col-7" style="padding-top:10px;">		                         
<input type="radio" value="1" <?php if($this->request->data['EmailTemplate']['status']==1){ ?> checked="checked" <?php } ?> name="data[EmailTemplate][status]">Active
<input type="radio" value="0" <?php if($this->request->data['EmailTemplate']['status']==0){ ?> checked="checked" <?php } ?> name="data[EmailTemplate][status]">Inactive
										 
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