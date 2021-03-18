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
						CoinPayments
					</h3>
					</div>
					<h3>Processing...</h3>	
				
			</div>	
			
			
			<form action="https://www.coinpayments.net/index.php" class="kt-form" method="post" name="pro">
			<input type="hidden" name="cmd" value="_pay">
			<input type="hidden" name="reset" value="1">
			<input type="hidden" name="want_shipping" value="0">
			<input type="hidden" name="merchant" value="<?php echo $merchantid; ?>">
			<input type="hidden" name="currency" value="USD">
			<input type="hidden" name="amountf" value="<?php echo $amount; ?>">
			<input type="hidden" name="item_name" value="<?php echo $item_name;?>">
			<input type="hidden" name ="item_number" value = '<?php echo $item_number;?>'>		
			<input type="hidden" name="allow_extra" value="1">	
			<input type="hidden" name ="ipn_url" value = "<?php echo $ipn_url;?>">
			<input type="hidden" name="success_url" value="<?php echo $success_url;?>">	
			<input type="hidden" name="cancel_url" value="<?php echo $cancel_url;?>">	
			<input type="hidden" name="email" value="<?php echo $email;?>">
			<input type="hidden" name="first_name" value="<?php echo $first_name;?>">
			<input type="hidden" name="last_name" value="<?php echo $last_name;?>">				
			</form>	
		</div>		
		</div>
	</div>
</div>				

<script>
setTimeout(function(){ document.pro.submit(); },2000);
</script>