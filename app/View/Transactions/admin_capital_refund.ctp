<?php echo $this->Html->script('jquery-1.9.1'); ?>	
<?php echo $this->Html->script('jquery-ui'); ?>	
<script>
getserach=function(){
   
	$username=$('#username').val();
	$fdate=$('#fdate').val();
	$tdate=$('#tdate').val();
	
	if($fdate.length!=10 || $tdate.length!=10){
	   $fdate=0;
	   $tdate=0;
	} 	
	if($username.length==0){
	   $username=0;
	}
   
   window.location.href='<?php echo Configure::read('siteUrl');?>admin/transactions/capital_refund/'+$fdate+'/'+$tdate+'/'+$username; 
}


$(function() {
	$( "#fdate" ).datepicker({format: 'yyyy-mm-dd'});
	$( "#tdate" ).datepicker({format:"yyyy-mm-dd"});	
});

</script>

 <div class="kt-subheader  kt-grid__item" id="kt_subheader">
 
							<div class="kt-container  kt-container--fluid ">
								<div class="kt-subheader__main">
									<h3 class="kt-subheader__title">Bonus</h3>	
								</div>	
								<div class="kt-subheader__toolbar">
						 <div class="kt-subheader__wrapper">
<a href="<?php echo $this->Html->url('/admin/transactions/capital_refund',true);?>" class="btn btn-label-primary">Capital Refund</a>
<a href="<?php echo $this->Html->url('/admin/transactions/extra_commission',true);?>" class="btn btn-label-success">Extra Commission</a>						
<a href="<?php echo $this->Html->url('/admin/transactions/upline_commission',true);?>" class="btn btn-label-info">Upline Commission</a>
						 </div>
						</div>							
						</div>
						</div>	
												
	<div class="kt-container kt-container--fluid  kt-grid__item kt-grid__item--fluid">	
	
	<div class="row alert alert-light">
     <div class="col-md-2 col-12">
          <input type="text" class="form-control" id="fdate" readonly placeholder="Select From Date"/>
     </div>
	 <div class="col-md-2 col-12">
          <input type="text" class="form-control" id="tdate" readonly placeholder="Select To Date"/>
    </div>		
	 <div class="col-md-2 col-12">
          <input name="username" id="username" class="form-control" placeholder="Username" type="text" value="" />	
    </div>
	 <div class="col-md-2 col-12">
          <input type="button" class="btn btn-danger btn-block" value="Search" onclick="getsearch();" />
    </div>
</div>
								
		
		<div class="row">			
			<div class="col-xl-6">				
				<div class="kt-portlet">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">
								View Capital Refund
							</h3>
						</div>
					</div>
					<div class="kt-portlet__body">	
					
					<?php echo $this->Session->flash(); ?>							
								
						<div class="kt-section">							
							<div class="kt-section__content">
								<div class="table-responsive">
								<table class="table table-bordered" width="100%">
							<thead>
							<tr>
			<th width="6%"><?php echo $this->Paginator->sort('id','No'); ?></th>		
			<th width="22%" ><?php echo $this->Paginator->sort('user_id'); ?></th>	
			<th width="17%" ><?php echo $this->Paginator->sort('positionreffid','Position Referral ID'); ?></th>	
			<th width="12%" ><?php echo $this->Paginator->sort('amount'); ?></th>	
			<th width="30%"><?php echo $this->Paginator->sort('remarks'); ?></th>	
			<th width="13%" ><?php echo $this->Paginator->sort('created'); ?></th>
	</tr>
	</thead>
	<tbody>
	
		
		<?php if(count($results)>0): ?>
		<?php foreach($results as $k=>$result): ?>		
			
				  <tr>
					<th><?php echo h($k+1);?></th>
					<td><?php echo $result['User']['username']; ?> (<?php echo $result['User']['first_name']; ?> <?php echo $result['User']['last_name']; ?>)</td>  
					<td><?php echo $result['Transaction']['positionreffid']; ?></td>    
					<td><?php echo $result['Transaction']['amount']; ?></td>  	
					<td><?php echo $result['Transaction']['remarks'];  ?></td>
					<td><?php echo date('d M,Y',strtotime($result['Transaction']['created']));?></td>
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

