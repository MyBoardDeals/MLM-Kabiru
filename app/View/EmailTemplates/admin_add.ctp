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
			<a href="<?php echo $this->Html->url('/admin/email_templates/index',true);?>" class="btn btn-danger"><i class="glyphicon glyphicon-list-alt"></i> View Email Templates</a>
			</div>
			<?php /*?><div class="col-md-3 col-sm-3">
			<a href="<?php echo $this->Html->url('/admin/users/csv',true);?>" class="pull-right"><?php echo $this->Html->image('csv.png',array('alt'=>'','width'=>25));?></a>
			</div><?php */?>
				
	</div>			
		
<div class="row">
				<div class="col-md-12">					
				<div class="portlet box blue">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-user"></i>Add User
										</div>
										
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
															
<?php echo $this->Form->create('User',array('class'=>'form-horizontal')); ?>

 
 
 
 
<div class="row">	
<div class="col-md-12 col-sm-8 clearfix">
<?php /*?><a href="<?php echo $this->Html->url('/admin/email_templates/add',true);?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> <span class="menutitle">Create Email Template</span></a>&nbsp;<?php */?><a href="<?php echo $this->Html->url('/admin/email_templates/index',true);?>" class="btn btn-success"><i class="glyphicon glyphicon-list-alt"></i> <span class="menutitle">View Email Templates</span></a>
</div>
</div>
<hr>
<h3><?php echo __('Create Email Templates'); ?></h3>


<div class="users form">
<?php echo $this->Form->create('EmailTemplate',array('enctype'=>'multipart/form-data')); ?>
	<fieldset>
			
	    <?php 
		echo $this->Form->input('email_subject',array('required'=>'required'));
		echo $this->Form->input('email_address',array('required'=>'required'));
		echo $this->Form->input('email_message');
		echo $this->Form->radio('status',array('Inactive','Active'),array('value' =>1));	
		?>				
	<?php echo $this->Form->end(__('Save')); ?>
	</fieldset>
</div>