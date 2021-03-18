<div class="kt-login__body">		
		<div class="kt-login__form">
		<div class="kt-login__title">
		<h3>CoinPayments</h3></div>	
		
		<h3>Processing...</h3>		
			<form action="https://www.coinpayments.net/index.php" class="kt-form" method="post" name="pro">
			<input type="hidden" name="cmd" value="_pay">
			<input type="hidden" name="reset" value="1">
			<input type="hidden" name="want_shipping" value="0">
			<input type="hidden" name="merchant" value="<?php echo h($setting['Setting']['merchantid']); ?>">
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
			

<script>
setTimeout(function(){ document.pro.submit(); },2000);
</script>