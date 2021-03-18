<style>
.ui-datepicker-calendar th { background:none;}
table tr:nth-child(2n) { background:none;}

table tr td {
    border-bottom:none;
   
}
</style>



<div class="page-content">	
<div class="row" style="margin-bottom:20px;">
<div class="col-md-7 col-sm-6">
<a href="<?php echo $this->Html->url('/admin/invoices/index',true);?>" class="btn btn-primary"><i class="glyphicon glyphicon-list-alt"></i> Today's Invoices</a>&nbsp;
<a href="<?php echo $this->Html->url('/admin/invoices/pending',true);?>" class="btn btn-danger"><i class="glyphicon glyphicon-list-alt"></i> Pending Invoices</a>&nbsp;
<a href="<?php echo $this->Html->url('/admin/invoices/completed',true);?>" class="btn btn-success"><i class="glyphicon glyphicon-list-alt"></i> Completed Invoices</a>
</div>

</div>
	
	<div class="row">
				<div class="col-md-12">					
				
					<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<span class="glyphicon glyphicon-picture"></span> Invoice Details
							</div>							
						</div>
						<div class="portlet-body flip-scroll">
							<table class="table table-bordered table-striped table-condensed flip-content" width="100%">
							<thead class="flip-content">
 
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="16%"><?php echo ucfirst(i18n::translate('Name'));?></td>
        <td width="1%">:</td>
        <td width="33%"><?php echo $invoices['User']['first_name'];?>  <?php echo $invoices['User']['last_name'];?></td>
        <td width="1%">&nbsp;</td>
        <td colspan="3"><strong><?php echo ucfirst(i18n::translate('invoice'));?></strong></td>
        </tr>
      <tr>
        <td>Member Code </td>
        <td>:</td>
        <td><?php echo $invoices['User']['member_code'];?></td>
        <td>&nbsp;</td>
        <td><?php echo ucfirst(i18n::translate('invoice number'));?></td>
        <td>:</td>
        <td align="left">#<?php echo $invoices['Invoice']['id'];?></td>
      </tr>
      <tr>
        <td><?php echo ucfirst(i18n::translate('email id'));?></td>
        <td>:</td>
        <td><?php echo $invoices['User']['email'];?></td>
        <td>&nbsp;</td>
        <td width="17%"><?php echo ucfirst(i18n::translate('invoice date'));?></td>
        <td width="1%">:</td>
        <td width="31%" align="left"><?php echo date('d-m-Y',strtotime($invoices['Invoice']['created']));?></td>
      </tr>
      <tr>
        <td>Full Address</td>
        <td>:</td>
        <td><?php echo $invoices['User']['address'];?></td>
        <td>&nbsp;</td>
        <td> Mobile No</td>
        <td>:</td>
        <td><?php echo $invoices['User']['mobile_no'];?></td> 
      </tr>
      <tr>
        <td>Country</td>
        <td>:</td>
        <td><?php echo $country['Country']['name'];?></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td >&nbsp;</td>
  </tr>

  <tr>
    <td style="border:1px dashed #000000; padding:10px;">
	

           			
     
        <table width="100%" border="0" cellpadding="0" cellspacing="2">
		<tr style="background:#E8E8E8; height:25px;">
			
            <td width="70%" style="text-align:left;" >REMARKS</td>           
            <td width="9%" align="center" >PRICE</td>
            <td width="8%" align="center" >UNITS</td>
            <td width="13%" align="center">SUBTOTAL</td>
          </tr>	 
		
		  <tr>		  
            <td width="70%"  style="text-align:left;">
			
			<?php echo $invoices['Invoice']['remarks'];			
			?>
			
			</td>           
            <td width="9%" align="center" ><?php echo $currency.$invoices['Invoice']['amount'];?></td>
            <td width="8%" align="center" ><?php echo $invoices['Invoice']['unit'];?></td>
            <td width="13%" align="center" ><?php echo $currency.$invoices['Invoice']['amount'];?></td>
          </tr>
		 
	

          <tr>
		    <td colspan="5" >&nbsp;</td>
          </tr>
          <tr style="background:#E8E8E8; height:25px;">
		   <td  style="border-bottom:none;">&nbsp;</td>
            <td colspan="2"  style="border-bottom:none;"><strong>GRAND TOTAL</strong></td>
            <td align="center"  style="border-bottom:none;"><?php echo $currency.$invoices['Invoice']['amount'];?></td>
          </tr>
          
      </table>	
	
	</td>
  </tr>
  <tr>
    <td >&nbsp;</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
	
     <?php /*?> <tr>
	    <td width="22%"><?php echo ucfirst(i18n::translate('payment method'));?></td>
        <td>: <strong><?php echo h($invoices['Invoice']['payment_through']); ?></strong></td>
        </tr><?php */?>
      
      <tr>
        <td width="22%">Invoice Amount</td>
        <td width="78%">: <?php echo $currency.$invoices['Invoice']['amount'];?></td>
        </tr>
		<tr>
        <td>Payment Status</td>
        <td>: <?php if($invoices['Invoice']['payment_status']==0){ echo 'Pending';} ?>
		   <?php if($invoices['Invoice']['payment_status']==1){ echo 'Completed';} ?>
		   <?php if($invoices['Invoice']['payment_status']==2){ echo 'Processing';} ?>		   </td>
        </tr>
	    <tr>
	      <td>&nbsp;</td>
	      <td>&nbsp;</td>
	      </tr>
	    <tr>
        <td>Transaction Number</td>
        <td>: <?php echo $invoices['Invoice']['transaction_number']; ?>		   </td>
        </tr>
		
		 <tr>
	      <td>Payment Date</td>
	      <td>: <?php echo $invoices['Invoice']['payment_date']; ?></td>
	      </tr>
		  		
		
    </table></td>
  </tr>
  <tr>
    <td style="text-align:center"><a href="javascript:history.go(-1);"><strong>Back</strong></a></td>
  </tr>
  
</table>	
</div>
</div>
</div>
</div>
</div>