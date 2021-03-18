<script>
 getsearch=function(){
   $key=$('#key').val(); 
   window.location.href='<?php echo Configure::read('siteUrl');?>admin/trees/index/'+$key;
 }
</script>

<div class="kt-subheader kt-grid__item" id="kt_subheader">
			<div class="kt-container  kt-container--fluid ">
				<div class="kt-subheader__main">
					<h3 class="kt-subheader__title">
						Networks </h3>									
				</div>
				<div class="kt-subheader__toolbar">
		 <div class="kt-subheader__wrapper">
<a href="<?php echo $this->Html->url('/admin/trees/index',true);?>" class="btn btn-label-primary"><i class="fa fa-sitemap"></i>Network Tree Users</a>
		  
		 </div>
		</div>								
			</div>
		</div>	
												
	<div class="kt-container kt-container--fluid  kt-grid__item kt-grid__item--fluid">		
	
	<div class="row alert alert-light">	
	 <div class="col-3">
         <input name="key" class="form-control" placeholder="Search by Username" type="text" id="key" value="" />
    </div>
	 <div class="col-2">
          <input type="button" class="btn btn-danger" value="Search" onclick="getsearch();" />
    </div>
</div>
	
		<div class="row">			
			<div class="col-xl-6">				
				<div class="kt-portlet">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">
								 View Tree Users
							</h3>
						</div>
					</div>
					<div class="kt-portlet__body">														
								
						<div class="kt-section">
							
							<div class="kt-section__content">
								<div class="table-responsive">
								<table class="table table-bordered" width="100%">
							<thead>
							<tr>
						<th width="7%"><a>No</a></th>
						<th width="28%"><?php echo $this->Paginator->sort('user_id'); ?></th>
						<th width="21%"><a href="#">Sponsor</a></th>
						<th width="22%"><?php echo $this->Paginator->sort('associate_user_id','Attached To'); ?></th> 					    
						<th width="14%"><?php echo $this->Paginator->sort('level','Matrix Level'); ?></th>				
							
						<th width="8%" ><a>Action</a></th>
                    </tr>
	             </thead>
	         <tbody>
	   <?php if(count($trees)>0): ?>
      <?php foreach ($trees as $k=>$tree):  ?>
      <tr>	  
		<td align="center"><?php echo h($k+1); ?></td>
		<td align="center"><?php echo h($tree['ViewTree']['username']); ?> (<?php echo h($tree['ViewTree']['first_name']); ?> <?php echo h($tree['ViewTree']['last_name']); ?>)</td>
		<td align="center"><?php echo h($tree['ViewTree']['susername']); ?></td>
		<td align="center"><?php echo h($tree['ViewTree']['as_username']); ?> (<?php echo h($tree['ViewTree']['as_first_name']); ?> <?php echo h($tree['ViewTree']['as_last_name']); ?>)</td>	       
<td align="center"><?php echo h($tree['ViewTree']['level']); ?></td>

        <td width="8%" align="center" class="center">
		<a href="<?php echo $this->Html->url('/admin/trees/matrix/'.$tree['ViewTree']['position_id']); ?>" title="Tree View"><i class="fa fa-tree"></i></a>		
		<a href="<?php echo $this->Html->url('/admin/trees/genealogy/'.$tree['ViewTree']['position_id']); ?>" title="Genealogy View"><i class="fa fa-sitemap"></i></a>			
		</td>
      </tr>
      <?php endforeach; ?>
	  <?php endif; ?>
	  </tbody>
    </table>				
								</div>
							</div>
						</div>
					</div>					
				</div>			
			</div>
		</div>
		
		<div class="row">
								<div class="col-xl-12">								
									<div class="kt-portlet">
										<div class="kt-portlet__body">
										
	<?php echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'))); ?>	
											<div class="kt-pagination kt-pagination--brand">
											
												<ul class="kt-pagination__links">
													 <?php 
                    echo $this->Paginator->prev( '<', array( 'class' => '', 'tag' => 'li' ), null, array( 'class' => 'kt-pagination__link--first', 'tag' => 'li' ) );
                    echo $this->Paginator->numbers( array( 'tag' => 'li', 'separator' => '', 'currentClass' => 'kt-pagination__link--active' ) );
                    echo $this->Paginator->next( '>', array( 'class' => '', 'tag' => 'li' ), null, array( 'class' => 'kt-pagination__link--last', 'tag' => 'li' ) );
                ?>
												</ul>												
											</div>

											
										</div>
									</div>

									
								</div>
							</div>
	</div>

