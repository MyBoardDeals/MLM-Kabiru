<?php echo $this->Html->css('/css/themes/rocket/jquery-wijmo');?>
<?php echo $this->Html->script('/js/external/jquery-1.8.0.min'); ?>
<?php echo $this->Html->script('/js/external/jquery-ui-1.8.23.custom.min'); ?>
<?php echo $this->Html->script('/js/external/globalize.min'); ?>
<?php echo $this->Html->script('/js/external/raphael-min'); ?>
<?php echo $this->Html->script('/js/wijmo/jquery.wijmo.raphael'); ?>
<?php echo $this->Html->script('/js/wijmo/jquery.wijmo.wijchartcore'); ?>
<?php echo $this->Html->script('/js/wijmo/jquery.wijmo.wijbarchart'); ?>
<script id="scriptInit" type="text/javascript">
		$(document).ready(function () {
		
			$("#newmemberchart").wijbarchart({
				axis: {
					y: {
						text: "Number of New Members",
						autoMax: false,
						max: 1000,
						autoMin: false,
						min: 0

					},
					x: {
						text: "Month of the Year"
					}
				},
				hint: {
					content: function () {
						return this.data.label + '\n ' + this.y + '';
					}
				},
				stacked: true,
				clusterRadius: 10,
				seriesList: [createRandomSeriesList("<?php echo date('Y');?>")]
			});
			
			$("#varifiedmemberchart").wijbarchart({
				axis: {
					y: {
						text: "Number of Varified Members",
						autoMax: false,
						max: 1000,
						autoMin: false,
						min: 0

					},
					x: {
						text: "Month of the Year"
					}
				},
				hint: {
					content: function () {
						return this.data.label + '\n ' + this.y + '';
					}
				},
				stacked: true,
				clusterRadius: 10,
				seriesList: [createVarifiedSeriesList("<?php echo date('Y');?>")]
			});
			
			$("#transcrchart").wijbarchart({
				axis: {
					y: {
						text: "Transaction History (Cr)",
						autoMax: false,
						max: 1000,
						autoMin: false,
						min: 0

					},
					x: {
						text: "Month of the Year"
					}
				},
				hint: {
					content: function () {
						return this.data.label + '\n ' + this.y + '';
					}
				},
				stacked: true,
				clusterRadius: 10,
				seriesList: [createTransCrSeriesList("<?php echo date('Y');?>")]
			});
			
			$("#transdrchart").wijbarchart({
				axis: {
					y: {
						text: "Transaction History (Dr)",
						autoMax: false,
						max: 1000,
						autoMin: false,
						min: 0

					},
					x: {
						text: "Month of the Year"
					}
				},
				hint: {
					content: function () {
						return this.data.label + '\n ' + this.y + '';
					}
				},
				stacked: true,
				clusterRadius: 10,
				seriesList: [createTransDrSeriesList("<?php echo date('Y');?>")]
			});
			
		});
		
		function createRandomSeriesList(label) {
			 var data = [<?php echo $joining_members[1];?>,<?php echo $joining_members[2];?>,<?php echo $joining_members[3];?>,<?php echo $joining_members[4];?>,<?php echo $joining_members[5];?>,<?php echo $joining_members[6];?>,<?php echo $joining_members[7];?>,<?php echo $joining_members[8];?>,<?php echo $joining_members[9];?>,<?php echo $joining_members[10];?>,<?php echo $joining_members[11];?>,<?php echo $joining_members[12];?>],
				randomDataValuesCount = 12,
				labels = ["January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December"];							
			return {
				label: label,
				legendEntry: false,
				data: { x: labels, y: data }
			};
		}
		
     function createVarifiedSeriesList(label) {
			var data = [<?php echo $varified_members[1];?>,<?php echo $varified_members[2];?>,<?php echo $varified_members[3];?>,<?php echo $varified_members[4];?>,<?php echo $varified_members[5];?>,<?php echo $varified_members[6];?>,<?php echo $varified_members[7];?>,<?php echo $varified_members[8];?>,<?php echo $varified_members[9];?>,<?php echo $varified_members[10];?>,<?php echo $varified_members[11];?>,<?php echo $varified_members[12];?>],
				randomDataValuesCount = 12,
				labels = ["January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December"];							
			return {
				label: label,
				legendEntry: false,
				data: { x: labels, y: data }
			};
		}
		
    function createTransCrSeriesList(label) {
			var data = [<?php echo $credit_amount[1];?>,<?php echo $credit_amount[2];?>,<?php echo $credit_amount[3];?>,<?php echo $credit_amount[4];?>,<?php echo $credit_amount[5];?>,<?php echo $credit_amount[6];?>,<?php echo $credit_amount[7];?>,<?php echo $credit_amount[8];?>,<?php echo $credit_amount[9];?>,<?php echo $credit_amount[10];?>,<?php echo $credit_amount[11];?>,<?php echo $credit_amount[12];?>],
				randomDataValuesCount = 12,
				labels = ["January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December"];							
			return {
				label: label,
				legendEntry: false,
				data: { x: labels, y: data }
			};
		}
		 function createTransDrSeriesList(label) {
			var data = [<?php echo $debit_amount[1];?>,<?php echo $debit_amount[2];?>,<?php echo $debit_amount[3];?>,<?php echo $debit_amount[4];?>,<?php echo $debit_amount[5];?>,<?php echo $debit_amount[6];?>,<?php echo $debit_amount[7];?>,<?php echo $debit_amount[8];?>,<?php echo $debit_amount[9];?>,<?php echo $debit_amount[10];?>,<?php echo $debit_amount[11];?>,<?php echo $debit_amount[12];?>],
				randomDataValuesCount = 12,
				labels = ["January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December"];							
			return {
				label: label,
				legendEntry: false,
				data: { x: labels, y: data }
			};
		}
		
	</script>
<div class="title"><h5>Dashboard</h5></div>   
<section class="stats">
<ul>
<li><a href="<?php echo $this->Html->url('/admin/users/index/',true);?>" class="count grey" title="Total Joining Direct Member"><?php echo $total_joining_member; ?></a><span>Total Joining<br/> Member</span></li>
<li><a href="<?php echo $this->Html->url('/admin/varified_users/index/',true);?>" class="count grey" title="Total Payment Varified Member"><?php echo $total_payment_varified_member; ?></a><span>Total Payment<br/> Varified Member</span></li>
<li><a href="#" class="count grey" title="Transaction History (Cr)"><?php echo $total_credit_amount;?></a><span>Transaction<br/> History(Cr)(AED)</span></li>
<li class="last"><a href="#" class="count grey" title=""><?php echo $total_debit_amount;?></a><span>Transaction<br/> History (Dr)(AED)</span></li>
</ul>
<div class="clear"></div>
</section>
<section class="widget first">
<div class="pagehead"><h5 class="iGraph">Business Analytics</h5></div>
<div class="body">
<section class="details_form">
<div class="chart">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="49%"><div id="newmemberchart" class="ui-widget ui-widget-content ui-corner-all" style="width:476px; height:475px"></div></td>
      <td width="2%">&nbsp;</td>
      <td width="49%"><div id="varifiedmemberchart" class="ui-widget ui-widget-content ui-corner-all" style="width:476px; height:475px"></div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
     <tr>
      <td width="49%"><div id="transcrchart" class="ui-widget ui-widget-content ui-corner-all" style="width:476px; height:475px"></div></td>
      <td width="2%">&nbsp;</td>
      <td width="49%"><div id="transdrchart" class="ui-widget ui-widget-content ui-corner-all" style="width:476px; height:475px"></div></td>
    </tr>
  </table>
</div>
</section>
</div>
</section>