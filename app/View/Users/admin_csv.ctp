<?php	 
$this->Csv->addRow($header);


if(count($results)>0){
foreach ($results as $k=>$result){

$key=$k+1;
$username=$result['User']['username'];
$first_name=$result['User']['first_name'];
$last_name=$result['User']['last_name'];
$susername=$result['User']['susername'];
$email=$result['User']['email'];
$address=$result['User']['address'];
$mobile_no=$result['User']['mobile_no'];
$status=($result['User']['status']==0) ? 'Inactive':'Aactive';
$package_name=$result['Plan']['name'];
$able_to_refer=$result['User']['able_to_refer'];
$created=$result['User']['created'];
$cwallet=$result['User']['cwallet'];
$mwallet=$result['User']['mwallet'];
$rwallet=$result['User']['rwallet'];

$line =array($key,$package_name,$username,$first_name,$last_name,$susername,$email,$address,$mobile_no,$able_to_refer,$cwallet,$mwallet,$rwallet,$status,$created);
$this->Csv->addRow($line);
} 
}

$file_name=$filename.'-'.date('Ymd');
echo  $this->Csv->render($file_name);
?>
