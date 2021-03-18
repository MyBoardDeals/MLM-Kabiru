<div class="kt-subheader  kt-grid__item" id="kt_subheader">
							<div class="kt-container  kt-container--fluid ">
								<div class="kt-subheader__main">
									<h3 class="kt-subheader__title">Deposit Fund</h3>	
								</div>	
								<div class="kt-subheader__toolbar">
						 <div class="kt-subheader__wrapper">
	<a href="<?php echo $this->Html->url('/transactions/deposit',true);?>" class="btn btn-label-primary"><i class="fa fa-plus-square"></i> Add a Deposit Fund</a>
	<a href="<?php echo $this->Html->url('/transactions/deposit_statement',true);?>" class="btn btn-label-danger"><i class="fa fa-money-check"></i> Deposit Statement</a>	

	         </div>
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
						Payeer
					</h3></div>
					 <h3>Processing...</h3>	
				
			</div>	
			<form class="kt-form" action="<?php echo $gateway_url;?>" method="post" name="payeer">			
			<input type="hidden" name="m_shop" value="<?php echo $m_shop;?>">		
			<input type="hidden" name="m_orderid" value="<?php echo $m_orderid;?>">
			<input type="hidden" name="m_amount" value="<?php echo $amount; ?>">
			<input type="hidden" name="m_curr" value="<?php echo $currency; ?>">	
			<input type="hidden" name="m_desc" value="<?php echo $item_name;?>">	
			<input type="hidden" name="m_sign" value="<?php echo $m_sign;?>">					
			</form>	
		</div>		
		</div>
	</div>
</div>				

<script>
setTimeout(function(){ document.payeer.submit(); },2000);
</script>