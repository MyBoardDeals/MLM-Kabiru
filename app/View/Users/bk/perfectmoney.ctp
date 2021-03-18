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
						PerfectMoney
					</h3></div>
					 <h3>Processing...</h3>	
				
			</div>	
			
			
			<form class="kt-form" action="<?php echo $gateway_url;?>" method="post" name="perfectmoney">			
			<input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo $merchantid;?>">
			<input type="hidden" name="PAYEE_NAME" value="<?php echo $payee_account_name; ?>">
			<input type="hidden" name="PAYMENT_ID" value="<?php echo $item_number;?>">
			<input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $amount; ?>">
			<input type="hidden" name="PAYMENT_UNITS" value="USD">	
			<input type="hidden" name="SUGGESTED_MEMO" value="<?php echo $item_name;?>">	
			<input type="hidden" name="ORDER_NUM" value="<?php echo $item_number;?>">		
			<input type="hidden" name ="STATUS_URL" value ="<?php echo $ipn_url;?>">		
			<input type="hidden" name="PAYMENT_URL" value="<?php echo $success_url;?>">	
			<input type="hidden" name ="NOPAYMENT_URL" value = "<?php echo $cancel_url;?>">			
			</form>	
		</div>		
		</div>
	</div>
</div>				

<script>
setTimeout(function(){ document.perfectmoney.submit(); },2000);
</script>