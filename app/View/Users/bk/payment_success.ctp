
<h3 style="margin-top:30px; margin-bottom:20px;">Payment Success</h3>
<table class="table table-bordered table-striped table-condensed flip-content" width="100%">
							<thead class="flip-content">
							<tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><?php echo ucfirst(i18n::translate('invoice number'));?></td>
        <td>:</td>
        <td align="left">#<?php echo $invoice['Invoice']['id'];?></td>
        </tr>
      <tr>
        <td width="18%"><?php echo ucfirst(i18n::translate('Name'));?></td>
        <td width="1%">:</td>
        <td width="81%" align="left"><?php echo $invoice['User']['first_name'];?>  <?php echo $invoice['User']['last_name'];?></td>
        </tr>
      <tr>
        <td><?php echo ucfirst(i18n::translate('email id'));?></td>
        <td>:</td>
        <td align="left"><?php echo $invoice['User']['email'];?></td>
        </tr>
      <tr>
        <td><?php echo ucfirst(i18n::translate('address'));?></td>
        <td>:</td>
        <td align="left"><?php echo $invoice['User']['address'];?></td>
        </tr>
      <tr>
        <td><?php echo ucfirst(i18n::translate('phone'));?></td>
        <td>:</td>
        <td align="left"><?php echo $invoice['User']['mobile_no'];?></td>
        </tr>
		<tr>
        <td width="18%"><?php echo ucfirst(i18n::translate('payment method'));?></td>
        <td width="1%">:</td>
        <td width="81%" align="left"><strong><?php echo h($invoice['Invoice']['payment_through']); ?></strong></td>
      </tr>
      <tr>
        <td width="18%">Invoice Amount</td>
        <td>:</td>
        <td align="left"><?php echo $currency.$invoice['Invoice']['amount'];?></td>
      </tr>
      <tr>
        <td>Payment Status</td>
        <td>:</td>
        <td align="left"><?php if($invoice['Invoice']['payment_status']==0){ echo 'Pending';} ?>
            <?php if($invoice['Invoice']['payment_status']==1){ echo 'Completed';} ?>
            <?php if($invoice['Invoice']['payment_status']==2){ echo 'Processing';} ?>        </td>
      </tr>
      <tr>
        <td>Payment Date</td>
        <td>:</td>
        <td align="left"><?php echo date('Y-m-d',strtotime($invoice['Invoice']['created'])); ?></td>
      </tr>
    </table></td>
  </tr>
 
 
  
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  </thead>
</table>
