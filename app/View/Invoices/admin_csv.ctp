<?php	 
$this->Csv->addRow($header);


if(count($results)>0){
foreach ($results as $k=>$result){


$fullname=$result['User']['first_name'].' '.$result['User']['last_name'];
$email=$result['User']['email'];
$address=$result['User']['address'];
$mobile_no=$result['User']['mobile_no'];
$amount=$result['Invoice']['amount'];
$payment_through=$result['Invoice']['payment_through'];
$txn_no=$result['Invoice']['transaction_number'];
$remarks=$result['Invoice']['remarks'];
$created=$result['Invoice']['created'];
$status=($result['Invoice']['payment_status']==0) ? 'Pending':'Completed';
$shipping=$result['Invoice']['shipping'];

if($shipping==0){ $shipping_status='Pending'; }
if($shipping==1){ $shipping_status='Processing'; }
if($shipping==2){ $shipping_status='Completed'; }
if($shipping==3){ $shipping_status='Canceled'; }



$line =array($k,$fullname,$email,$address,$mobile_no,$amount,$payment_through,$txn_no,$status,$shipping_status,$remarks,$created);


$this->Csv->addRow($line);
} 
}

$file_name=$filename.'-'.date('Ymd');
echo  $this->Csv->render($file_name);
?>

