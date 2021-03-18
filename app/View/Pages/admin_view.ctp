<div class="page-content">	

	<div class="row margin-bottom-20">
			<div class="col-md-9 col-sm-9">
			<a href="<?php echo $this->Html->url('/admin/pages/view',true);?>" class="btn btn-success"><i class="glyphicon glyphicon-list-alt"></i> View CMS</a>
			</div>
			<?php /*?><div class="col-md-3 col-sm-3">
			<a href="<?php echo $this->Html->url('/admin/ban/csv',true);?>" class="pull-right"><?php echo $this->Html->image('csv.png',array('alt'=>'','width'=>25));?></a>
			</div><?php */?>
				
	</div>			
		
			<div class="row">
				<div class="col-md-12">					
				
					<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<span class="glyphicon glyphicon-picture"></span> View Pages
							</div>							
						</div>
						<div class="portlet-body flip-scroll">
							<table class="table table-bordered table-striped table-condensed flip-content" width="100%">
							<thead class="flip-content">
							<tr>


           <th width="4%"><a>No</a></th>			
			<th width="89%" align="left"><?php echo $this->Paginator->sort('page_title'); ?></th>			
			<th width="7%" ><a><?php echo __('Actions'); ?></a></th>
      </tr>		
	<?php foreach ($pages as $page): ?>
	<tr>
	    <td align="center"><?php echo h($page['Page']['id']); ?></td>		
		<td align="left"><?php echo h($page['Page']['page_title']); ?></td>				
		<td align="center" class="center"><a href="<?php echo $this->Html->url('/admin/pages/details/'.$page['Page']['id']); ?>"><i class="fa fa-th-large"></i></a>&nbsp;		
		<a href="<?php echo $this->Html->url('/admin/pages/edit/'.$page['Page']['id']); ?>"><i class="fa fa-edit"></i></a>
		</td>
	</tr>
	<?php endforeach; ?>
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
					</div>
					
					
				
					
					
				</div>
			</div>
			
		</div>
