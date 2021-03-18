

<div class="kt-subheader  kt-grid__item" id="kt_subheader">
							<div class="kt-container  kt-container--fluid ">
								<div class="kt-subheader__main">
									<h3 class="kt-subheader__title">Email Templates</h3>	
								</div>	
								<div class="kt-subheader__toolbar">
						 <div class="kt-subheader__wrapper">				
                <a href="<?php echo $this->Html->url('/admin/email_templates/index',true);?>" class="btn btn-label-danger"><i class="fa fa-envelope"></i> View Email Templates</a>	
						 </div>
						</div>							
						</div>
						</div>
						
	<div class="kt-container kt-container--fluid  kt-grid__item kt-grid__item--fluid">
		<div class="row">			
			<div class="col-xl-6">				
				<div class="kt-portlet">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">
								View Email Template
							</h3>
						</div>
					</div>
					<div class="kt-portlet__body">	
						<div class="kt-section">							
							<div class="kt-section__content">
								<table class="table table-bordered" width="100%">
							<thead>
							<tr>
							<td width="18%">Email Subject</td>							
							<td width="81%"><?php echo h($result['EmailTemplate']['email_subject']); ?> </td>
							</tr>
							<tr>
							<td width="18%">Email Address</td>							
							<td width="81%"><?php echo $result['EmailTemplate']['email_address']; ?></td>		
							</tr>
							<tr>
							<td width="18%">Email Message</td>							
							<td width="81%"><?php echo $result['EmailTemplate']['email_message']; ?> </td>
							</tr>  
							</table>																				
								</div>
							</div>
						</div>
					</div>					
				</div>			
			</div>	
	</div>								
		