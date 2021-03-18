<script>
updateStatus=function($status,$id){  
		$url='<?php echo Configure::read('siteUrl');?>users/ajax_common';	  
		$.post($url,{act:'joining_business_logic',status:$status,id:$id},function(data){		      
		  $('#completed'+$id).html(data);			  
		});   
}
</script>
<div class="users index">
	<h2><?php echo __("Pending Product Orders"); ?></h2>
	<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
           <th width="4%" height="20"><?php echo $this->Paginator->sort('id'); ?></th>
		   <th width="11%"><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th width="23%"><?php echo $this->Paginator->sort('product_id'); ?></th>
			<th width="11%"><?php echo $this->Paginator->sort('product_price'); ?></th>
			<th width="10%"><?php echo $this->Paginator->sort('quantiry'); ?></th>
			<th width="10%" ><?php echo $this->Paginator->sort('total_amount'); ?></th>
				
			<th width="11%" ><?php echo $this->Paginator->sort('payment_status'); ?></th>
			<th width="12%" ><?php echo $this->Paginator->sort('created_date'); ?></th>	
			<th width="8%"  class="actions">Action</th>	
      </tr>	
   <?php     
   if(count($results)>0): ?>		  	
	<?php foreach ($results as $result): ?>
	<tr>
	     <td align="center"><?php echo h($result['Order']['id']); ?></td>
	     <td align="center"><?php echo h($result['User']['username']); ?></td>
		<td align="center"><?php echo h($result['Product']['product_name']); ?></td>
		<td align="center"><?php echo h($result['Order']['product_price']); ?></td>
		<td align="center"><?php echo h($result['Order']['quantity']); ?></td>
		<td align="center"><?php echo h($result['Order']['total_amount']); ?></td>		
		<td align="center" id="completed<?php echo h($result['Order']['id']); ?>">					
		<?php if(h($result['Order']['payment_status'])=='1'): ?>
		 Completed
		<?php else: ?>
		  <select name="payment_status" id="payment_status" onchange="updateStatus(this.value,<?php echo h($result['Order']['id']); ?>);">
		      <option value="0" <?php if(h($result['Order']['payment_status'])=='0') echo "selected"; ?>>Pending</option>
			  <option value="1" <?php if(h($result['Order']['payment_status'])=='1') echo "selected"; ?>>Completed</option>
	      </select>	
		<?php endif; ?>	
		</td>
		<td align="center"><?php echo h($result['Order']['created_date']); ?></td>	
			<td align="center"  class="actions"><?php echo $this->Html->link(__('View'), array('action' => 'view', $result['Order']['id'])); ?>		
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $result['Order']['id']), null, __('Are you sure you want to delete # %s?', $result['Order']['id'])); ?>		</td>
	</tr>
	<?php endforeach; ?>
	<?php endif; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>