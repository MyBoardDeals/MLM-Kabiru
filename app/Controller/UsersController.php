<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::import('Vendor', 'captcha/captcha');
App::import('Lib', 'Watimage');



/**
 * Users Controller
 *
 * @property User $User
 */
 
 

class UsersController extends AppController {


	var $name = 'Users'; 
	
	public $uses=array('Group','State','Country','User','Gender','Setting','Invoice','Tree','Transaction','EmailTemplate','Position');  

		

	public $paginate = array('limit' => 100);	
	

	public function beforeFilter() {

   		 	parent::beforeFilter();

			 $this->Auth->allow('captcha_image','ajaxcommon','randomCode','ajax_common','admin_testsend');
			 	

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
	
	
	
/*public function admin_testsend(){	
	    $this->autoRender=false;
		
		$options=array();
		$options['mlmUserId']='744';
		$options['boardWorth']=10;
		$options['commision']=0;  				  
		$result=$this->notificationsend($options);
		
		debug($result);
		
		die();
	
}*/		


public function captcha_image(){

  App::import('Vendor', 'captcha/captcha');

  $captcha = new captcha();

  $captcha->show_captcha();

}



	public function login() {	
	
		$this->redirect('/administrators/login');	
	}	

	

	   

     public function admin_login() {

         $this->redirect('/administrators/login');

	 }



   

	public function logout() {
	    $this->Auth->logout();
        $this->redirect('/administrators/login');
	}


    public function admin_logout() {

	        

			$user=$this->Auth->User();	
			$datetime=date('Y-m-d H:i:s');    				

			$this->User->id=$user['id'];					
			$this->User->saveField('last_logout_datetime',$datetime);		
          
			
            $this->Auth->logout();
		    $this->redirect('/administrators/login');

			

	}

	

	

	public function admin_change_password() {

	

        $id=$this->Auth->User('id');

				 

		$this->User->id = $id;

		if (!$this->User->exists()) {

		throw new NotFoundException(__('Invalid user'));

		}

		

		if ($this->request->is('post') || $this->request->is('put')) {

			

		    $this->request->data['User']['password'] = AuthComponent::password($this->request->data['User']['password']);

			if ($this->User->save($this->request->data)) {

				 $this->Session->setFlash(__('The password has been saved'));

				 $this->redirect(array('action' => 'index'));

			} else {

				$this->Session->setFlash(__('The password could not be saved. Please, try again.'));

			}

		} else {

		   $this->request->data = $this->User->read(null, $id);

		}		 

			 

	}

	








	

	
	public function admin_csv($fdate=null,$tdate=null) {	

		$this->layout=false;	
		
		$search=array();
		//$search['User.status']=0;		
		$this->set('results',$this->User->find('all',array('conditions'=>$search)));
		$this->set('filename','user');							
		
			
		$headers  = array('No','Username','First Name','Last name','Sponsor Username','Email','Address','Mobile No','Country','Joining Date','Status');
		$head=$this->set('header',$headers);

	}

		
	
	
		
  
	

 

 public function randomCode(){

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

   function recursivefunc($loopArr,$pow){ 

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
													
		               $p_id=$this->recursivefunc($memb_id,1);
				
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
   
   /*function cycling1matrix($userId,$board=1,$spill_over_id){
            $this->autoRender=false;
		
		    $setting=$this->Setting->findById(1); 
			$matrix=$setting['Setting']['matrix'];   //$matrix=6	
		
		
		    $position_array=array(); 
			$position_array['Position']['user_id']=$userId; 
			
			$position_array['Position']['isreentry']=1;
			$position_array['Position']['created']=date('Y-m-d');
			$this->Position->Create();
			if($this->Position->Save($position_array)){
			  
			   $position_id=$this->Position->id;
			   list($tree_p_id,$noChild)=$this->insertIntoMatrix($position_id,$userId,$board,$spill_over_id);
			   
			   if($noChild==$matrix){
			    
				 $this->Tree->query("update acs_trees set iscyclingcompleted=1 where position_id=".$tree_p_id);  
				 
				 $this->Tree->recursive=-1;
			     $treer=$this->Tree->findByPositionId($tree_p_id);   
				 $cycling_1_userId=$treer['Tree']['user_id'];
				 $cycling_1_position_id=$tree_p_id;	
				 $spill_over_id=$treer['Tree']['spill_over_id'];		 
				 
				 //-----------Cycler 1 Done Bonus Calculation Here-------------- 
				 $this->Plan->recursive=-1;	
				 $plan=$this->Plan->findById(1); 
				 $bonus_amount=$plan['Plan']['bonus'];
				 $remarks='Phase 1 bonus';
				 $this->saveCommission($cycling_1_userId,3,1,$bonus_amount,$remarks);
				 //----------------------
				 			
				 $this->cycling1matrix($cycling_1_userId,1,$spill_over_id);
				 $this->cycling2matrix($cycling_1_position_id,$cycling_1_userId,2,$spill_over_id);
				
				
			   }
			   
			   
			}	
		
		
   
   }*/
   	
				 
 /*  function stage2matrix($position_id,$userId,$board=2,$direct_sponsor,$isreentry=0){
				$this->autoRender=false;
				
				$setting=$this->Setting->findById(1); 
				$matrix=$setting['Setting']['matrix'];   //$matrix=3	
				$matrix_cycler=$setting['Setting']['matrix_cycler'];   //$matrix=243	
				
				list($tree_p_id,$noChild)=$this->insertIntoMatrix($position_id,$userId,$board,$direct_sponsor,$isreentry);
				
				$precord=$this->Position->findById($tree_p_id);
				$puserId=$precord['Position']['user_id'];
								
				$this->updateTree($position_id,$board);		   
						   
			    if($noChild==$matrix){
			     
				 $capital_refund=$setting['Setting']['capital_refund'];
				 $extra_commission=$setting['Setting']['extra_commission'];
				 $upline_commission=$setting['Setting']['upline_commission'];
				 
				 
				 $this->saveCommission($puserId,3,1,$capital_refund,'capital refund',0,0,$board);
				 $this->saveCommission($puserId,3,2,$extra_commission,'extra commission',0,0,$board);	
				 
				 $this->uplinecomission($tree_p_id,$upline_commission,$board);			 		
				
			   }
			   
			    //CHECKING 1ST STAGE
				
			    $top_position_id=$this->receivableuser($tree_p_id,$board);				
				
				$treer=$this->Tree->findByPositionIdAndBoard($top_position_id,$board);
				$level5=$treer['Tree']['level5'];
				$iscyclingcompleted=$treer['Tree']['iscyclingcompleted'];
				$stage_3_direct_sponsor=$treer['Tree']['spill_over_id'];
				$stage_3_userId=$treer['Tree']['user_id'];
				$stage_3_isreentry=$treer['Tree']['isreentry'];
				
			    if($level5==$matrix_cycler && $iscyclingcompleted==0){
			     
				 $this->Tree->query("update acs_trees set iscyclingcompleted=1 where position_id=".$top_position_id." and board=".$board); 	
				 	
				 $this->stage3matrix($top_position_id,$stage_3_userId,3,$stage_3_direct_sponsor,$stage_3_isreentry);				
				
			   } 
   
       }
	   
   function stage3matrix($position_id,$userId,$board=3,$direct_sponsor,$isreentry=0){
				$this->autoRender=false;
				
				$setting=$this->Setting->findById(1); 
				$matrix=$setting['Setting']['matrix'];   //$matrix=3	
				$matrix_cycler=$setting['Setting']['matrix_cycler'];   //$matrix=243	
				
				list($tree_p_id,$noChild)=$this->insertIntoMatrix($position_id,$userId,$board,$direct_sponsor,$isreentry);
				
				$precord=$this->Position->findById($tree_p_id);
				$puserId=$precord['Position']['user_id'];
								
				$this->updateTree($position_id,$board);		   
						   
			    if($noChild==$matrix){
			     
				 $capital_refund=$setting['Setting']['capital_refund'];
				 $extra_commission=$setting['Setting']['extra_commission'];
				 $upline_commission=$setting['Setting']['upline_commission'];
				 
				 
				 $this->saveCommission($puserId,3,1,$capital_refund,'capital refund',0,0,$board);
				 $this->saveCommission($puserId,3,2,$extra_commission,'extra commission',0,0,$board);	
				 
				 $this->uplinecomission($tree_p_id,$upline_commission,$board);		 		
				
			   }
			   
			    //CHECKING 1ST STAGE
				
			    $top_position_id=$this->receivableuser($tree_p_id,$board);				
				
				$treer=$this->Tree->findByPositionIdAndBoard($top_position_id,$board);
				$level5=$treer['Tree']['level5'];
				$iscyclingcompleted=$treer['Tree']['iscyclingcompleted'];
				$stage_4_direct_sponsor=$treer['Tree']['spill_over_id'];
				$stage_4_userId=$treer['Tree']['user_id'];
				$stage_4_isreentry=$treer['Tree']['isreentry'];
				
			    if($level5==$matrix_cycler && $iscyclingcompleted==0){
			     
				 $this->Tree->query("update acs_trees set iscyclingcompleted=1 where position_id=".$top_position_id." and board=".$board); 	
				 	
				 $this->stage4matrix($top_position_id,$stage_4_userId,4,$stage_4_direct_sponsor,$stage_4_isreentry);				
				
			   } 
   
       }	
	   
   function stage4matrix($position_id,$userId,$board=4,$direct_sponsor,$isreentry=0){
				$this->autoRender=false;
				
				$setting=$this->Setting->findById(1); 
				$matrix=$setting['Setting']['matrix'];   //$matrix=3	
				$matrix_cycler=$setting['Setting']['matrix_cycler'];   //$matrix=243	
				
				list($tree_p_id,$noChild)=$this->insertIntoMatrix($position_id,$userId,$board,$direct_sponsor,$isreentry);
				
				$precord=$this->Position->findById($tree_p_id);
				$puserId=$precord['Position']['user_id'];
								
				$this->updateTree($position_id,$board);		   
						   
			    if($noChild==$matrix){
			     
				 $capital_refund=$setting['Setting']['capital_refund'];
				 $extra_commission=$setting['Setting']['extra_commission'];
				 $upline_commission=$setting['Setting']['upline_commission'];
				 
				 
				 $this->saveCommission($puserId,3,1,$capital_refund,'capital refund',0,0,$board);
				 $this->saveCommission($puserId,3,2,$extra_commission,'extra commission',0,0,$board);	
				 
				 $this->uplinecomission($tree_p_id,$upline_commission,$board);		 		
				
			   }
			   
			    //CHECKING 1ST STAGE
				
			    $top_position_id=$this->receivableuser($tree_p_id,$board);				
				
				$treer=$this->Tree->findByPositionIdAndBoard($top_position_id,$board);
				$level5=$treer['Tree']['level5'];
				$iscyclingcompleted=$treer['Tree']['iscyclingcompleted'];
				$stage_5_direct_sponsor=$treer['Tree']['spill_over_id'];
				$stage_5_userId=$treer['Tree']['user_id'];
				$stage_5_isreentry=$treer['Tree']['isreentry'];
				
			    if($level5==$matrix_cycler && $iscyclingcompleted==0){
			     
				 $this->Tree->query("update acs_trees set iscyclingcompleted=1 where position_id=".$top_position_id." and board=".$board); 	
				 	
				 $this->stage3matrix($top_position_id,$stage_5_userId,5,$stage_5_direct_sponsor,$stage_5_isreentry);				
				
			   } 
   
       }	      
	   
   function stage5matrix($position_id,$userId,$board=5,$direct_sponsor,$isreentry=0){
				$this->autoRender=false;
				
				$setting=$this->Setting->findById(1); 
				$matrix=$setting['Setting']['matrix'];   //$matrix=3	
				$matrix_cycler=$setting['Setting']['matrix_cycler'];   //$matrix=243	
				
				list($tree_p_id,$noChild)=$this->insertIntoMatrix($position_id,$userId,$board,$direct_sponsor,$isreentry);
				
				$precord=$this->Position->findById($tree_p_id);
				$puserId=$precord['Position']['user_id'];
								
				$this->updateTree($position_id,$board);		   
						   
			    if($noChild==$matrix){
			     
				 $capital_refund=$setting['Setting']['capital_refund'];
				 $extra_commission=$setting['Setting']['extra_commission'];
				 $upline_commission=$setting['Setting']['upline_commission'];
				 
				 
				 $this->saveCommission($puserId,3,1,$capital_refund,'capital refund',0,0,$board);
				 $this->saveCommission($puserId,3,2,$extra_commission,'extra commission',0,0,$board);	
				 
				 $this->uplinecomission($tree_p_id,$upline_commission,$board);		 		
				
			   }
			   
			    //CHECKING 1ST STAGE
				
			    $top_position_id=$this->receivableuser($tree_p_id,$board);				
				
				$treer=$this->Tree->findByPositionIdAndBoard($top_position_id,$board);
				$level5=$treer['Tree']['level5'];
				$iscyclingcompleted=$treer['Tree']['iscyclingcompleted'];
				$stage_6_direct_sponsor=$treer['Tree']['spill_over_id'];
				$stage_6_userId=$treer['Tree']['user_id'];
				$stage_6_isreentry=$treer['Tree']['isreentry'];
				
			    if($level5==$matrix_cycler && $iscyclingcompleted==0){
			     
				 $this->Tree->query("update acs_trees set iscyclingcompleted=1 where position_id=".$top_position_id." and board=".$board); 	
				 	
				 $this->stage6matrix($top_position_id,$stage_6_userId,6,$stage_6_direct_sponsor,$stage_6_isreentry);				
				
			   } 
   
       }	
	         
   function stage6matrix($position_id,$userId,$board=6,$direct_sponsor,$isreentry=0){
				$this->autoRender=false;
				
				$setting=$this->Setting->findById(1); 
				$matrix=$setting['Setting']['matrix'];   //$matrix=3	
				$matrix_cycler=$setting['Setting']['matrix_cycler'];   //$matrix=243	
				
				list($tree_p_id,$noChild)=$this->insertIntoMatrix($position_id,$userId,$board,$direct_sponsor,$isreentry);
				
				$precord=$this->Position->findById($tree_p_id);
				$puserId=$precord['Position']['user_id'];
								
				$this->updateTree($position_id,$board);		   
						   
			    if($noChild==$matrix){
			     
				 $capital_refund=$setting['Setting']['capital_refund'];
				 $extra_commission=$setting['Setting']['extra_commission'];
				 $upline_commission=$setting['Setting']['upline_commission'];
				 
				 
				 $this->saveCommission($puserId,3,1,$capital_refund,'capital refund',0,0,$board);
				 $this->saveCommission($puserId,3,2,$extra_commission,'extra commission',0,0,$board);	
				 
				 $this->uplinecomission($tree_p_id,$upline_commission,$board);			 		
				
			   }
			   
			    //CHECKING 1ST STAGE
				
			    $top_position_id=$this->receivableuser($tree_p_id,$board);				
				
				$treer=$this->Tree->findByPositionIdAndBoard($top_position_id,$board);
				$level5=$treer['Tree']['level5'];
				$iscyclingcompleted=$treer['Tree']['iscyclingcompleted'];
				$stage_7_direct_sponsor=$treer['Tree']['spill_over_id'];
				$stage_7_userId=$treer['Tree']['user_id'];
				$stage_7_isreentry=$treer['Tree']['isreentry'];
				
			    if($level5==$matrix_cycler && $iscyclingcompleted==0){
			     
				 $this->Tree->query("update acs_trees set iscyclingcompleted=1 where position_id=".$top_position_id." and board=".$board); 	
				 	
				 $this->stage7matrix($top_position_id,$stage_7_userId,7,$stage_7_direct_sponsor,$stage_7_isreentry);				
				
			   } 
   
       }

   function stage7matrix($position_id,$userId,$board=7,$direct_sponsor,$isreentry=0){
				$this->autoRender=false;
				
				$setting=$this->Setting->findById(1); 
				$matrix=$setting['Setting']['matrix'];   //$matrix=3	
				$matrix_cycler=$setting['Setting']['matrix_cycler'];   //$matrix=243	
				
				list($tree_p_id,$noChild)=$this->insertIntoMatrix($position_id,$userId,$board,$direct_sponsor,$isreentry);
				
				$precord=$this->Position->findById($tree_p_id);
				$puserId=$precord['Position']['user_id'];
								
				$this->updateTree($position_id,$board);		   
						   
			    if($noChild==$matrix){
			     
				 $capital_refund=$setting['Setting']['capital_refund'];
				 $extra_commission=$setting['Setting']['extra_commission'];
				 $upline_commission=$setting['Setting']['upline_commission'];
				 
				 
				 $this->saveCommission($puserId,3,1,$capital_refund,'capital refund',0,0,$board);
				 $this->saveCommission($puserId,3,2,$extra_commission,'extra commission',0,0,$board);	
				 
				 $this->uplinecomission($tree_p_id,$upline_commission,$board);		 		
				
			   }
			   
			    //CHECKING 1ST STAGE
				
			    $top_position_id=$this->receivableuser($tree_p_id,$board);				
				
				$treer=$this->Tree->findByPositionIdAndBoard($top_position_id,$board);
				$level5=$treer['Tree']['level5'];
				$iscyclingcompleted=$treer['Tree']['iscyclingcompleted'];				
			    if($level5==$matrix_cycler && $iscyclingcompleted==0){			     
				 $this->Tree->query("update acs_trees set iscyclingcompleted=1 where position_id=".$top_position_id." and board=".$board); 		
			   } 
   
       }	   
	     */
   

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
			//$ref_position_id=$user['User']['positionrefid'];
		
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

    public function admin_buy_position() {
	
	    if($this->request->is('post')) {		
		
		    $username=trim($this->request->data['User']['username']); 
		    $remarks=trim($this->request->data['User']['remarks']); 
			$placement_referralid=trim($this->request->data['User']['placement_referralid']); 
		 		
		
			$position_user=$this->User->findByUsername($username);
			if($position_user==false){			
			$this->Session->setFlash(__('Member username is not exists. Please, enter correct username.'));
			$this->redirect('/admin/users/buy_position');	
			exit;			
			} 
			
			$place_position_user=$this->Position->findByReferralcode($placement_referralid);
			if($place_position_user==false){			
			$this->Session->setFlash(__('Placement Position Referral ID is not exists. Please, enter correct Placement Position Referral ID.'));
			$this->redirect('/admin/users/buy_position');	
			exit;			
			} 
			
			$ref_position_id=$place_position_user['Position']['id'];	
			$userId=$position_user['User']['id'];	
						
			$this->User->recursive=-1;
			$user=$this->User->findById($userId);	
		
			$rsetting=$this->Setting->findById(1);			
			$joining_fees=$rsetting['Setting']['joining_fees'];
			$max_stage_one_buy_position=$rsetting['Setting']['max_stage_one_buy_position'];
			
			$total_positions=$user['User']['total_positions'];	
			
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
			
			
			$this->Session->setFlash('The record has been saved.','default',array('class'=>'alert alert-success'));
		    $this->redirect('/admin/invoices/index');

			} else {
			
			$this->Session->setFlash('You already bought maximum stage 1 position.','default',array('class'=>'alert alert-success'));
			
			}	 
		
		}

	}

	public function admin_add($positioncode='') {

	     
		if($this->request->is('post')) {
			
								
				$country_id=$this->request->data['User']['country_id'];	
				$username=trim($this->request->data['User']['username']);
				$email=$this->request->data['User']['email'];	
				$position_referralid=$this->request->data['User']['position_referralid'];	
				$password=$this->request->data['User']['password'];	
			
								
				$position_user=$this->Position->findByReferralcode($position_referralid);
				if($position_user==false){			
				 $this->Session->setFlash(__('Sponsor Position Referral ID is not exists. Please, enter correct Sponsor Position Referral ID.'));
				  $this->redirect('/admin/users/add');	
				  exit;			
				} 
				
				$ref_position_id=$position_user['Position']['id'];	
				$userId=$position_user['Position']['user_id'];				
				$this->User->recursive=-1;
				$referral_user=$this->User->findById($userId);				
							               
                
				$this->User->recursive=-1;
				$finduser=$this->User->findByUsername($username);	
				if($finduser!=false){
				  $this->Session->setFlash(__('Username already exists. Please, enter new username.'));
				  $this->redirect('/admin/users/add');	
				  exit;
				}
				
				
				$this->User->recuesive=-1;
				$count_email=$this->User->find('count',array('conditions'=>array('User.email'=>$email)));					
				if($count_email>=1){
				   $this->Session->setFlash(__('Email address already used. Please, enter new email.'));
				   $this->redirect('/admin/users/add');	
				   exit;
				}
				
								

				if($referral_user!=false){	
				
				$this->request->data['User']['positionrefid']=$position_user['Position']['id'];	
				$this->request->data['User']['password']=AuthComponent::password($password);						
				$this->request->data['User']['created']=date('Y-m-d H:i:s');
				$this->request->data['User']['status']=1;	
				$this->request->data['User']['group_id']=2;	
				$this->request->data['User']['payment_status']=1;	
				$this->request->data['User']['member_photo']='noimage.jpg';	 
				$this->request->data['User']['susername']=$referral_user['User']['username'];			
				$this->request->data['User']['sponsor_id']=$referral_user['User']['id'];	
				$this->request->data['User']['direct_referral']=$referral_user['User']['id'];	
				$this->request->data['User']['last_login_datetime']=date('Y-m-d H:i:s');
				$this->request->data['User']['last_logout_datetime']=date('Y-m-d H:i:s');			   

			    $this->User->create();
				if($this->User->save($this->request->data)) {	
				
					$userId=$this->User->id;									
					
					//$membercode=date('y').str_pad($userId,6,"0",STR_PAD_LEFT);
					//$this->User->Query("update acs_users set membercode='".$membercode."' where id=".$userId);	
					
										
					$rsetting=$this->Setting->findById(1);			
					$joining_fees=$rsetting['Setting']['joining_fees'];
					
					$remarks='Joining Fees';
					$transaction_number=rand(10,99).time();
					$invoice=array();   
					$invoice['Invoice']['user_id']=$userId;			
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
					
					$this->Session->setFlash('The user has been saved.','default',array('class'=>'alert alert-success'));
				    $this->redirect(array('action' => 'index'));

				} else {
                     $this->Session->setFlash('The user could not be saved. Please, try again.','default',array('class'=>'alert alert-danger'));
				}	

				} else {
				
                   $this->Session->setFlash('The sponsor code could not match. Please, try again.','default',array('class'=>'alert alert-danger'));
				}		

		}  
				

		$countries = $this->User->Country->find('list');
		$this->set(compact('countries'));
		
		$genders = $this->User->Gender->find('list');
		$this->set(compact('genders'));						
      
		$this->set('positioncode',$positioncode);					

	}

	public function admin_edit($id = null) {

		

		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}

		if($this->request->is('post') || $this->request->is('put')) {
				
				$memberphoto=$this->request->data['User']['member_photo'];
				unset($this->request->data['User']['member_photo']);

				
				$password=$this->request->data['User']['password'];				
				$email=$this->request->data['User']['email'];				

				if(isset($password) && strlen($password)>0){  		
				  $this->request->data['User']['password'] = AuthComponent::password(trim($password));
				} else {
				  unset($this->request->data['User']['password']);
				}
			  
			  
				$this->User->recuesive=-1;
				$count_email=$this->User->find('count',array('conditions'=>array('User.email'=>$email)));					
				if($count_email>=2){
				   
					$this->Session->setFlash('Email address already used 1 time. Please, enter new email.','default',array('class'=>'alert alert-danger'));
				    $this->redirect('/admin/users/edit/'.$id);	
				    exit;
				}
			  		
						

			if($this->User->save($this->request->data)){

			
			      if($memberphoto['error']==0){	
					$allowedExts = array("gif", "jpeg", "jpg", "png", "GIF", "JPEG", "JPG", "PNG");
					$temp = explode(".", $memberphoto["name"]);
					$extension = end($temp);
                    $photo=$memberphoto['name'];
					$file=$id.'.'.$extension;	
				    $original_file_path =WWW_ROOT . 'files' . DS . 'user' . DS .$file;	 	
                    $thumb_path =WWW_ROOT . 'files' . DS . 'user' . DS . 'thumb' . DS .$file;	
			        move_uploaded_file($memberphoto['tmp_name'],$original_file_path);	               

					$wic=new Watimage();
					$wic->setImage($original_file_path);
					$wic->resize(array('type' => 'resizecrop', 'size' => array(120,120)));
					$wic->generate($thumb_path);	
					unset($wic);
		
					$this->User->saveField('member_photo',$file);
	             }	


			    $this->Session->setFlash('The user record has been saved.','default',array('class'=>'alert alert-success'));				
				$this->redirect(array('action' => 'index'));

			} else {
			                
				$this->Session->setFlash('The user could not be saved. Please, try again.','default',array('class'=>'alert alert-danger'));			
				

			}

		} else {

			$this->request->data = $this->User->read(null, $id);

		}

			
		$genders = $this->User->Gender->find('list');		
		$this->set(compact('genders'));

		
		$countries = $this->User->Country->find('list');
		$this->set(compact('countries'));

	 }   

	public function admin_index($fdate=0,$tdate=0,$type=1,$key=0) {		   	

         $search=array();
         $search['User.status']=1;
		 
		 if(strlen($key)>1){ 
		 
		    if($type==1){
		        $search['User.username LIKE ']="%$key%"; 
			} else if($type==2){
		       $search['User.susername LIKE ']="%$key%"; 
			} else if($type==3){
		        $search['User.first_name LIKE ']="%$key%"; 
			} else if($type==4){
		        $search['User.last_name LIKE ']="%$key%"; 
			}	 
		 
		 }
		 
		 if(strlen($fdate)>=10 && strlen($tdate)>=10){			     
		   $c_fdate=$fdate.' 00:00:00';
		   $c_tdate=$tdate.' 23:59:00';		   
		   $search['User.created between ? and ? ']=array($c_fdate, $c_tdate);	 
		} 
				 
		 
		 $this->paginate = array('conditions'=>$search,'limit' =>100,'fields'=>array('User.id','User.created','User.username','User.susername','User.first_name','User.last_name','User.email','User.status','User.payment_status','Group.name','User.mobile_no'),'order' => array('User.id' => 'asc'));				 
		 $this->set('users',$this->paginate('User'));

		
			
		

	}	
	
	public function admin_inactive($fdate=0,$tdate=0,$type=1,$key=0) {		   	

         $search=array();
         $search['User.status']=0;
		 
		 if(strlen($key)>1){ 
		 
		    if($type==1){
		        $search['User.username LIKE ']="%$key%"; 
			} else if($type==2){
		       $search['User.susername LIKE ']="%$key%"; 
			} else if($type==3){
		        $search['User.first_name LIKE ']="%$key%"; 
			} else if($type==4){
		        $search['User.last_name LIKE ']="%$key%"; 
			}	 
		 
		 }
		 
		  if(strlen($fdate)>=10 && strlen($tdate)>=10){			     
		   $c_fdate=$fdate.' 00:00:00';
		   $c_tdate=$tdate.' 23:59:00';		   
		   $search['User.created between ? and ? ']=array($c_fdate, $c_tdate);	 
		} 
			
				 
		 
		 $this->paginate = array('conditions'=>$search,'limit' =>100,'fields'=>array('User.id','User.created','User.username','User.susername','User.first_name','User.last_name','User.email','User.status','User.payment_status','Group.name','User.mobile_no'),'order' => array('User.id' => 'asc'));				 
		 $this->set('users',$this->paginate('User'));

		
			
		

	}
	
	public function admin_suspended($fdate=0,$tdate=0,$type=1,$key=0) {		   	

         $search=array();
         $search['User.status']=0;
		 
		 if(strlen($key)>1){ 
		 
		    if($type==1){
		        $search['User.username LIKE ']="%$key%"; 
			} else if($type==2){
		       $search['User.susername LIKE ']="%$key%"; 
			} else if($type==3){
		        $search['User.first_name LIKE ']="%$key%"; 
			} else if($type==4){
		        $search['User.last_name LIKE ']="%$key%"; 
			}	 
		 
		 }
		 
		  if(strlen($fdate)>=10 && strlen($tdate)>=10){			     
		   $c_fdate=$fdate.' 00:00:00';
		   $c_tdate=$tdate.' 23:59:00';		   
		   $search['User.created between ? and ? ']=array($c_fdate, $c_tdate);	 
		} 			 
		 
		 $this->paginate = array('conditions'=>$search,'limit' =>100,'fields'=>array('User.id','User.created','User.username','User.susername','User.first_name','User.last_name','User.email','User.status','User.payment_status','Group.name','User.mobile_no'),'order' => array('User.id' => 'asc'));				 
		 $this->set('users',$this->paginate('User'));

	}  
	
	
	/*public function admin_unpaid($fdate=0,$tdate=0,$type=1,$key=0) {		   	

         $search=array();
         $search['User.status']=1;
		  $search['User.payment_status']=0;
		  
		 if(strlen($key)>1){ 
		 
		    if($type==1){
		        $search['User.username LIKE ']="%$key%"; 
			} else if($type==2){
		       $search['User.susername LIKE ']="%$key%"; 
			} else if($type==3){
		        $search['User.first_name LIKE ']="%$key%"; 
			} else if($type==4){
		        $search['User.last_name LIKE ']="%$key%"; 
			}	 
		 
		 }
		 
		 if(strlen($fdate)>=10 && strlen($tdate)>=10){			     
		   $c_fdate=$fdate.' 00:00:00';
		   $c_tdate=$tdate.' 23:59:00';		   
		   $search['User.created between ? and ? ']=array($c_fdate, $c_tdate);	 
		} 
				 
		 
		 $this->paginate = array('conditions'=>$search,'limit' =>100,'fields'=>array('User.id','User.created','User.username','User.susername','User.first_name','User.last_name','User.email','User.status','User.payment_status','Group.name','User.mobile_no','User.membercode'),'order' => array('User.id' => 'asc'));				 
		 $this->set('users',$this->paginate('User'));

	}	*/
	
		
    public function admin_view($id = null) {

		$this->User->id = $id;

		if (!$this->User->exists()) {

			throw new NotFoundException(__('Invalid user'));

		}

		$this->set('user', $this->User->read(null, $id));
        $this->set('tree', $this->Tree->findById($id));
	}

	public function admin_delete($id = null) {
		

		$this->User->id = $id;	
		if (!$this->User->exists()) {
			$this->Session->setFlash('Invalid User ID','default',array('class'=>'alert alert-danger')); 
			$this->redirect(array('action' => 'index'));
		}

               
		    $this->User->query("update acs_users set status=2 where id=".$id);
  			$this->Session->setFlash('User status has been changed','default',array('class'=>'alert alert-danger')); 			
		
			$this->redirect(array('action' => 'index'));		

	}

	
	
   public function admin_sadd() { 
	   


		if($this->request->is('post')) {

				$country_id=$this->request->data['User']['country_id'];
				$this->request->data['User']['password']=AuthComponent::password($this->request->data['User']['password']);				
				$this->request->data['User']['status']=1;
				$this->request->data['User']['created']=date('Y-m-d');	
			    $this->User->create();
				if($this->User->save($this->request->data)) {

                       $this->Session->setFlash('The user has been saved.','default',array('class'=>'alert alert-success'));
				       $this->redirect(array('action' => 'sindex'));

				} else {

                    $this->Session->setFlash('The user could not be saved. Please, try again.','default',array('class'=>'alert alert-danger'));

				}	
		}


		$countries = $this->Country->find('list');		
		$this->set(compact('countries'));	


		$genders = $this->User->Gender->find('list');
		$this->set(compact('genders'));	

		$groups = $this->Group->find('list',array('conditions'=>array('Group.id'=>4)));
		$this->set(compact('groups'));	
		
    } 

   public function admin_sindex() {















































        $search=array();		















		$search['User.group_id >= ']=4;















		















	    $this->User->unbindModel(array('belongsTo'=>array('Country','Package'),'hasMany'=>array('Invoice')));















		$this->paginate = array('conditions'=>$search,'limit' =>100,'order' => array('User.created' => 'desc'));















		$this->set('users',$this->paginate('User'));































	}


   public function admin_sedit($id = null) {

		$this->User->id = $id;
		if(!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		
		$this->User->recursive=-1;
		$user=$this->User->findById($id);
		if($this->request->is('post') || $this->request->is('put')) {

			   $password=$this->request->data['User']['password'];
			   
			  if(isset($password) && strlen($password)>0){ 
			   $this->request->data['User']['password'] = AuthComponent::password($password);
			   }

			if ($this->User->save($this->request->data)){
				 $this->Session->setFlash('The user has been saved.','default',array('class'=>'alert alert-success'));
				$this->redirect(array('action' => 'sindex'));

			} else {
                $this->Session->setFlash('The user could not be saved. Please, try again.','default',array('class'=>'alert alert-danger'));
			
			}
			
		} else {

			$this->request->data = $this->User->read(null, $id);
		}



		$countries = $this->Country->find('list');
		$this->set(compact('countries'));


		$genders = $this->User->Gender->find('list');
		$this->set(compact('genders'));	

		$groups = $this->Group->find('list',array('conditions'=>array('Group.id'=>4)));
		$this->set(compact('groups'));	
	 }


   public function admin_sdelete($id = null) {


        $this->User->id = $id;	
		if(!$this->User->exists()) {
			$this->Session->setFlash('Invalid User ID','default',array('class'=>'alert alert-danger')); 
			$this->redirect(array('action' => 'sindex'));
		}
	

		if($this->User->delete()) {		
			$this->Session->setFlash('User deleted','default',array('class'=>'alert alert-success')); 
			$this->redirect(array('action' => 'sindex'));
		}

		
		$this->Session->setFlash('User was not deleted','default',array('class'=>'alert alert-danger')); 
		$this->redirect(array('action' => 'sindex'));

	}  

  
    public function ajaxcommon() { 

	       $this->autoRender = false; 

		   $string='';

		 

    	if($this->request->is('post')) {		

		  $post=$this->request->data;
		  
		  switch($post['act']){	


			case 'captcha':		

			  $string=$this->randomCode();
			  $this->Session->write('rand_code',$string);

			break;


            
            case 'business_logic':	
			
			$invoiceId=$post['id'];
			$status=$post['status'];
			if($status==1){
			    $this->businesslogic($invoiceId);	 
			} else {
			   $this->Invoice->query("update acs_invoices set status='".$status."' where id=".$invoiceId);    
			}
			
			$string='The record has been updated.';
						
            break;
			
			
			
			case 'businesslogic':			

            $userId=$post['id'];
			$this->User->recursive=-1;
			$user=$this->User->findById($userId); 
			if($user!=false){
						
			$rsetting=$this->Setting->findById(1);			
			$joining_fees=$rsetting['Setting']['joining_fees'];
			
			$remarks='Joining Fees';
			$transaction_number=rand(10,99).time();
			$invoice=array();   
			$invoice['Invoice']['user_id']=$user['User']['id'];			
			$invoice['Invoice']['amount']=$joining_fees;		
			$invoice['Invoice']['type']=1;									 				
			$invoice['Invoice']['payment_through']='E-Wallet';
			$invoice['Invoice']['payment_status']=1;			
			$invoice['Invoice']['remarks']=$remarks;	
			$invoice['Invoice']['transaction_number']=$transaction_number;
			$invoice['Invoice']['created']=date('Y-m-d H:i:s');                  
			$invoice['Invoice']['payment_date']=date('Y-m-d');					
			$this->Invoice->Create();
			if($this->Invoice->Save($invoice)){												            			
			   $this->businesslogic($this->Invoice->id);	 
			}	
			  
			}
					   

			break; 				  

		  }		  		

		}				

		 echo $string;		   

	}  

	public function ajax_common() { 

	       $this->autoRender = false; 

		   $string='';

		 

    	if($this->request->is('post')) {		

		  $post=$this->request->data;

		  switch($post['act']){	
		  
		  
		  
		  
		    case 'positionreferralid':
				$referralid=$post['referralid'];
				$user_rds=$this->Position->findByReferralcode($referralid);
				if($user_rds!=false){	
					$string.='Username : '.$user_rds['User']['username'].'<br/>';    
					$string.='Name : '.$user_rds['User']['first_name'].' '.$user_rds['User']['last_name']; 
				} else {
				   $string='No match found.';
				}	
			break; 

			 case 'find_referral':
				$susername=$post['susername'];
				$user_rds=$this->User->findByUsername($susername);
				if($user_rds!=false){	
					$string.='Username : '.$user_rds['User']['username'].'<br/>';    
					$string.='Name : '.$user_rds['User']['first_name'].' '.$user_rds['User']['last_name']; 
							
				} else {

				$string='No match found.';

				}				

			break; 
			
			
			 case 'findusername':
				$username=$post['username'];
				$user_rds=$this->User->findByUsername($username);
				if($user_rds!=false){	
					$string.='Username : '.$user_rds['User']['username'].'<br/>';    
					$string.='Name : '.$user_rds['User']['first_name'].' '.$user_rds['User']['last_name']; 
							
				} else {

				$string='No match found.';

				}				

			break; 
			
			

			 case 'validateusername':			

			    $username=$post['username'];
				$userrds=$this->User->findByUsername($username); 
				if($userrds!=false){
				    $string='You can use this username.';
				   
				} else {
				    $string='Username unavailable. Please choose another username.';
				}

			break;

			 case 'checkusername':			

			    $username=$post['username'];
				$userrds=$this->User->findByUsername($username); 
				if($userrds!=false){
				    $string='Username unavailable. Please choose another username.';
				} else {
				   $string='You can use this username.';
				}

			break;

			 
			 case 'updatestatus':		

				$status=$post['status'];
				$id=$post['id'];				
				$this->User->query("update acs_users set status='".$status."' where id=".$id); 
							
				$string=$id;

			break;		 

			  

		  }		  		

		}

		

		

		 echo $string;

		   

	}  	

}