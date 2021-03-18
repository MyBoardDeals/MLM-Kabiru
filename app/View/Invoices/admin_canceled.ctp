<?php echo $this->Html->script('jquery-1.9.1'); ?>	
<?php echo $this->Html->script('jquery-ui'); ?>	
<script>
 getsearch=function(){
	$key=$('#key').val();	
	$fdate=$('#fdate').val();
	$tdate=$('#tdate').val();
	
	if($fdate.length!=10 || $tdate.length!=10){
	  $fdate=0;
	  $tdate=0;
	} 
   window.location.href='<?php echo Configure::read('siteUrl');?>admin/invoices/canceled/'+$fdate+'/'+$tdate+'/'+$key;   
   }
   
   
$(function() {
	$( "#fdate" ).datepicker({format: 'yyyy-mm-dd'});
	$( "#tdate" ).datepicker({format:"yyyy-mm-dd"});	
});

</script>
<div class="kt-subheader  kt-grid__item" id="kt_subheader">
							<div class="kt-container  kt-container--fluid ">
								<div class="kt-subheader__main">
									<h3 class="kt-subheader__title">
										Subscription Orders </h3>									
								</div>
								<div class="kt-subheader__toolbar">
						 <div class="kt-subheader__wrapper">
		<a href="<?php echo $this->Html->url('/admin/invoices/index',true);?>" class="btn btn-label-primary" ><i class="fa fa-history"></i> Pending History</a>	
        <a href="<?php echo $this->Html->url('/admin/invoices/completed',true);?>" class="btn btn-label-success" ><i class="fa fa-history"></i> Completed History</a>		
		<a href="<?php echo $this->Html->url('/admin/invoices/canceled',true);?>" class="btn btn-label-danger" ><i class="fa fa-history"></i> Canceled History</a>					  
						 </div>
						</div>
																
							</div>
						</div>							
	<div class="kt-container kt-container--fluid  kt-grid__item kt-grid__item--fluid">		
	 <div class="row alert alert-light">
     <div class="col-2">
          <input type="text" class="form-control" id="fdate" readonly placeholder="Select From Date"/>
     </div>
	 <div class="col-2">
          <input type="text" class="form-control" id="tdate" readonly placeholder="Select To Date"/>
    </div>	
	 <div class="col-3">
          <input name="key" class="form-control" placeholder="Search by username" type="text" id="key" value="" />	
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
								View Cancelled Subscription History
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
           <th width="6%"><a>No</a></th>
		   <th width="13%"><?php echo $this->Paginator->sort('created','Date'); ?></th>
		   <th width="22%"><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th width="10%"><?php echo $this->Paginator->sort('amount','Amount'); ?></th>		
			<th width="28%"><?php echo $this->Paginator->sort('remarks'); ?></th>		
			<th width="13%"><?php echo $this->Paginator->sort('payment_date','Cancelled Date'); ?></th>					
				
			<th width="8%"><a>Action</a></th>	
      </tr>	
	  </thead>
	  <tbody>
   <?php if(count($results)>0): ?>		  	
	<?php foreach ($results as $k=>$result): ?>
	<tr>
	     <td ><?php echo h($k+1); ?></td>
		 <td ><?php echo date('m/d/Y',strtotime($result['Invoice']['created'])); ?></td>
	       <td ><?php echo h($result['User']['username']); ?> (<?php echo h($result['User']['first_name']); ?> <?php echo h($result['User']['last_name']); ?>)</td>
	   
	
	     <td ><?php echo h($result['Invoice']['amount']); ?></td>
	
		<td ><?php echo h($result['Invoice']['remarks']); ?></td>			
		<td ><?php echo date('m/d/Y',strtotime($result['Invoice']['payment_date'])); ?></td>
		
		
			<td align="center"  class="center">			
			<a href="<?php echo $this->Html->url('/admin/invoices/view/'.$result['Invoice']['id']); ?>">
			<i class="fa fa-th"></i></a>	
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
	
