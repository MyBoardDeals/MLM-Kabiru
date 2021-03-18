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
 relative_urls: false,
 
 external_filemanager_path:"<?php echo Configure::read('jsPath');?>ResponsiveFilemanager/filemanager/",
 filemanager_title:"File manager" ,
 external_plugins: { "filemanager" : "<?php echo Configure::read('jsPath');?>ResponsiveFilemanager/filemanager/plugin.min.js"}
 });
 </script>
 
 <div class="page-content">	

	<div class="row margin-bottom-20">
			<div class="col-md-9 col-sm-9">
			<a href="<?php echo $this->Html->url('/admin/pages/view',true);?>" class="btn btn-success"><i class="icon-docs"></i> View CMS Pages</a>
			</div>
			
	</div>			
		
<div class="row">
				<div class="col-md-12">					
				<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-pencil"></i>Edit Page
										</div>
										
									</div>
									<div class="portlet-body form">
                                    <?php echo $this->Form->create('Page',array('class'=>'form-horizontal','enctype'=>'multipart/form-data')); ?>
									<?php echo $this->Form->input('id'); ?>
										<div class="form-body">
										
											<div class="form-group">
												<label class="col-md-3 control-label">Page Title</label>
												<div class="col-md-4">
                                                   <?php echo $this->Form->input('page_title',array('required'=>'required','class'=>'form-control','label'=>false,'div'=>false));?>
												</div>
											</div>
                                           
											<div class="form-group">
												<label class="col-md-3 control-label">Page Description</label>
												<div class="col-md-8">
                                                   <?php echo $this->Form->input('page_description',array('label'=>false,'div'=>false));?>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label">&nbsp;</label>
												<div class="col-md-4">
                                                  <button type="submit" value="save" class="btn blue">Update</button>
												</div>
											</div>
											
										
                                                
									</div>
								</form>
							</div>



	
</div>
</div>
</div>
</div>
</div>