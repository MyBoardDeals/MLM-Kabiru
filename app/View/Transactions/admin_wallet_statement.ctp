<?php echo $this->Html->css('jquery-ui'); ?>
<?php echo $this->Html->script('jquery-1.9.1'); ?>	
<script>
getserach=function(){
   
   $fdate=$('#fdate').val();
   $tdate=$('#tdate').val();
   if($fdate.length==10 && $tdate.length==10){
   window.location.href='<?php echo Configure::read('siteUrl');?>admin/transactions/wallet_statement/'+$fdate+'/'+$tdate;
   } else {
   window.location.reload();
   }   
}

$(function() {
	$( "#fdate" ).datepicker({format: 'yyyy-mm-dd'});
	$( "#tdate" ).datepicker({format:"yyyy-mm-dd"});	
});
</script>



<div class="kt-subheader  kt-grid__item" id="kt_subheader">
							<div class="kt-container  kt-container--fluid">
								<div class="kt-subheader__main">
									<h3 class="kt-subheader__title">Wallet Adjustment Statement</h3>	
								</div>	
								<div class="kt-subheader__toolbar">
						 <div class="kt-subheader__wrapper">
		<a href="<?php echo $this->Html->url('/admin/transactions/wallet_statement',true);?>" class="btn btn-label-primary"><i class="fa fa-history"></i> View Wallet Adjustment Statement</a>	
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
	 <div class="col-2">
          <input type="button" class="btn btn-danger" value="Search" onclick="getserach();" />
    </div>
</div>
			
		<div class="row">			
			<div class="col-xl-6">				
				<div class="kt-portlet">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">
								View Wallet Adjustment Statement
							</h3>
						</div>
					</div>
					<div class="kt-portlet__body">									
								
						<div class="kt-section">							
							<div class="kt-section__content">
								<table class="table table-bordered" width="100%">
							<thead>
							<tr>
           <th width="5%"><?php echo $this->Paginator->sort('id'); ?></th>
		   <th width="16%" ><?php echo $this->Paginator->sort('created','Date & Time'); ?></th>	
		   <th width="14%"><?php echo $this->Paginator->sort('user_id'); ?></th>
		  
		   <th width="17%" ><?php echo $this->Paginator->sort('bonus_from','To/ From Account'); ?></th>
			<th width="9%"><?php echo $this->Paginator->sort('amount','In'); ?></th>				
			<th width="8%" ><?php echo $this->Paginator->sort('amount','Out'); ?></th>			
			<th width="31%" ><?php echo $this->Paginator->sort('remarks'); ?></th>
      </tr>	
	  </thead>
	<tbody>
   <?php     
   if(count($results)>0): ?>		  	
	<?php foreach ($results as $k=>$result): ?>
	<tr>
	     <th><?php echo $k+1; ?></th>
		 <td><?php echo date('d M,Y H:i:s',strtotime($result['Transaction']['created'])); ?></td>
	     <td><?php echo h($result['User']['first_name'].' '.$result['User']['last_name']); ?></td>	
	    <td><?php echo h($result['Transaction']['bonus_from']); ?></td>	
		<td><?php if($result['Transaction']['received_type']==1){ echo $result['Transaction']['amount']; } else { echo '-';}?></td>
		<td><?php if($result['Transaction']['received_type']==0){ echo $result['Transaction']['amount']; } else { echo '-';}?></td>
		<td><?php echo h($result['Transaction']['remarks']); ?></td>
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
