<?php echo $this->Html->script('jquery-1.9.1'); ?>	
<?php echo $this->Html->script('jquery-ui'); ?>	
<script>
 getsearch=function(){
	$key=$('#key').val();
	$sby=$('#sby').val();   
	$fdate=$('#fdate').val();
	$tdate=$('#tdate').val();
	
	if($fdate.length!=10 || $tdate.length!=10){
	  $fdate=0;
	  $tdate=0;
	} 
   window.location.href='<?php echo Configure::read('siteUrl');?>admin/transactions/commission_summary/'+$fdate+'/'+$tdate+'/'+$sby+'/'+$key;   
   }
   
   
$(function() {
	$( "#fdate" ).datepicker({format: 'yyyy-mm-dd'});
	$( "#tdate" ).datepicker({format:"yyyy-mm-dd"});	
});
</script> 
 
 <div class="kt-subheader  kt-grid__item" id="kt_subheader">
							<div class="kt-container  kt-container--fluid ">
								<div class="kt-subheader__main">
									<h3 class="kt-subheader__title">Bonuses</h3>	
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
	<div class="col-2">
	       <select name="sby" id="sby" class="form-control">
		    <option value="0">Select</option>
			<option value="1">Username</option>
			<option value="2">Sponsor</option>		
			<option value="3">First Name</option>
			<option value="4">Last Name</option>							
			</select>	
    </div>	
	 <div class="col-2">
          <input name="key" class="form-control" placeholder="Keyword" type="text" id="key" value="" />	
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
								View Commission Summary
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
			<th width="6%"><?php echo $this->Paginator->sort('id'); ?></th>
			<th width="10%" ><?php echo $this->Paginator->sort('created','Date Join'); ?></th>				
			<th width="11%"><?php echo $this->Paginator->sort('username'); ?></th>				
			<th width="13%"><?php echo $this->Paginator->sort('first_name'); ?></th>					
			<th width="13%" ><?php echo $this->Paginator->sort('last_name'); ?></th>	
			
			<th width="20%" class="actions">Position Referral ID</th>
			<th width="11%">BW</th>
			<th width="16%">Total Commission</th>
							</tr>
							</thead>
							<tbody>
	<?php foreach($results as $k=>$result): ?>
	<?php $rspositions=$result['Position'];  ?>
	<tr>
		<td><?php echo h($k+1); ?></td>
		<td><?php echo h($result['User']['created']); ?></td>
	    <td><?php echo h($result['User']['username']); ?></td>		
		<td><?php echo h($result['User']['first_name']); ?></td>
		<td><?php echo h($result['User']['last_name']); ?></td>	
		
		<td colspan="3"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="table-bordered">
		 <tbody>
		 <?php 
		if(count($rspositions)>0){
		   foreach($rspositions as $k=>$rsposition){ 
		 ?> 
		 <tr>
		   <td width="43%"><?php echo h($rsposition['referralcode']);?></td>
		   <td width="23%"><?php  echo h($rsposition['bw']);?></td>            
		   <td width="34%"><?php  echo h($rsposition['totalcom']);?></td>
		   </tr>
		<?php   
		 }		
		} 
		?>	
		   
		 
		 </tbody>
		</table>
		</td>
			
				
	</tr>
<?php endforeach; ?>
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