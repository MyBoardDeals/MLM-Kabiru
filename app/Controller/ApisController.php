<?php
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Origin:*');
header("Access-Control-Allow-Methods: POST, HEAD, GET, OPTIONS, DELETE, PUT");
header("Access-Control-Allow-Headers: Cache-Control, Pragma, Origin, Authorization, Content-Type, X-Requested-With");
header('Access-Control-Max-Age: 86400');
error_reporting(0); 
header('Content-type: application/json');

App::uses('AppController','Controller');
App::import('Lib','Watimage');
App::uses('CakeEmail','Network/Email');

class ApisController extends AppController {
	var $name='Apis';
    public $uses=array('User','Setting','Country','Transaction','Position','Tree','Country','State','Page','Invoice');     

	public $paginate = array('limit' => 100);
	public $currency ='MYBS';		

	public function beforeFilter() {

		parent::beforeFilter();						

		$this->Auth->allow('login','sponsor_verification','sign_up','getdownline','network','getprofile','getprofileByEmail','statements','buy_position','getinfobyreferralcode');
	}
	
   	function notificationsend($options=array()){	   
		$url = 'https://www.billspayapi.com/MBDAPI/api/Notifications/ChannelUpdateNotification';	  		 
		
		$fields = json_encode($options);
		$headers =array('Content-Type: application/json');				
		$ch=curl_init();
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_POST, true );
		curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch,CURLOPT_POSTFIELDS,$fields);
		$result = curl_exec($ch);
		curl_close($ch);
		
		return $result;			   
	}
	
	function receivableuser($tree_p_id,$board){
	   $chain_array=array();
		$i=0;
		$this->Tree->recursive=-1;
		$tmember=$this->Tree->findByPositionIdAndBoard($tree_p_id,$board);
		$parent_id=$tmember['Tree']['parent_id'];

		if($parent_id>0){ 
			$loop=3;
			do {	

					$this->Tree->recursive=-1;
					$pmember=$this->Tree->findByPositionIdAndBoard($parent_id,$board);	
					$prev_parent_id=$parent_id;	

					$parent_id=$pmember['Tree']['parent_id'];		



					$i++;

					if($parent_id==0){ 
							$parent_id=$prev_parent_id; 
							$loop=0;
					} 	


			} while($i<$loop);
		 }	

		return $parent_id;	
    }	
		
	 function updateunlimiteddethTree($position_id){

        $this->Tree->recursive=-1;
		$treeu=$this->Tree->findByPositionId($position_id);
		$parent_id=$treeu['Tree']['parent_id'];	

		$i=0;
		$chain_array=array();			
		$chain_array[$i]=$treeu;

		if($parent_id>0){ 
		       
				$loop=1; 


				do {	

						$p_member=$this->Tree->findByPositionId($parent_id);	
						$parent_id=$p_member['Tree']['parent_id'];	

						$i++;
						$loop++;
						
						if($parent_id>=1){ $chain_array[$i]=$p_member; } 	
						if($parent_id==0){ $parent_id=-1; $loop=0; }   

				} while($i<$loop); 	

			}
			
					

		if(count($chain_array)>0){
		 foreach($chain_array as $k=>$chain){	

				   $parent_id=$chain['Tree']['parent_id'];				
				   $this->Tree->Query("update acs_trees set totaldepth_members=totaldepth_members+1 where position_id=$parent_id");					
		  }	

	   }	



	   return true;	

 }
 
     function updateTree($position_id){

        $this->Tree->recursive=-1;
		$treeu=$this->Tree->findByPositionId($position_id);
		$parent_id=$treeu['Tree']['parent_id'];	

		$i=0;
		$chain_array=array();			
		$chain_array[$i]=$treeu;

		if($parent_id>0){ 
		       
				$loop=5; 


				do {	

						$p_member=$this->Tree->findByPositionId($parent_id);	
						$parent_id=$p_member['Tree']['parent_id'];	

						$i++;
						
						if($parent_id>=1){ $chain_array[$i]=$p_member; } 	
						if($parent_id==0){ $parent_id=-1; $loop=0; }   

				} while($i<$loop); 	

			}		

		if(count($chain_array)>0){
		 foreach($chain_array as $k=>$chain){	

				 $parent_id=$chain['Tree']['parent_id'];
				
				if($k==0){
				   $this->Tree->Query("update acs_trees set level1=level1+1 where position_id=$parent_id");	
				} else if($k==1){
				   $this->Tree->Query("update acs_trees set level2=level2+1 where position_id=$parent_id");	
				} else if($k==2){
				   $this->Tree->Query("update acs_trees set level3=level3+1 where position_id=$parent_id");	
				} else if($k==3){
				   $this->Tree->Query("update acs_trees set level4=level4+1 where position_id=$parent_id");	
				} else if($k==4){
				   $this->Tree->Query("update acs_trees set level5=level5+1 where position_id=$parent_id");	
				} 
				
		  }	 

	   }	

	   return true;	
 }
 	
     function saveCommission($userId,$type,$commission_type,$amount,$remarks,$from_user_id=0,$bonus_from='',$referralcode=0) { 

     $transaction=array();   
     $transaction['Transaction']['user_id']=$userId;   
	 $transaction['Transaction']['positionreffid']=$referralcode;     
     $transaction['Transaction']['type']=$type;
     $transaction['Transaction']['amount']=$amount;  	
     $transaction['Transaction']['commission_type']=$commission_type;
     $transaction['Transaction']['remarks']=$remarks;
	 $transaction['Transaction']['payment_status']=1; 
	 $transaction['Transaction']['from_user_id']=$from_user_id; 
	 $transaction['Transaction']['bonus_from']=$bonus_from;    
     $transaction['Transaction']['created']=date('Y-m-d H:i:s');
     $this->Transaction->Create();
     if($this->Transaction->Save($transaction)){	
	   
	   if($commission_type==4){
	    $this->User->query("update acs_users set bwewallet=bwewallet+$amount where id=".$userId);
	   } else {	  
        $this->User->query("update acs_users set ewallet=ewallet+$amount where id=".$userId);
	   }		
     }   	

	return true;	 

   } 
	
	 function bwcomission($position_id,$bw){							
		
		$this->Tree->recursive=-1;
		$treeu=$this->Tree->findByPositionId($position_id);
		$parent_id=$treeu['Tree']['parent_id'];	
		$userId=$treeu['Tree']['user_id'];	
				
		$this->User->recursive=-1;
		$luser=$this->User->findById($userId);
		$bonus_from=$luser['User']['first_name'].' '.$luser['User']['last_name'];				
		
		$i=1;
	    $chain_array=array(); 			
			

		if($parent_id>0){ 	
		
			   $chain_array[$i]=$treeu;	       
			
			   $loop=6;	

				do {	


                        $this->Tree->recursive=-1;
						$p_member=$this->Tree->findByPositionId($parent_id);	
						$parent_id=$p_member['Tree']['parent_id'];
						

						$i++;	

						if($parent_id>=1){ $chain_array[$i]=$p_member; } 							
						if($parent_id==0){ $parent_id=-1; $loop=0; } 

				} while($i<$loop); 	
			}

		 
        $remarks='Board Worth Commission';
		
		if(count($chain_array)>0){
		  foreach($chain_array as $k=>$chain){	 
				
				  $parent_id=$chain['Tree']['parent_id'];	
				  $precord=$this->Position->findById($parent_id);
			      $puserId=$precord['Position']['user_id'];
				  $referralcode=$precord['Position']['referralcode'];
				  
				  $this->Position->query("update acs_positions set bw=bw+$bw where id=".$parent_id); 
				   
				  $this->saveCommission($puserId,3,4,$bw,$remarks,$userId,$bonus_from,$referralcode);	
				  
				  
				$options=array();
				$options['mlmUserId']=$puserId;
				$options['boardWorth']=$bw;
				$options['commision']=0;  				  
				$this->notificationsend($options); 
				  
				 			 
			}	
		  }	 

	   return true;	

    }		

     function uplinecomission($tree_parent_id,$upline_commission){							
		
		$this->Tree->recursive=-1;
		$treeu=$this->Tree->findByPositionId($tree_parent_id);
		$parent_id=$treeu['Tree']['parent_id'];	
		$userId=$treeu['Tree']['user_id'];	
		
		$this->User->recursive=-1;
		$luser=$this->User->findById($userId);
		$bonus_from=$luser['User']['first_name'].' '.$luser['User']['last_name'];				
		
		$i=1;
	    $chain_array=array(); 	

		if($parent_id>0){
		
			    $chain_array[$i]=$treeu;	       
			
				$loop=5;	

				do {	


                        $this->Tree->recursive=-1;
						$p_member=$this->Tree->findByPositionId($parent_id);	
						$parent_id=$p_member['Tree']['parent_id'];	

						$i++;	

						if($parent_id>=1){ $chain_array[$i]=$p_member; } 	
						if($parent_id==0){ $parent_id=-1; $loop=0; } 

				} while($i<$loop); 	
			}

		 
        $remarks='upline commission';	
		
		
		if(count($chain_array)>0){
		  foreach($chain_array as $k=>$chain){	 
				
				  $parent_id=$chain['Tree']['parent_id'];	
				  $precord=$this->Position->findById($parent_id);
			      $puserId=$precord['Position']['user_id'];
				  $referralcode=$precord['Position']['referralcode'];
				  
				 
				  $this->Position->query("update acs_positions set tcommission=tcommission+$upline_commission where id=".$parent_id); 
				   
				  $this->saveCommission($puserId,3,3,$upline_commission,$remarks,$userId,$bonus_from,$referralcode);
				  
				  
				    $options=array();
					$options['mlmUserId']=$puserId;
					$options['boardWorth']=0;
					$options['commision']=$upline_commission;  				  
				    $this->notificationsend($options);
				  
				  					 
			}	
		  }	 

	   return true;	

    }	

     function bcrecursivefunc($loopArr,$pow){ 

        $this->autoRender=false;

        $setting=$this->Setting->findById(1); 
        $matrix=$setting['Setting']['matrix'];   //$matrix=3
		
	    $board=1;
		$p_id=0;					
		$i=0;
		$loop=0;
		
        $count_data=count($loopArr);
        $total_level_member=pow($matrix,$pow);

           do {				


             
			 if($count_data==$total_level_member){ 
			
			  	$memb_id=array(); 
			
			
		
			foreach($loopArr as $pid){
				$membid=$this->Tree->find('all',array('conditions'=>array('Tree.parent_id'=>$pid)));	
				if(count($membid)>0){
					foreach($membid as $memb){					
					   $memb_id[]=$memb['Tree']['position_id'];
					}
				}	
			}
			
			$pow=$pow+1;
			
			
			$level_members=pow($matrix,$pow);
			$lcount=count($memb_id);
			
			
			 if($lcount<$level_members) { 
			    $memb_id=$loopArr; 
			 }	
			 		
			 $loopArr=array();	
			 					
		     $loopArr=$memb_id;
		
		     $count_data=count($loopArr);
             $total_level_member=pow($matrix,$pow);
		 
		 
		     
			 
			 } else { 
			  
			 
		         foreach($loopArr as $rmembid){	
					 
						$noChield=$this->Tree->find('count',array('conditions'=>array('Tree.parent_id'=>$rmembid)));			   	  
						
						if($noChield<$matrix){						    
						     $p_id=$rmembid;
						     break;
						 }
					} 
					
					
				$i = $i+10;	   						
		      
		        
			
			 }	
						 
			 $i=$i+1;  
			 $loop=$loop+1; 

		    } while($i<=$loop); 
			
		return $p_id; 	
 } 
	 	
	 function insertIntoMatrix($position_id,$ref_position_id,$spill_over_id,$isreentry=0){
				
				$this->autoRender = false; 
				
				$level_data=array();
				$user_data=array();
				$memb_id=array();
				$membid=array();
				
				$setting=$this->Setting->findById(1); 
				$matrix=$setting['Setting']['matrix'];   //$matrix=3	
				
				
				$this->Position->recursive=-1;
				$positionr=$this->Position->findById($position_id);				
				$userId=$positionr['Position']['user_id'];
				
				$this->Tree->recursive=-1;
				$tree=$this->Tree->findByPositionId($ref_position_id);				
				
				$p_id=$tree['Tree']['position_id'];
				$p_level=$tree['Tree']['level']+1;
								
						 
		        $is_tree_start=$this->Tree->find('count');					
				$countchild=$this->Tree->find('count',array('conditions'=>array('Tree.parent_id'=>$p_id)));
				
			 
				if($is_tree_start==0){
				
					$level=0;
					$p_id=0;
										
					$level_data=array();	
					$level_data['Tree']['position_id']=$position_id;	
					$level_data['Tree']['user_id']=$userId;			
					$level_data['Tree']['parent_id']=$p_id;
					$level_data['Tree']['level']=$level;						
					$level_data['Tree']['associated_user_id']=0;
					$level_data['Tree']['isreentry']=$isreentry;					
					$level_data['Tree']['spill_over_id']=$spill_over_id;
					$level_data['Tree']['iscompleted']=1;				
					$this->Tree->Create();					
					$this->Tree->Save($level_data);			
				
				
				} else if($countchild<$matrix){				   
					
					$this->Tree->recursive=-1;
		            $trees=$this->Tree->findByPositionId($p_id);
				    $associated_user_id=$trees['Tree']['user_id'];					
												
					$level_data=array();	
					$level_data['Tree']['position_id']=$position_id;	
					$level_data['Tree']['user_id']=$userId;			
					$level_data['Tree']['parent_id']=$p_id;
					$level_data['Tree']['level']=$p_level;						
					$level_data['Tree']['isreentry']=$isreentry;		
					$level_data['Tree']['associated_user_id']=$associated_user_id;				
					$level_data['Tree']['spill_over_id']=$spill_over_id;
					$level_data['Tree']['iscompleted']=0;				
					$this->Tree->Create();					
					$this->Tree->Save($level_data);	
								
				} else {							
				
				    $membid=$this->Tree->find('all',array('conditions'=>array('Tree.parent_id'=>$p_id)));	
					if(count($membid)>0){
					   foreach($membid as $memb){					
					    $memb_id[]=$memb['Tree']['position_id'];
					   }
					}	
													
		               $p_id=$this->bcrecursivefunc($memb_id,1);
				
						$this->Tree->recursive=-1;
						$trees=$this->Tree->findByPositionId($p_id);
						$associated_user_id=$trees['Tree']['user_id'];
						$level=$trees['Tree']['level']+1;				
											
						$level_data=array();	
						$level_data['Tree']['position_id']=$position_id;	
						$level_data['Tree']['user_id']=$userId;			
						$level_data['Tree']['parent_id']=$p_id;
						$level_data['Tree']['level']=$level;			
						$level_data['Tree']['isreentry']=$isreentry;
						$level_data['Tree']['associated_user_id']=$associated_user_id;					
						$level_data['Tree']['spill_over_id']=$spill_over_id;
						$level_data['Tree']['iscompleted']=0;				
						$this->Tree->Create();					
						$this->Tree->Save($level_data);	
								
				}	  						   
						
				
				$nodownChield=$this->Tree->find('count',array('conditions'=>array('Tree.parent_id'=>$p_id)));					
		
		
		       return array($p_id,$nodownChield);
    }		 
	 
	 function businesslogic($id){ 
          		
		    $this->Invoice->recursive=-1;
			$invoice=$this->Invoice->findById($id);	
				
			$amount=$invoice['Invoice']['amount'];
			$userId=$invoice['Invoice']['user_id'];				
			$type=$invoice['Invoice']['type'];
			$payment_status=$invoice['Invoice']['payment_status'];
			$ref_position_id=$invoice['Invoice']['ref_position_id'];	
			$remarks=$invoice['Invoice']['remarks'];	
			

            $this->User->recursive=-1;
			$user=$this->User->findById($userId);           	
			$direct_referral=$user['User']['direct_referral'];				
			$username=$user['User']['username'];	
				
			$setting=$this->Setting->findById(1); 
			$matrix=$setting['Setting']['matrix'];   //$matrix=3	
			$matrix_cycler=$setting['Setting']['matrix_cycler'];   //$matrix=243	
						
			if($type<=2){ 
											
			$payment_date=date('Y-m-d');	
			$this->Invoice->Query("update acs_invoices set payment_status=1,payment_date='".$payment_date."' where id=".$id);	
			$this->User->Query("update acs_users set payment_status=1 where id=".$userId);	
			
			
			
														
			$transaction=array();  
			$transaction['Transaction']['user_id']=$userId;	
			$transaction['Transaction']['type']=1;
			$transaction['Transaction']['payment_through']=$invoice['Invoice']['payment_through'];
			$transaction['Transaction']['payment_status']=$payment_status;
			$transaction['Transaction']['amount']=$amount; 
			$transaction['Transaction']['subscription_type']=1;
			$transaction['Transaction']['remarks']=$remarks;		
			$transaction['Transaction']['created']=date('Y-m-d H:i:s');
			$this->Transaction->Create();
			$this->Transaction->Save($transaction);	
			
			//-------------------	
			
			$board=1;
			
			$isreentry=0;
			if($type==2){ 			
			     $isreentry=1;	
			}
			
			$this->User->Query("update acs_users set total_positions=total_positions+1 where id=".$userId);	
			
			$position_array=array(); 
			$position_array['Position']['user_id']=$userId; 
			$position_array['Position']['username']=$username;
			$position_array['Position']['ref_position_id']=$ref_position_id;
			$position_array['Position']['sponsor_id']=0;				
			$position_array['Position']['isreentry']=$isreentry;		
			$position_array['Position']['direct_referral']=$direct_referral; 	
			$position_array['Position']['created']=date('Y-m-d');
			$this->Position->Create();
			if($this->Position->Save($position_array)){
			  
			   $position_id=$this->Position->id;
			    
			   $referralcode=date('y').str_pad($position_id,6,"0",STR_PAD_LEFT);
			   
			   $this->Position->Query("update acs_positions set referralcode='".$referralcode."' where id=".$position_id);	
			  
			   list($tree_p_id,$noChild)=$this->insertIntoMatrix($position_id,$ref_position_id,$direct_referral,$isreentry);
			   
			   //---------------------------
			   $precord=$this->Position->findById($tree_p_id);
			   $puserId=$precord['Position']['user_id'];
			   $referralcode=$precord['Position']['referralcode'];
			   
			   $this->Position->Query("update acs_positions set sponsor_id=".$puserId." where id=".$position_id);	
			   //----------------------------
			   
			    $bwpoint=$setting['Setting']['bwpoint'];
				
				if($isreentry==0){
			      $this->bwcomission($position_id,$bwpoint);	
				}	
			  	
				$this->updateTree($position_id);	 
				$this->updateunlimiteddethTree($position_id);	 	   
						   
			    if($noChild==$matrix){
			     
				 $capital_refund=$setting['Setting']['capital_refund'];
				 $extra_commission=$setting['Setting']['extra_commission'];
				 $upline_commission=$setting['Setting']['upline_commission'];
				 
				 
				 $this->saveCommission($puserId,3,1,$capital_refund,'capital refund',0,0,$referralcode);
				 $this->saveCommission($puserId,3,2,$extra_commission,'extra commission',0,0,$referralcode);	
				 
				 $this->uplinecomission($tree_p_id,$upline_commission);			 		
				
			   }
			   
			    //CHECKING 1ST STAGE	
											
				$top_position_id=$this->receivableuser($tree_p_id,$board);	
				$treer=$this->Tree->findByPositionIdAndBoard($top_position_id,$board);		
				$level5=$treer['Tree']['level5'];					
				
				$iscyclingcompleted=$treer['Tree']['iscyclingcompleted'];
			    if($level5==$matrix_cycler && $iscyclingcompleted==0){			     
				 $this->Tree->query("update acs_trees set iscyclingcompleted=1 where position_id=".$top_position_id); 	
			   }
			   
			   
			}	
			
			
			 
		  } 
			
			
		return true;
    } 		
	
	function randomCode(){



	$t1 = date("mdy");

	srand ((float) microtime() * 10000000);

	$input = array ("A", "a", "B", "b", "C", "c", "D", "d", "E", "e", "F", "f", "G", "g", "H", "h", "I", "i", "J", "j", "K", "k", "L", "l", "M", "m", "N", "n", "O", "o", "P", "p", "Q", "q", "R", "r", "S", "s", "T", "t", "U", "u", "V", "v", "W", "w", "X", "x", "Y", "y", "Z", "z");



	$rand_keys = array_rand ($input, 3);





	$l1 = $input[$rand_keys[0]];

	$r1 = rand(0,5);

	$l2 = $input[$rand_keys[1]];

	$l3 = $input[$rand_keys[2]];

	$r2 = rand(0,5);

	$code = $l1.$r1.$l2.$l3.$r2;

	return $code;



   }	
   			
	function setusersession($user=array()){	  
							
		$return=array();
	    if(count($user)>0){		
		
		    $user_id=$user['User']['id'];
			$sponsor_id=$user['User']['sponsor_id'];
		    $spositions=array();
				$positions=array();
				$posiresults=$this->Position->find('all',array('conditions'=>array('Position.user_id'=>$user_id),'fields'=>array('Position.referralcode')));	
				if(count($posiresults)>0){
				  foreach($posiresults as $k=>$posiresult){
					$positions[$k+1]=$posiresult['Position'];
				  }
				}  
			 
             
			
			 $return['status']=true;
			 $return['message']='Login successfull';	
			 
			 $dataary=array();			 
			 $dataary['id']=$user['User']['id'];
			 $dataary['username']=$user['User']['username'];					
			 $dataary['first_name']=$user['User']['first_name'];
			 $dataary['last_name']=$user['User']['last_name'];
			 $dataary['email']=$user['User']['email'];	
			 $dataary['mobile']=$user['User']['mobile_no'];
			 $dataary['gender']=$user['User']['gender_id'];
			 $dataary['address']=$user['User']['address']; 
			 $dataary['payment_status']=$user['User']['payment_status'];
			 $dataary['country']=$user['User']['country_id'];
			 $dataary['state']=$user['User']['state'];
			 $dataary['city']=$user['User']['city'];
			 $dataary['zip_code']=$user['User']['zip_code'];
			 $dataary['photo']=Configure::read('siteUrl').'files/user/thumb/'.$user['User']['member_photo'];
			 $dataary['join_date']=date('d M, Y',strtotime($user['User']['created']));	
			 $dataary['user_code']=$positions;	
			 	
			 if($sponsor_id>0){	
			  
			     $this->User->recursive=-1;
			     $sponsor=$this->User->findById($sponsor_id);		       
				$sposiresults=$this->Position->find('all',array('conditions'=>array('Position.user_id'=>$user_id),'fields'=>array('Position.referralcode')));	
				if(count($sposiresults)>0){
				  foreach($sposiresults as $k=>$sposiresult){
					$spositions[$k+1]=$sposiresult['Position'];
				  }
				}  
			 	
				 $dataary['sponsor_photo']=Configure::read('siteUrl').'files/user/thumb/'.$sponsor['User']['member_photo'];		
				 $dataary['sponsor_fullname']=$sponsor['User']['first_name'].' '.$sponsor['User']['last_name'];
				 $dataary['sponsor_email']=$sponsor['User']['email'];
				 $dataary['sponsor_mobile_no']=$sponsor['User']['mobile_no'];
				 $dataary['sponsor_username']=$sponsor['User']['username'];	
				 $dataary['sponsor_code']=$spositions;	
			 } else {
				 $dataary['sponsor_photo']='';		 
				 $dataary['sponsor_fullname']='';
				 $dataary['sponsor_email']='';
				 $dataary['sponsor_mobile_no']='';
				 $dataary['sponsor_username']='';	
				 $dataary['sponsor_code']=$spositions;	
			 }
			 
			$return['data']=$dataary; 
		}

		return $return;	

	}
		
	function recursivefunc($loopArr){ 

        $this->autoRender=false;
	   
		$p_id=0;	
		$i=0;
		$loop=4;		
		$return=array();
       
           do {				
			
			$memb_id=array(); 
			$dataary=array();			
			foreach($loopArr as $pid){
				$membid=$this->Tree->find('all',array('conditions'=>array('Tree.parent_id'=>$pid),'fields'=>array('Tree.position_id','User.username','User.first_name','User.last_name','User.susername')));	
				if(count($membid)>0){
					foreach($membid as $memb){	
									
					   $memb_id[]=$memb['Tree']['position_id'];
					   
					   $datars=array();
					   $datars['position_id']=$memb['Tree']['position_id'];
					   $datars['username']=$memb['User']['username'];
					   $datars['first_name']=$memb['User']['first_name'];
					   $datars['last_name']=$memb['User']['last_name'];
					   $datars['sponsor']=$memb['User']['susername']; 
					   
					   $dataary[]=$datars;
					}
				}	
			}		
						
			 		
			 $loopArr=array();				 					
		     $loopArr=$memb_id;			   		 
			 $return[$i]=$dataary;	
						 
			 $i=$i+1;  
			
		    } while($i<=$loop); 
			
			
		return $return; 	
 } 
 
	
	function recursivefuncdwn($loopArr){ 

        $this->autoRender=false;
	   
		$p_id=0;	
		$i=0;
		$loop=50;		
		
        $datars=array();
		
           do {				
			
			$memb_id=array(); 
			$dataary=array();			
			foreach($loopArr as $pid){
				$membid=$this->Tree->find('all',array('conditions'=>array('Tree.parent_id'=>$pid),'fields'=>array('Tree.position_id')));	
				if(count($membid)>0){
					foreach($membid as $memb){	
									
					   $memb_id[]=$memb['Tree']['position_id'];			   	  
					   
					   $dataary[]=$memb['Tree']['position_id'];	
					}
				}	
			}		
						
			 		
			 $loopArr=array();				 					
		     $loopArr=$memb_id;	 
						 
			 $i=$i+1;  
			
		    } while($i<=$loop); 
			
			
			$coountdl=count($dataary);
			
			
		return $coountdl; 	
 } 
	
	
	
    public function login() {
	    $this->autoRender=false;

	    $return=array();	   
		$return['status']=false;
		$return['message']='Login unsuccessfull';

		
	    if($this->request->is('post')) {			

		    $data = json_decode(file_get_contents('php://input'),true);	
			//$data=$_POST;			
						
			$username=$data['username'];
			$password=AuthComponent::password($data['password']);			

             			
			$this->User->recursive=-1;	
			$user=$this->User->findByUsernameAndPassword($username,$password);
			
			if($user!=false) { 				
									
				$return=$this->setusersession($user);			
				
			}		   

		}	
		
		echo json_encode($return);	

	}
		
	public function sponsor_verification(){	  

	        $this->autoRender=false; 

			$return=array();
			$return['status']=false;
			$return['message']='No match found';

			if($this->request->is('post')) {	
			
			        $data = json_decode(file_get_contents('php://input'),true);
					//$data=$_POST;	
					$sponsor_code=$data['sponsor_code'];
					
					if($sponsor_code){						
		
						$user=$this->Position->findByReferralcode($sponsor_code);	
						if($user!=false){				
						   $return['status']=true;
						   $return['message']='This sponsor code is correct'; 
						} else {
						   $return['message']='No match found'; 
						}
		
					} else {
								 
					  $return['error']='No match found'; 
		
					} 			
			
			}			

		 echo json_encode($return);	

	}	 
 	
	public function sign_up() {

	    $this->autoRender=false;

	    $return=array();
	    $return['status']=false;
	    $return['message']='Data Error'; 
		
		$error=array();
		if($this->request->is('post')) {		   
               
                $iserror=0;
			   // $data=$_POST;	
				$data = json_decode(file_get_contents('php://input'),true);			
								
				$sponsor_code=$data['sponsor_code'];				
				$username=$data['username'];
				$first_name=$data['first_name'];
				$last_name=$data['last_name'];
				$email=$data['email'];
				$mobile_no=$data['mobile_no'];
				$password='12345678';				

				
				
			  if($sponsor_code){ 			  				
				
				$user=$this->Position->findByReferralcode($sponsor_code);	
				if($user==false){	
				  $iserror=1;
				  $error[]='The sponsor code is not exists.';	
				} else {
				  
				  $ref_position_id=$user['Position']['id'];	
				  $sponsor_posotion_code=$user['Position']['referralcode'];	
				  
				  
				  $this->User->recursive=-1;
				  $referral_user=$this->User->findById($user['Position']['user_id']);
				}
				 					 				
			   } else {			   
			     $this->User->recursive=-1;
				 $referral_user=$this->User->findById(1);	
				 
				 $adminuser=$this->Position->find('first',array('conditions'=>array('Position.user_id'=>1),'order'=>array('Position.id'=>'DESC')));	
				 $ref_position_id=$adminuser['Position']['id'];	
				 
				 $sponsor_posotion_code=$adminuser['Position']['referralcode'];	
			   }	
			   
			   
			    /*$this->User->recursive=-1;
				$newuser=$this->User->findByUsername($username);	
				if($newuser!=false){	
				  $iserror=1;
				  $message.='The username exists. Please, enter new username.';	
				} 	
              */
			  
			    
			  if(strlen($first_name)==0 || empty($first_name)){
			     $iserror=1;
			     $error[]='First name is required';	
			  }
			  
			  if(strlen($last_name)==0 || empty($last_name)){
			     $iserror=1;
			     $error[]='Last name is required';	
			  }
			  
			 if(strlen($mobile_no)==0 || empty($mobile_no)){
			     $iserror=1;
			     $error[]='Phone number required numbers only';	
			  } 
			    			  
			  
				$this->User->recuesive=-1;
				$count_mobile=$this->User->find('count',array('conditions'=>array('User.mobile_no'=>$mobile_no)));	
				if($count_mobile>=1){
				   $iserror=1;
				   $error[]='Mobile number is already used';	
				}
					   
			   
			   				
				$this->request->data['User']['sponsor_id']=$referral_user['User']['id'];  
				$this->request->data['User']['direct_referral']=$referral_user['User']['id'];  	
				$this->request->data['User']['username']=$username;					
				$this->request->data['User']['susername']==$referral_user['User']['username'];			
				$this->request->data['User']['password'] =AuthComponent::password($password);		
				$this->request->data['User']['first_name']=$first_name;	
				$this->request->data['User']['last_name']=$last_name;					
				$this->request->data['User']['email']=$email;	
				$this->request->data['User']['mobile_no']=$mobile_no;					
				$this->request->data['User']['status']=1;	
				$this->request->data['User']['payment_status']=0;  	
				$this->request->data['User']['group_id']=2;		
				$this->request->data['User']['member_photo']="noimage.jpg";	
				$this->request->data['User']['created']=date('Y-m-d');
				$this->request->data['User']['last_login_datetime']=date('Y-m-d H:i:s');
				$this->request->data['User']['last_logout_datetime']=date('Y-m-d H:i:s');		

			if($iserror==0){				

					$this->User->create();
					if($this->User->save($this->request->data)){	
					
					$user_id=$this->User->id;
					
					$rsetting=$this->Setting->findById(1);			
					$joining_fees=$rsetting['Setting']['joining_fees'];
										
					$remarks='New Position Fees';
					$transaction_number=rand(10,99).time();
					$invoice=array();   
					$invoice['Invoice']['user_id']=$user_id;			
					$invoice['Invoice']['amount']=$joining_fees;		
					$invoice['Invoice']['type']=1;									 				
					$invoice['Invoice']['payment_through']='E-Wallet';
					$invoice['Invoice']['payment_status']=1;	
					$invoice['Invoice']['ref_position_id']=$ref_position_id;			
					$invoice['Invoice']['remarks']=$remarks;	
					$invoice['Invoice']['transaction_number']=$transaction_number;
					$invoice['Invoice']['created']=date('Y-m-d H:i:s');                  
					$invoice['Invoice']['payment_date']=date('Y-m-d');					
					$this->Invoice->Create();			
					if($this->Invoice->Save($invoice)){												            			
					    $this->businesslogic($this->Invoice->id);	 
					}			
             																			
					 $this->Position->recursive=-1;
					 $juser=$this->Position->findByUserId($user_id);	
					
					  $return['status']=true;
					  $return['user_id']=$user_id;
					  $return['referral_code']=$sponsor_posotion_code;
					  $return['entry_position_id']=$juser['Position']['id'];	
					  $return['entry_position_code']=$juser['Position']['referralcode'];	
					  $return['message']='New account has been created successfully'; 
					  
					  
					
					} else {
					
					  $return['message']='New account has not been created. Please, try again.'; 
										
					}			

			  } else {
			     $return['message']='Validation Error'; 	 
			     $return['error']=$error; 	 
			  }		          
		  }		  		  
		
		echo json_encode($return);	

	}	
	
	public function getprofile(){
	  
		   $this->autoRender=false;	
		 
			$return=array();
			$return['status']=false;
			$return['message']='Data Error';

			if($this->request->is('post')) {	
			$data = json_decode(file_get_contents('php://input'),true);
			//$data=$_POST;	
			$user_id=$data['user_id'];
		
	        if($user_id>0){
			
			    $return['status']=true;
			    $return['message']='successful';
			
				$this->User->recursive=-1;	
				$user=$this->User->findById($user_id);			
				if($user!=false) {
					$return = $this->get_profile_details($return, $user); // , $user_id
				} else {
					$return['status']=false;
					$return['message']='Invalid user id';
				}
			}	
		}
		
        echo json_encode($return);
	}

	public function getprofileByEmail() {
	  
		$this->autoRender=false;	
	  
		$return=array();
		$return['status']=false;
		$return['message']='Data Error';

		if($this->request->is('post')) {	
			$data = json_decode(file_get_contents('php://input'),true);
			//$data=$_POST;	
			$email=$data['email'];
		
			if($email != null){
				$return['status']=true;
				$return['message']='successful';
			
				$this->User->recursive=-1;	
				$user= $this->User->find('first', array('conditions' => array('email' => $email))); // $this->User->findById($user_id);			
				if(!empty($user)) { // $user!=null
					$return = $this->get_profile_details($return, $user); //, $user_id
				} else {
					$return['status']=false;
					$return['message']='Invalid email address';
				}		
			}	
		}
		
		echo json_encode($return);
	}

	function get_profile_details($return, $user){
		$user_id = $user['User']['id'];
		$capital_refund=$this->Transaction->find('all',array('conditions'=>array('Transaction.user_id'=>$user_id,'Transaction.type'=>3,'Transaction.commission_type'=>1),'fields'=>array('sum(Transaction.amount) as amount')));
		$capitalrefund=$capital_refund['0']['0']['amount']+0;	
		
		$extra_commission=$this->Transaction->find('all',array('conditions'=>array('Transaction.user_id'=>$user_id,'Transaction.type'=>3,'Transaction.commission_type'=>2),'fields'=>array('sum(Transaction.amount) as amount')));
		$extracommission=$extra_commission['0']['0']['amount']+0;	
		
		$upline_commission=$this->Transaction->find('all',array('conditions'=>array('Transaction.user_id'=>$user_id,'Transaction.type'=>3,'Transaction.commission_type'=>3),'fields'=>array('sum(Transaction.amount) as amount')));
		$uplinecommission=$upline_commission['0']['0']['amount']+0;	
		
		$total_bw=$this->Transaction->find('all',array('conditions'=>array('Transaction.user_id'=>$user_id,'Transaction.type'=>3,'Transaction.commission_type'=>4),'fields'=>array('sum(Transaction.amount) as amount')));
		$totalbw=$total_bw['0']['0']['amount']+0;						
		
		$sale_amount=$this->Invoice->find('all',array('conditions'=>array('Invoice.user_id'=>$user_id,'Invoice.payment_status'=>1,'Invoice.type'=>1),'fields'=>array('sum(Invoice.amount) as amount')));			
		$purchased_amount=$sale_amount['0']['0']['amount']+0;		
		
		
		$treedownline=array();
		$treeresults=$this->Tree->find('all',array('conditions'=>array('Tree.user_id'=>$user_id),'fields'=>array('Tree.id','Tree.totaldepth_members','Position.referralcode')));	
		if(count($treeresults)>0){
		foreach($treeresults as $k=>$treeresult){
		
			$treetol=array();
			$treetol['referralcode']=$treeresult['Position']['referralcode'];
			$treetol['total_downline']=$treeresult['Tree']['totaldepth_members'];
			
		// $treedownline[$k+1]=$treetol;
			
			array_push($treedownline,$treetol);
		}
		}
		
		$positions=array();
		$posiresults=$this->Position->find('all',array('conditions'=>array('Position.user_id'=>$user_id),'fields'=>array('Position.referralcode','Position.bw','Position.tcommission')));	
		if(count($posiresults)>0){
		foreach($posiresults as $k=>$posiresult){
		// $positions[$k+1]=$posiresult['Position'];
			
			array_push($positions,$posiresult['Position']);
			
		}
		}
		
		$this->User->recursive=-1;
		$sponsor=$this->User->findById($user['User']['sponsor_id']);
			
		$dataary=array();			 
		$dataary['id']=$user['User']['id'];
		$dataary['username']=$user['User']['username'];					
		$dataary['first_name']=$user['User']['first_name'];
		$dataary['last_name']=$user['User']['last_name'];
		$dataary['email']=$user['User']['email'];	
		$dataary['mobile']=$user['User']['mobile_no'];
		$dataary['gender']=$user['User']['gender_id'];
		$dataary['address']=$user['User']['address']; 
		$dataary['payment_status']=$user['User']['payment_status'];
		$dataary['country']=$user['User']['country_id'];
		$dataary['state']=$user['User']['state'];
		$dataary['city']=$user['User']['city'];
		$dataary['zip_code']=$user['User']['zip_code'];
		$dataary['photo']=Configure::read('siteUrl').'files/user/thumb/'.$user['User']['member_photo'];
		$dataary['join_date']=date('d M, Y',strtotime($user['User']['created']));				
		$dataary['sponsor_photo']=Configure::read('siteUrl').'files/user/thumb/'.$sponsor['User']['member_photo'];		
		$dataary['sponsor_fullname']=$sponsor['User']['first_name'].' '.$sponsor['User']['last_name'];
		$dataary['sponsor_email']=$sponsor['User']['email'];
		$dataary['sponsor_mobile_no']=$sponsor['User']['mobile_no'];
		$dataary['sponsor_username']=$sponsor['User']['username'];	
		$dataary['capital_refund']=$capitalrefund;	
		$dataary['extra_commission']=$extracommission;
		$dataary['upline_commission']=$uplinecommission;
		$dataary['total_bw']=$totalbw;
		$dataary['purchased_amount']=$purchased_amount;				
		$dataary['total_positions']=$user['User']['total_positions'];	
			
		$return['data']=$dataary; 	
		$return['downline']=$treedownline; 	
		$return['bw_commission']=$positions; 	
		
		return $return;
	}
	 	     
	public function getdownline() {

			$this->autoRender=false;
			
			$return=array();			
			$return['status']=false;
			$return['message']='Data Error';
			
			if($this->request->is('post')) {	
			
				//$data=$_POST;	
				$data = json_decode(file_get_contents('php://input'),true);
				$referralcode=$data['referralcode'];
				
				
				
				if($referralcode>0){
				
				   $return['status']=true;
				   $return['message']='successful';
				   $precord=$this->Position->find('first',array('conditions'=>array('Position.referralcode'=>$referralcode)));
				 //  $precord=$this->Position->find('first',array('conditions'=>array('Position.user_id'=>$user_id,'Position.isreentry'=>0),'order'=>array('Position.id'=>'ASC')));
				   
				   $loopary=array();
				   $loopary[]=$precord['Position']['id'];
				   
				   $return['data']=$this->recursivefunc($loopary);
				   
				
				}					
			
			}

		    echo json_encode($return);	

	 }	
	    
	
	public function getinfobyreferralcode($code=0) {

			$this->autoRender=false;
			
			$return=array();			
			$return['status']=false;
			$return['message']='Data Error';
			$return['total_bw']=0;
			$return['total_commission']=0;
			$return['total_downline']=0;
			
			if($code==0){
						
			if($this->request->is('post')) {	
			
				//$data=$_POST;	
				$data = json_decode(file_get_contents('php://input'),true);
				$referralcode=$data['referralcode'];
				
				if($referralcode>0){
				
				   $return['status']=true;
				   $return['message']='successful';
				   
				   $precord=$this->Position->find('first',array('conditions'=>array('Position.referralcode'=>$referralcode)));
				   if($precord){
				   
						$tree=$this->Tree->find('first',array('conditions'=>array('Tree.position_id'=>$precord['Position']['id'])));
						
						$comtranx=$this->Transaction->find('all',array('conditions'=>array('Transaction.user_id'=>$precord['Position']['user_id'],'Transaction.type'=>3,'Transaction.commission_type <= '=>3),'fields'=>array('sum(Transaction.amount) as amount')));
						$comtranxrefund=$comtranx['0']['0']['amount']+0;	
						
						 
						$return['total_bw']=$precord['Position']['bw'];
						$return['total_commission']=$comtranxrefund;
						$return['total_downline']=$tree['Tree']['totaldepth_members'];
						
						//$loopary=array();
						//$loopary[]=$precord['Position']['id'];				   
						//$return['total_downline']=$this->recursivefuncdwn($loopary);
						
				   }
				
				}					
			
			}
			
			
			  
			  
			  
			  } else {
			
			  if($code>0){
				
				   $return['status']=true;
				   $return['message']='successful';
				   
				   $precord=$this->Position->find('first',array('conditions'=>array('Position.referralcode'=>$code)));
				   if($precord){
				        $tree=$this->Tree->find('first',array('conditions'=>array('Tree.position_id'=>$precord['Position']['id'])));
						
						
						$comtranx=$this->Transaction->find('all',array('conditions'=>array('Transaction.user_id'=>$precord['Position']['user_id'],'Transaction.type'=>3,'Transaction.commission_type <= '=>3),'fields'=>array('sum(Transaction.amount) as amount')));
						$comtranxrefund=$comtranx['0']['0']['amount']+0;	
												
						$return['total_bw']=$precord['Position']['bw'];
						$return['total_commission']=$comtranxrefund;
						$return['total_downline']=$tree['Tree']['totaldepth_members'];
								
						
						//$loopary=array();
						//$loopary[]=$precord['Position']['id'];				   
						//$return['total_downline']=$this->recursivefuncdwn($loopary);
						
				   }
				
				}				
			
			}
			

		    echo json_encode($return);	

	 }
	
	
	
	public function buy_position() {
	
	    $this->autoRender=false;
		$return=array();
	    $return['status']=false;
	    $return['message']='Data Error'; 
		
		 
		 $error=array();
	     $iserror=0;
	 
	    if($this->request->is('post')) {
		
		
		    //$data=$_POST;		
			$data = json_decode(file_get_contents('php://input'),true);	
		
		    $username=trim($data['username']); 
			$placement_positionid=trim($data['placement_positionid']); 
		    $remarks=trim($data['remarks']); 					 		
		
			$position_user=$this->User->findByUsername($username);
			if($position_user==false){	
			    $iserror=1;
			    $error[]='Member username is not exists. Please, enter correct username.';						
			} 
			
			$place_position_user=$this->Position->findByReferralcode($placement_positionid);
			if($place_position_user==false){
			    $iserror=1;
			    $error[]='Placement Position Referral ID is not exists. Please, enter correct Placement Position Referral ID.';						
			} 
			
			$ref_position_id=$place_position_user['Position']['id'];	
			$userId=$position_user['User']['id'];	
						
			$this->User->recursive=-1;
			$user=$this->User->findById($userId);	
		
			$rsetting=$this->Setting->findById(1);			
			$joining_fees=$rsetting['Setting']['joining_fees'];
			$max_stage_one_buy_position=$rsetting['Setting']['max_stage_one_buy_position'];
			
			$total_positions=$user['User']['total_positions'];	
			
			if($iserror==0){
			
			if($total_positions<$max_stage_one_buy_position){
			
			$remarks='New Position Fees';
			$transaction_number=rand(10,99).time();
			$invoice=array();   
			$invoice['Invoice']['user_id']=$user['User']['id'];			
			$invoice['Invoice']['amount']=$joining_fees;		
			$invoice['Invoice']['type']=2;									 				
			$invoice['Invoice']['payment_through']='E-Wallet';
			$invoice['Invoice']['payment_status']=1;	
			$invoice['Invoice']['ref_position_id']=$ref_position_id;			
			$invoice['Invoice']['remarks']=$remarks;	
			$invoice['Invoice']['transaction_number']=$transaction_number;
			$invoice['Invoice']['created']=date('Y-m-d H:i:s');                  
			$invoice['Invoice']['payment_date']=date('Y-m-d');					
			$this->Invoice->Create();			
			if($this->Invoice->Save($invoice)){												            			
			  $this->businesslogic($this->Invoice->id);	 
			}				
             
			 $return['status']=true;
			 $return['message']='The new position has been created successfully.'; 
		     $error[]='';

			} else {
			  
			  $return['message']='Validation Error'; 
			  $error[]='You already bought maximum stage 1 position.';
			
			}			
			
			 	 
			 $return['error']=$error; 	 
			
			
			} else {
			
			 $return['message']='Validation Error'; 	 
			 $return['error']=$error; 	 
			}			
		
		}
		
	    echo json_encode($return);	

	}

}