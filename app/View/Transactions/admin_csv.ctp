<?php	 
$this->CSV->addRow($header);
if(count($results)>0){
foreach ($results as $k=>$result){

	$fullname=$result['User']['first_name'].' '.$result['User']['last_name'];
	if($result['Transaction']['type']==1){  $transations_type='Membership Subscription';   } 
	if($result['Transaction']['type']==2){ $transations_type='Product Purchased or Deposit';   } 
	if($result['Transaction']['type']==3){ $transations_type='Commission';   } 
	if($result['Transaction']['type']==4){ $transations_type='Transfer';   }    
	if($result['Transaction']['type']==5){ $transations_type='Withdrawal';   }
	if($result['Transaction']['type']==6){ $transations_type='Bonus';   }
	
	if($result['Transaction']['withdrawal_status']==0){ $withdrawal_status= 'Request For Withdrawal'; } 
							if($result['Transaction']['withdrawal_status']==1){ $withdrawal_status= 'Processing'; }
							if($result['Transaction']['withdrawal_status']==2){ $withdrawal_status= 'Canceled'; }
							if($result['Transaction']['withdrawal_status']==3){ $withdrawal_status= 'Completed'; }
							
							
	 if($result['Transaction']['received_type']==1){ $in= $result['Transaction']['amount']; }							
	if($result['Transaction']['received_type']==0){ $out= $result['Transaction']['amount']; }	
	  
   
 if($type==1){
    $line =array($k,$fullname,$transations_type,$result['Transaction']['amount'],$result['Transaction']['payment_through'],$result['Transaction']['created']);
 } else if($type==2){
    $line =array($k,$fullname,$result['Transaction']['transaction_number'],$result['Transaction']['amount'],$result['Transaction']['payment_through'],$withdrawal_status,
	$result['Transaction']['remarks'],$result['Transaction']['created']);
 } else if($type==3){
     $line =array($k,$fullname,$result['Transaction']['transaction_number'],$result['Transaction']['amount'],$result['Transaction']['payment_through'],$withdrawal_status,
	$result['Transaction']['remarks'],$result['Transaction']['created']);
 } else if($type==4){
     $line =array($k,$fullname,$in,$out,$result['Transaction']['payment_through'],$result['Transaction']['remarks'],$result['Transaction']['created']);
 } else if($type==5){
     $line =array($k,$fullname,$result['Product']['product_name'],$result['Transaction']['amount'],$result['Transaction']['payment_through'],$result['Transaction']['remarks'],$result['Transaction']['created']);
 } else if($type==6){
     $line =array($k,$fullname,$result['Plan']['name'],$result['Transaction']['amount'],$result['Transaction']['payment_through'],$result['Transaction']['remarks'],$result['Transaction']['created']);
 } else if($type==7){
     $line =array($k,$fullname,$result['Transaction']['amount'],$result['Transaction']['payment_through'],$result['Transaction']['remarks'],$result['Transaction']['created']);
 } 
 else if($type==8){
     $line =array($k,$fullname,$result['Transaction']['amount'],$result['Transaction']['payment_through'],$result['Transaction']['remarks'],$result['Transaction']['created']);
 }
 

$this->CSV->addRow($line);
} 
}

$file_name=$filename.'-'.date('Ymd');
echo  $this->CSV->render($file_name);