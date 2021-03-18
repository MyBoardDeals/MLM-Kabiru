<?php /*?><?php echo $this->Html->script('jquery-1.9.1'); ?>	
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
   
   window.location.href='<?php echo Configure::read('siteUrl');?>admin/transactions/bw_summary_history/'+$fdate+'/'+$tdate+'/'+$username; 
}


$(function() {
	$( "#fdate" ).datepicker({format: 'yyyy-mm-dd'});
	$( "#tdate" ).datepicker({format:"yyyy-mm-dd"});	
});

</script><?php */?>

 <div class="kt-subheader  kt-grid__item" id="kt_subheader">
 
							<div class="kt-container  kt-container--fluid ">
								<div class="kt-subheader__main">
									<h3 class="kt-subheader__title">BW Summary History</h3>	
								</div>									
																					
						  </div>
						</div>	
												
	<div class="kt-container kt-container--fluid  kt-grid__item kt-grid__item--fluid">	
		
		<div class="row">			
			<div class="col-xl-6">				
				<div class="kt-portlet">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">
								View BW Summary History
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
			<th width="7%"><?php echo $this->Paginator->sort('id','No'); ?></th>
				<th width="16%" ><?php echo $this->Paginator->sort('username'); ?></th>		
			<th width="17%" ><?php echo $this->Paginator->sort('first_name'); ?></th>	
			<th width="16%"><?php echo $this->Paginator->sort('last_name'); ?></th>	
			<th width="33%" ><?php echo $this->Paginator->sort('referralcode','Position Referral ID'); ?></th>
			<th width="11%" ><?php echo $this->Paginator->sort('bw'); ?></th>			
	</tr>
	</thead>
	<tbody>
	
		
		<?php if(count($results)>0): ?>
		<?php foreach($results as $k=>$result): ?>		
			
				  <tr>
					<th><?php echo h($k+1);?></th>
					<td><?php echo $result['User']['username']; ?></td>   
					<td><?php echo $result['User']['first_name']; ?></td>  
					<td><?php echo $result['User']['last_name']; ?></td> 
					<td><?php echo $result['Position']['referralcode']; ?></td> 								
					<td><?php echo $result['Position']['bw'];  ?></td>
					
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

