<?php
App::uses('AppController', 'Controller');

class TreesController extends AppController {


	var $name = 'Trees'; 
	public $uses=array('Tree','User','Country','Setting','ViewTree','Position');	
	public $paginate = array('limit' => 100);

	

	public function beforeFilter() {
    		parent::beforeFilter();			
    }

	

	public function admin_index() {
	
		$search=array();
		$this->ViewTree->recursive = 0;
		$this->paginate = array('conditions'=>$search,'limit' =>100,'order'=>array('ViewTree.id'=>'asc'));
		$this->set('trees',$this->paginate('ViewTree'));
        
		
	}
	
	
	public function admin_genealogy($id=0){

	   $this->set('jstree',1);	
	   $this->set('id',$id);   
	 
	}


   public function admin_matrix($id=0) {

	  				
		$matrix_data=array();	
		$records_member=$this->Tree->findByPositionId($id);	
		$this->set('tree',$records_member);		
		
						
		$sponsor_user=$this->Tree->findById($records_member['User']['direct_referral']);
		$this->set('sponsor_user',$sponsor_user);	
						
		$this->set('parent_id',$records_member['Tree']['parent_id']);	
			
				
		$this->User->unbindModel(array('belongsTo'=>array('Group','Country'),'hasMany'=>array('Invoice')));
		$this->set('users',$this->paginate('User',array('User.direct_referral'=>$records_member['User']['id'])));		
			

		$matrix_data['isComp1']=1;	
		$matrix_data['id1']=$records_member['Tree']['position_id'];	
        $matrix_data['username1']=$records_member['User']['username'];
		$matrix_data['name1']=$records_member['User']['first_name'].' '.$records_member['User']['last_name'];
		$matrix_data['susername1']= $records_member['User']['susername'];
		$matrix_data['country_name1']= $this->findCountryName($records_member['User']['country_id']);
		$matrix_data['joining_date1']= $records_member['User']['created'];		
		$matrix_data['level1']= $records_member['Tree']['level'];	
		$matrix_data['position1']= $records_member['Position']['referralcode'];			
		$matrix_data['member_icon1']='icon.png';	
				

		$num =2;
		for($j=$num; $j<=40; $j++){
		
			$matrix_data['isComp'.$j]=0;
			$matrix_data['name'.$j]='';
			$matrix_data['id'.$j]=0;
			$matrix_data['spuser'.$j]='';			
			$matrix_data['member_icon'.$j]='available.png';
		}
				

        $p1_members=$this->Tree->find('all',array('conditions'=>array('Tree.parent_id'=>$id),'order'=>array('Tree.id'=>'ASC')));	
		if(count($p1_members)>0){
		
		  $matrix_data['spuser2']=$records_member['User']['username'];
		  $matrix_data['spuser3']=$records_member['User']['username'];
		  $matrix_data['spuser4']=$records_member['User']['username'];
		
		  foreach($p1_members as $k=>$p1_member){		  		  
          
		    $position_id=$p1_member['Tree']['position_id'];
			$position=$k+1;
			
			if($position==1){
			
			$f=2;
			
			$matrix_data['isComp'.$f]=1;	
			$matrix_data['id'.$f]=$p1_member['Tree']['position_id'];		
            $matrix_data['username'.$f]=$p1_member['User']['username'];
			$matrix_data['name'.$f]=$p1_member['User']['first_name'].' '.$p1_member['User']['last_name'];
			$matrix_data['susername'.$f]= $p1_member['User']['susername'];
			$matrix_data['country_name'.$f]=$this->findCountryName($p1_member['User']['country_id']);			
			$matrix_data['joining_date'.$f]= $p1_member['User']['created'];			
			$matrix_data['level'.$f]= $p1_member['Tree']['level'];	
			$matrix_data['position'.$f]= $p1_member['Position']['referralcode'];	
			$matrix_data['member_icon'.$f]='icon.png';	
					    
			  
			    $p2_members=$this->Tree->find('all',array('conditions'=>array('Tree.parent_id'=>$position_id),'order'=>array('Tree.id'=>'ASC')));				
				if(count($p2_members)>0){
								
				  $matrix_data['spuser5']=$p1_member['User']['username'];
		          $matrix_data['spuser6']=$p1_member['User']['username'];
		          $matrix_data['spuser7']=$p1_member['User']['username'];				
				
				  foreach($p2_members as $k2=>$p2_member){
				  
					//$f2=$k2+5;
					$position_id=$p2_member['Tree']['position_id'];					
					$position2=$k2+1;
					
					if($position2==1){
					
					$f2=5;
					$matrix_data['isComp'.$f2]=1;	
					$matrix_data['id'.$f2]=$p2_member['Tree']['position_id'];		
					$matrix_data['username'.$f2]=$p2_member['User']['username'];
					$matrix_data['name'.$f2]=$p2_member['User']['first_name'].' '.$p2_member['User']['last_name'];
					$matrix_data['susername'.$f2]= $p2_member['User']['susername'];
					$matrix_data['country_name'.$f2]= $this->findCountryName($p2_member['User']['country_id']);			
					$matrix_data['joining_date'.$f2]= $p2_member['User']['created'];			
					$matrix_data['level'.$f2]= $p2_member['Tree']['level'];	
					$matrix_data['position'.$f2]= $p2_member['Position']['referralcode'];				
					$matrix_data['member_icon'.$f2]='icon.png';
			  
					   $p3_members=$this->Tree->find('all',array('conditions'=>array('Tree.parent_id'=>$position_id),'order'=>array('Tree.id'=>'ASC')));	
						if(count($p3_members)>0){
						
						 $matrix_data['spuser14']=$p2_member['User']['username'];
		                 $matrix_data['spuser15']=$p2_member['User']['username'];
		                 $matrix_data['spuser16']=$p2_member['User']['username'];
												
						foreach($p3_members as $k3=>$p3_member){
						  
							
							$position3=$k3+1;
							
							if($position3==1){
							$f3=14;					
							$matrix_data['isComp'.$f3]=1;	
							$matrix_data['id'.$f3]=$p3_member['Tree']['position_id'];		
							$matrix_data['username'.$f3]=$p3_member['User']['username'];
							$matrix_data['name'.$f3]=$p3_member['User']['first_name'].' '.$p3_member['User']['last_name'];
							$matrix_data['susername'.$f3]= $p3_member['User']['susername'];
							$matrix_data['country_name'.$f3]= $this->findCountryName($p3_member['User']['country_id']);			
							$matrix_data['joining_date'.$f3]= $p3_member['User']['created'];			
							$matrix_data['level'.$f3]= $p3_member['Tree']['level'];	
							$matrix_data['position'.$f3]= $p3_member['Position']['referralcode'];							
							$matrix_data['member_icon'.$f3]='icon.png';	
							
							} else if($position3==2){
							$f3=15;	
							$matrix_data['isComp'.$f3]=1;	
							$matrix_data['id'.$f3]=$p3_member['Tree']['position_id'];		
							$matrix_data['username'.$f3]=$p3_member['User']['username'];
							$matrix_data['name'.$f3]=$p3_member['User']['first_name'].' '.$p3_member['User']['last_name'];
							$matrix_data['susername'.$f3]= $p3_member['User']['susername'];
							$matrix_data['country_name'.$f3]= $this->findCountryName($p3_member['User']['country_id']);			
							$matrix_data['joining_date'.$f3]= $p3_member['User']['created'];			
							$matrix_data['level'.$f3]= $p3_member['Tree']['level'];	
							$matrix_data['position'.$f3]= $p3_member['Position']['referralcode'];							
							$matrix_data['member_icon'.$f3]='icon.png';
							
							} else if($position3==3){
							$f3=16;	
							$matrix_data['isComp'.$f3]=1;	
							$matrix_data['id'.$f3]=$p3_member['Tree']['position_id'];		
							$matrix_data['username'.$f3]=$p3_member['User']['username'];
							$matrix_data['name'.$f3]=$p3_member['User']['first_name'].' '.$p3_member['User']['last_name'];
							$matrix_data['susername'.$f3]= $p3_member['User']['susername'];
							$matrix_data['country_name'.$f3]= $this->findCountryName($p3_member['User']['country_id']);			
							$matrix_data['joining_date'.$f3]= $p3_member['User']['created'];			
							$matrix_data['level'.$f3]= $p3_member['Tree']['level'];	
							$matrix_data['position'.$f3]= $p3_member['Position']['referralcode'];				
							$matrix_data['member_icon'.$f3]='icon.png';	
							
							}
							
										
						
						}
						} else {
						
						 $matrix_data['spuser14']=$p2_member['User']['username'];
		                 $matrix_data['spuser15']=$p2_member['User']['username'];
		                 $matrix_data['spuser16']=$p2_member['User']['username'];
						
						}			   
			   
			 
			        
					
					} else if($position2==2){
					$f2=6;
					$matrix_data['isComp'.$f2]=1;	
					$matrix_data['id'.$f2]=$p2_member['Tree']['position_id'];		
					$matrix_data['username'.$f2]=$p2_member['User']['username'];
					$matrix_data['name'.$f2]=$p2_member['User']['first_name'].' '.$p2_member['User']['last_name'];
					$matrix_data['susername'.$f2]= $p2_member['User']['susername'];
					$matrix_data['country_name'.$f2]= $this->findCountryName($p2_member['User']['country_id']);			
					$matrix_data['joining_date'.$f2]= $p2_member['User']['created'];			
					$matrix_data['level'.$f2]= $p2_member['Tree']['level'];	
					$matrix_data['position'.$f2]= $p2_member['Position']['referralcode'];		
					$matrix_data['member_icon'.$f2]='icon.png';
					 
			           
			   $p3_members=$this->Tree->find('all',array('conditions'=>array('Tree.parent_id'=>$position_id),'order'=>array('Tree.id'=>'ASC')));	
			 
			   if(count($p3_members)>0){
			   
			             $matrix_data['spuser17']=$p2_member['User']['username'];
		                 $matrix_data['spuser18']=$p2_member['User']['username'];
		                 $matrix_data['spuser19']=$p2_member['User']['username'];
						
			   
			   
				foreach($p3_members as $k3=>$p3_member){
				            
							//$f3=17;
							$position3=$k3+1;
							
							if($position3==1){
								$f3=17;
								$matrix_data['isComp'.$f3]=1;	
								$matrix_data['id'.$f3]=$p3_member['Tree']['position_id'];		
								$matrix_data['username'.$f3]=$p3_member['User']['username'];
								$matrix_data['name'.$f3]=$p3_member['User']['first_name'].' '.$p3_member['User']['last_name'];
								$matrix_data['susername'.$f3]= $p3_member['User']['susername'];
								$matrix_data['country_name'.$f3]= $this->findCountryName($p3_member['User']['country_id']);			
								$matrix_data['joining_date'.$f3]= $p3_member['User']['created'];			
								$matrix_data['level'.$f3]= $p3_member['Tree']['level'];	
								$matrix_data['position'.$f3]= $p3_member['Position']['referralcode'];									
								$matrix_data['member_icon'.$f3]='icon.png';
							} else if($position3==2){
								$f3=18;
								$matrix_data['isComp'.$f3]=1;	
								$matrix_data['id'.$f3]=$p3_member['Tree']['position_id'];		
								$matrix_data['username'.$f3]=$p3_member['User']['username'];
								$matrix_data['name'.$f3]=$p3_member['User']['first_name'].' '.$p3_member['User']['last_name'];
								$matrix_data['susername'.$f3]= $p3_member['User']['susername'];
								$matrix_data['country_name'.$f3]= $this->findCountryName($p3_member['User']['country_id']);			
								$matrix_data['joining_date'.$f3]= $p3_member['User']['created'];			
								$matrix_data['level'.$f3]= $p3_member['Tree']['level'];	
								$matrix_data['position'.$f3]= $p3_member['Position']['referralcode'];							
								$matrix_data['member_icon'.$f3]='icon.png';
							} else if($position3==3){
								$f3=19;
								$matrix_data['isComp'.$f3]=1;	
								$matrix_data['id'.$f3]=$p3_member['Tree']['position_id'];		
								$matrix_data['username'.$f3]=$p3_member['User']['username'];
								$matrix_data['name'.$f3]=$p3_member['User']['first_name'].' '.$p3_member['User']['last_name'];
								$matrix_data['susername'.$f3]= $p3_member['User']['susername'];
								$matrix_data['country_name'.$f3]= $this->findCountryName($p3_member['User']['country_id']);			
								$matrix_data['joining_date'.$f3]= $p3_member['User']['created'];			
								$matrix_data['level'.$f3]= $p3_member['Tree']['level'];	
								$matrix_data['position'.$f3]= $p3_member['Position']['referralcode'];							
								$matrix_data['member_icon'.$f3]='icon.png';	
							}
												
											
				}
				} else {
						
						 $matrix_data['spuser17']=$p2_member['User']['username'];
		                 $matrix_data['spuser18']=$p2_member['User']['username'];
		                 $matrix_data['spuser19']=$p2_member['User']['username'];
						
						}	
			   	
			 
			        
					
					} else if($position2==3){
					
					$f2=7;
					$matrix_data['isComp'.$f2]=1;	
					$matrix_data['id'.$f2]=$p2_member['Tree']['position_id'];		
					$matrix_data['username'.$f2]=$p2_member['User']['username'];
					$matrix_data['name'.$f2]=$p2_member['User']['first_name'].' '.$p2_member['User']['last_name'];
					$matrix_data['susername'.$f2]= $p2_member['User']['susername'];
					$matrix_data['country_name'.$f2]= $this->findCountryName($p2_member['User']['country_id']);			
					$matrix_data['joining_date'.$f2]= $p2_member['User']['created'];			
					$matrix_data['level'.$f2]= $p2_member['Tree']['level'];	
					$matrix_data['position'.$f2]= $p2_member['Position']['referralcode'];				
					$matrix_data['member_icon'.$f2]='icon.png';
					
					 
			            
			    $p3_members=$this->Tree->find('all',array('conditions'=>array('Tree.parent_id'=>$position_id)));	
			 
			   if(count($p3_members)>0){
			   
			             $matrix_data['spuser20']=$p2_member['User']['username'];
		                 $matrix_data['spuser21']=$p2_member['User']['username'];
		                 $matrix_data['spuser22']=$p2_member['User']['username'];
			   
				foreach($p3_members as $k3=>$p3_member){
				
		                	//$f3=$k3+20;
							$position3=$k3+1;
								
						 if($position3==1){		
							$f3=20;						
							$matrix_data['isComp'.$f3]=1;	
							$matrix_data['id'.$f3]=$p3_member['Tree']['position_id'];		
							$matrix_data['username'.$f3]=$p3_member['User']['username'];
							$matrix_data['name'.$f3]=$p3_member['User']['first_name'].' '.$p3_member['User']['last_name'];
							$matrix_data['susername'.$f3]= $p3_member['User']['susername'];
							$matrix_data['country_name'.$f3]= $this->findCountryName($p3_member['User']['country_id']);			
							$matrix_data['joining_date'.$f3]= $p3_member['User']['created'];			
							$matrix_data['level'.$f3]= $p3_member['Tree']['level'];	
							$matrix_data['position'.$f3]= $p3_member['Position']['referralcode'];							
							$matrix_data['member_icon'.$f3]='icon.png';
					 } else if($position3==2){
							$f3=21;	
							$matrix_data['isComp'.$f3]=1;	
							$matrix_data['id'.$f3]=$p3_member['Tree']['position_id'];		
							$matrix_data['username'.$f3]=$p3_member['User']['username'];
							$matrix_data['name'.$f3]=$p3_member['User']['first_name'].' '.$p3_member['User']['last_name'];
							$matrix_data['susername'.$f3]= $p3_member['User']['susername'];
							$matrix_data['country_name'.$f3]= $this->findCountryName($p3_member['User']['country_id']);			
							$matrix_data['joining_date'.$f3]= $p3_member['User']['created'];			
							$matrix_data['level'.$f3]= $p3_member['Tree']['level'];	
							$matrix_data['position'.$f3]= $p3_member['Position']['referralcode'];							
							$matrix_data['member_icon'.$f3]='icon.png';
					 } else if($position3==3){
					 
							$f3=22;
							$matrix_data['isComp'.$f3]=1;	
							$matrix_data['id'.$f3]=$p3_member['Tree']['position_id'];		
							$matrix_data['username'.$f3]=$p3_member['User']['username'];
							$matrix_data['name'.$f3]=$p3_member['User']['first_name'].' '.$p3_member['User']['last_name'];
							$matrix_data['susername'.$f3]= $p3_member['User']['susername'];
							$matrix_data['country_name'.$f3]= $this->findCountryName($p3_member['User']['country_id']);			
							$matrix_data['joining_date'.$f3]= $p3_member['User']['created'];			
							$matrix_data['level'.$f3]= $p3_member['Tree']['level'];	
							$matrix_data['position'.$f3]= $p3_member['Position']['referralcode'];							
							$matrix_data['member_icon'.$f3]='icon.png';		
					 }			
										
				
				}
				} else {
						
						 $matrix_data['spuser20']=$p2_member['User']['username'];
		                 $matrix_data['spuser21']=$p2_member['User']['username'];
		                 $matrix_data['spuser22']=$p2_member['User']['username'];
						
						}				
			
			        
					
					}
					
					
					
							
				
				 }
				 
				 
				} else {
				
				  $matrix_data['spuser5']=$p1_member['User']['username'];
		          $matrix_data['spuser6']=$p1_member['User']['username'];
		          $matrix_data['spuser7']=$p1_member['User']['username'];
				
				}			   
			   
			 
			  
			
			
			} else if($position==2){
			 $f=3;
			
			$matrix_data['isComp'.$f]=1;	
			$matrix_data['id'.$f]=$p1_member['Tree']['position_id'];		
            $matrix_data['username'.$f]=$p1_member['User']['username'];
			$matrix_data['name'.$f]=$p1_member['User']['first_name'].' '.$p1_member['User']['last_name'];
			$matrix_data['susername'.$f]= $p1_member['User']['susername'];
			$matrix_data['country_name'.$f]= $this->findCountryName($p1_member['User']['country_id']);			
			$matrix_data['joining_date'.$f]= $p1_member['User']['created'];			
			$matrix_data['level'.$f]= $p1_member['Tree']['level'];	
			$matrix_data['position'.$f]= $p1_member['Position']['referralcode'];			
			$matrix_data['member_icon'.$f]='icon.png';	
			
			 
			    
			   $p2_members=$this->Tree->find('all',array('conditions'=>array('Tree.parent_id'=>$position_id),'order'=>array('Tree.id'=>'ASC')));
			 
			   if(count($p2_members)>0){
			   
			   $matrix_data['spuser8']=$p1_member['User']['username'];
			   $matrix_data['spuser9']=$p1_member['User']['username'];
			   $matrix_data['spuser10']=$p1_member['User']['username'];
			   
				foreach($p2_members as $k2=>$p2_member){
				
				//$f2=$k2+8;
				$userId=$p2_member['Tree']['position_id'];
				$position2=$k2+1;
				
				if($position2==1){
				$f2=8;  
			    $matrix_data['isComp'.$f2]=1;	
				$matrix_data['id'.$f2]=$p2_member['Tree']['position_id'];		
				$matrix_data['username'.$f2]=$p2_member['User']['username'];
				$matrix_data['name'.$f2]=$p2_member['User']['first_name'].' '.$p2_member['User']['last_name'];
				$matrix_data['susername'.$f2]= $p2_member['User']['susername'];
				$matrix_data['country_name'.$f2]= $this->findCountryName($p2_member['User']['country_id']);			
				$matrix_data['joining_date'.$f2]= $p2_member['User']['created'];			
				$matrix_data['level'.$f2]= $p2_member['Tree']['level'];	
				$matrix_data['position'.$f2]= $p2_member['Position']['referralcode'];				
				$matrix_data['member_icon'.$f2]='icon.png';
				
				 
			           
			  
					   $p3_members=$this->Tree->find('all',array('conditions'=>array('Tree.parent_id'=>$userId)));	
						if(count($p3_members)>0){
						 $matrix_data['spuser23']=$p2_member['User']['username'];
		                 $matrix_data['spuser24']=$p2_member['User']['username'];
		                 $matrix_data['spuser25']=$p2_member['User']['username'];
						
						foreach($p3_members as $k3=>$p3_member){
						  
							//$f3=$k3+23;
										
							$position3=$k3+1;			
										
							if($position3==1){
							$f3=23;	
							$matrix_data['isComp'.$f3]=1;	
							$matrix_data['id'.$f3]=$p3_member['Tree']['position_id'];		
							$matrix_data['username'.$f3]=$p3_member['User']['username'];
							$matrix_data['name'.$f3]=$p3_member['User']['first_name'].' '.$p3_member['User']['last_name'];
							$matrix_data['susername'.$f3]= $p3_member['User']['susername'];
							$matrix_data['country_name'.$f3]= $this->findCountryName($p3_member['User']['country_id']);			
							$matrix_data['joining_date'.$f3]= $p3_member['User']['created'];			
							$matrix_data['level'.$f3]= $p3_member['Tree']['level'];
							$matrix_data['position'.$f3]= $p3_member['Position']['referralcode'];								
							$matrix_data['member_icon'.$f3]='icon.png';
							
							} else if($position3==2){
							$f3=24;	
							$matrix_data['isComp'.$f3]=1;	
							$matrix_data['id'.$f3]=$p3_member['Tree']['position_id'];		
							$matrix_data['username'.$f3]=$p3_member['User']['username'];
							$matrix_data['name'.$f3]=$p3_member['User']['first_name'].' '.$p3_member['User']['last_name'];
							$matrix_data['susername'.$f3]= $p3_member['User']['susername'];
							$matrix_data['country_name'.$f3]= $this->findCountryName($p3_member['User']['country_id']);			
							$matrix_data['joining_date'.$f3]= $p3_member['User']['created'];			
							$matrix_data['level'.$f3]= $p3_member['Tree']['level'];	
							$matrix_data['position'.$f3]= $p3_member['Position']['referralcode'];						
							$matrix_data['member_icon'.$f3]='icon.png';
							
							} else if($position3==3){
							$f3=25;	
							$matrix_data['isComp'.$f3]=1;	
							$matrix_data['id'.$f3]=$p3_member['Tree']['position_id'];		
							$matrix_data['username'.$f3]=$p3_member['User']['username'];
							$matrix_data['name'.$f3]=$p3_member['User']['first_name'].' '.$p3_member['User']['last_name'];
							$matrix_data['susername'.$f3]= $p3_member['User']['susername'];
							$matrix_data['country_name'.$f3]= $this->findCountryName($p3_member['User']['country_id']);			
							$matrix_data['joining_date'.$f3]= $p3_member['User']['created'];			
							$matrix_data['level'.$f3]= $p3_member['Tree']['level'];	
							$matrix_data['position'.$f3]= $p3_member['Position']['referralcode'];						
							$matrix_data['member_icon'.$f3]='icon.png';
							
							}						
											
						
						}
						} else {
						
						 $matrix_data['spuser23']=$p2_member['User']['username'];
		                 $matrix_data['spuser24']=$p2_member['User']['username'];
		                 $matrix_data['spuser25']=$p2_member['User']['username'];
						
						}				   
			   
			 
			        	
				
				} else if($position2==2){
				  $f2=9; 
				  $matrix_data['isComp'.$f2]=1;	
				$matrix_data['id'.$f2]=$p2_member['Tree']['position_id'];		
				$matrix_data['username'.$f2]=$p2_member['User']['username'];
				$matrix_data['name'.$f2]=$p2_member['User']['first_name'].' '.$p2_member['User']['last_name'];
				$matrix_data['susername'.$f2]= $p2_member['User']['susername'];
				$matrix_data['country_name'.$f2]= $this->findCountryName($p2_member['User']['country_id']);			
				$matrix_data['joining_date'.$f2]= $p2_member['User']['created'];			
				$matrix_data['level'.$f2]= $p2_member['Tree']['level'];
				$matrix_data['position'.$f2]= $p2_member['Position']['referralcode'];
				$matrix_data['member_icon'.$f2]='icon.png';
				
					 
			           
			   $p3_members=$this->Tree->find('all',array('conditions'=>array('Tree.parent_id'=>$userId)));	
			 
			   if(count($p3_members)>0){
			   
			     $matrix_data['spuser26']=$p2_member['User']['username'];
		                 $matrix_data['spuser27']=$p2_member['User']['username'];
		                 $matrix_data['spuser28']=$p2_member['User']['username'];
						 
				foreach($p3_members as $k3=>$p3_member){
				            
							//$f3=$k3+26;
							
							$position3=$k3+1;	
							
							if($position3==1){ 
							$f3=26;
							$matrix_data['isComp'.$f3]=1;	
							$matrix_data['id'.$f3]=$p3_member['Tree']['position_id'];		
							$matrix_data['username'.$f3]=$p3_member['User']['username'];
							$matrix_data['name'.$f3]=$p3_member['User']['first_name'].' '.$p3_member['User']['last_name'];
							$matrix_data['susername'.$f3]= $p3_member['User']['susername'];
							$matrix_data['country_name'.$f3]= $this->findCountryName($p3_member['User']['country_id']);			
							$matrix_data['joining_date'.$f3]= $p3_member['User']['created'];			
							$matrix_data['level'.$f3]= $p3_member['Tree']['level'];	
							$matrix_data['position'.$f3]= $p3_member['Position']['referralcode'];			
							$matrix_data['member_icon'.$f3]='icon.png';
							
							} else if($position3==2){
							$f3=27;
							$matrix_data['isComp'.$f3]=1;	
							$matrix_data['id'.$f3]=$p3_member['Tree']['position_id'];		
							$matrix_data['username'.$f3]=$p3_member['User']['username'];
							$matrix_data['name'.$f3]=$p3_member['User']['first_name'].' '.$p3_member['User']['last_name'];
							$matrix_data['susername'.$f3]= $p3_member['User']['susername'];
							$matrix_data['country_name'.$f3]= $this->findCountryName($p3_member['User']['country_id']);			
							$matrix_data['joining_date'.$f3]= $p3_member['User']['created'];			
							$matrix_data['level'.$f3]= $p3_member['Tree']['level'];		
							$matrix_data['position'.$f3]= $p3_member['Position']['referralcode'];						
							$matrix_data['member_icon'.$f3]='icon.png';
							
							} else if($position3==3){
							$f3=28;
							$matrix_data['isComp'.$f3]=1;	
							$matrix_data['id'.$f3]=$p3_member['Tree']['position_id'];		
							$matrix_data['username'.$f3]=$p3_member['User']['username'];
							$matrix_data['name'.$f3]=$p3_member['User']['first_name'].' '.$p3_member['User']['last_name'];
							$matrix_data['susername'.$f3]= $p3_member['User']['susername'];
							$matrix_data['country_name'.$f3]= $this->findCountryName($p3_member['User']['country_id']);			
							$matrix_data['joining_date'.$f3]= $p3_member['User']['created'];			
							$matrix_data['level'.$f3]= $p3_member['Tree']['level'];		
							$matrix_data['position'.$f3]= $p3_member['Position']['referralcode'];					
							$matrix_data['member_icon'.$f3]='icon.png';
							
							}		
												
											
				}
				} else {
						
						 $matrix_data['spuser26']=$p2_member['User']['username'];
		                 $matrix_data['spuser27']=$p2_member['User']['username'];
		                 $matrix_data['spuser28']=$p2_member['User']['username'];
						
						}	
			   	
			 
			        
				
				} else if($position2==3){
				
				$f2=10; 
				$matrix_data['isComp'.$f2]=1;	
				$matrix_data['id'.$f2]=$p2_member['Tree']['position_id'];		
				$matrix_data['username'.$f2]=$p2_member['User']['username'];
				$matrix_data['name'.$f2]=$p2_member['User']['first_name'].' '.$p2_member['User']['last_name'];
				$matrix_data['susername'.$f2]= $p2_member['User']['susername'];
				$matrix_data['country_name'.$f2]= $this->findCountryName($p2_member['User']['country_id']);			
				$matrix_data['joining_date'.$f2]= $p2_member['User']['created'];			
				$matrix_data['level'.$f2]= $p2_member['Tree']['level'];	
				$matrix_data['position'.$f2]= $p2_member['Position']['referralcode'];			
				$matrix_data['member_icon'.$f2]='icon.png';
				
				 
			            
			    $p3_members=$this->Tree->find('all',array('conditions'=>array('Tree.parent_id'=>$userId)));	
			 
			   if(count($p3_members)>0){
			             $matrix_data['spuser29']=$p2_member['User']['username'];
		                 $matrix_data['spuser30']=$p2_member['User']['username'];
		                 $matrix_data['spuser31']=$p2_member['User']['username'];
			   
				foreach($p3_members as $k3=>$p3_member){
				
		                	//$f3=$k3+29;
							
						    $position3=$k3+1;
							
							if($position3==1){		
							$f3=29;										
							$matrix_data['isComp'.$f3]=1;	
							$matrix_data['id'.$f3]=$p3_member['Tree']['position_id'];		
							$matrix_data['username'.$f3]=$p3_member['User']['username'];
							$matrix_data['name'.$f3]=$p3_member['User']['first_name'].' '.$p3_member['User']['last_name'];
							$matrix_data['susername'.$f3]= $p3_member['User']['susername'];
							$matrix_data['country_name'.$f3]= $this->findCountryName($p3_member['User']['country_id']);			
							$matrix_data['joining_date'.$f3]= $p3_member['User']['created'];			
							$matrix_data['level'.$f3]= $p3_member['Tree']['level'];	
							$matrix_data['position'.$f3]= $p3_member['Position']['referralcode'];							
							$matrix_data['member_icon'.$f3]='icon.png';
							} else if($position3==2){
							
							$f3=30;										
							$matrix_data['isComp'.$f3]=1;	
							$matrix_data['id'.$f3]=$p3_member['Tree']['position_id'];		
							$matrix_data['username'.$f3]=$p3_member['User']['username'];
							$matrix_data['name'.$f3]=$p3_member['User']['first_name'].' '.$p3_member['User']['last_name'];
							$matrix_data['susername'.$f3]= $p3_member['User']['susername'];
							$matrix_data['country_name'.$f3]= $this->findCountryName($p3_member['User']['country_id']);			
							$matrix_data['joining_date'.$f3]= $p3_member['User']['created'];			
							$matrix_data['level'.$f3]= $p3_member['Tree']['level'];	
							$matrix_data['position'.$f3]= $p3_member['Position']['referralcode'];						
							$matrix_data['member_icon'.$f3]='icon.png';
							
							} else if($position3==3){
							
							$f3=31;										
							$matrix_data['isComp'.$f3]=1;	
							$matrix_data['id'.$f3]=$p3_member['Tree']['position_id'];		
							$matrix_data['username'.$f3]=$p3_member['User']['username'];
							$matrix_data['name'.$f3]=$p3_member['User']['first_name'].' '.$p3_member['User']['last_name'];
							$matrix_data['susername'.$f3]= $p3_member['User']['susername'];
							$matrix_data['country_name'.$f3]= $this->findCountryName($p3_member['User']['country_id']);			
							$matrix_data['joining_date'.$f3]= $p3_member['User']['created'];			
							$matrix_data['level'.$f3]= $p3_member['Tree']['level'];	
							$matrix_data['position'.$f3]= $p3_member['Position']['referralcode'];							
							$matrix_data['member_icon'.$f3]='icon.png';
							
							}					
				
				}
				} else {
						
						 $matrix_data['spuser29']=$p2_member['User']['username'];
		                 $matrix_data['spuser30']=$p2_member['User']['username'];
		                 $matrix_data['spuser31']=$p2_member['User']['username'];
						
						}				
			
			        	
				
				} 
				
				
				
				
								
				}
				
				
				} else {
				
				   $matrix_data['spuser8']=$p1_member['User']['username'];
		           $matrix_data['spuser9']=$p1_member['User']['username'];
		           $matrix_data['spuser10']=$p1_member['User']['username'];
				  
				}
			   	
			 
			  
			
			
			} else if($position==3){
			
			$f=4;
			
			$matrix_data['isComp'.$f]=1;	
			$matrix_data['id'.$f]=$p1_member['Tree']['position_id'];		
            $matrix_data['username'.$f]=$p1_member['User']['username'];
			$matrix_data['name'.$f]=$p1_member['User']['first_name'].' '.$p1_member['User']['last_name'];
			$matrix_data['susername'.$f]= $p1_member['User']['susername'];
			$matrix_data['country_name'.$f]= $this->findCountryName($p1_member['User']['country_id']);			
			$matrix_data['joining_date'.$f]= $p1_member['User']['created'];			
			$matrix_data['level'.$f]= $p1_member['Tree']['level'];	
			$matrix_data['position'.$f]= $p1_member['Position']['referralcode'];			
			$matrix_data['member_icon'.$f]='icon.png';
			
			 
			     
			   $p2_members=$this->Tree->find('all',array('conditions'=>array('Tree.parent_id'=>$position_id),'order'=>array('Tree.id'=>'ASC')));			 
			   if(count($p2_members)>0){ 
			   
			       $matrix_data['spuser11']=$p1_member['User']['username'];
		           $matrix_data['spuser12']=$p1_member['User']['username'];
		           $matrix_data['spuser13']=$p1_member['User']['username'];
				   
				     
				foreach($p2_members as $k2=>$p2_member){
				$f2=$k2+11;
				$userId=$p2_member['Tree']['position_id'];				
				
				$matrix_data['isComp'.$f2]=1;	
				$matrix_data['id'.$f2]=$p2_member['Tree']['position_id'];		
				$matrix_data['username'.$f2]=$p2_member['User']['username'];
				$matrix_data['name'.$f2]=$p2_member['User']['first_name'].' '.$p2_member['User']['last_name'];
				$matrix_data['susername'.$f2]= $p2_member['User']['susername'];
				$matrix_data['country_name'.$f2]= $this->findCountryName($p2_member['User']['country_id']);			
				$matrix_data['joining_date'.$f2]= $p2_member['User']['created'];			
				$matrix_data['level'.$f2]= $p2_member['Tree']['level'];	
				$matrix_data['position'.$f2]= $p2_member['Position']['referralcode'];			
				$matrix_data['member_icon'.$f2]='icon.png';
				
				if($f2==11){ 
			           
			  
					   $p3_members=$this->Tree->find('all',array('conditions'=>array('Tree.parent_id'=>$userId)));	
						if(count($p3_members)>0){
						 $matrix_data['spuser32']=$p2_member['User']['username'];
		                 $matrix_data['spuser33']=$p2_member['User']['username'];
		                 $matrix_data['spuser34']=$p2_member['User']['username'];
						
						foreach($p3_members as $k3=>$p3_member){
						  
						//	$f3=$k3+32;
												
							
							
							$position3=$k3+1;
							 
							if($position3==1){		
							$f3=32;										
							$matrix_data['isComp'.$f3]=1;	
							$matrix_data['id'.$f3]=$p3_member['Tree']['position_id'];		
							$matrix_data['username'.$f3]=$p3_member['User']['username'];
							$matrix_data['name'.$f3]=$p3_member['User']['first_name'].' '.$p3_member['User']['last_name'];
							$matrix_data['susername'.$f3]= $p3_member['User']['susername'];
							$matrix_data['country_name'.$f3]= $this->findCountryName($p3_member['User']['country_id']);			
							$matrix_data['joining_date'.$f3]= $p3_member['User']['created'];			
							$matrix_data['level'.$f3]= $p3_member['Tree']['level'];	
							$matrix_data['position'.$f3]= $p3_member['Position']['referralcode'];								
							$matrix_data['member_icon'.$f3]='icon.png';
							} else if($position3==2){
							
							$f3=33;										
							$matrix_data['isComp'.$f3]=1;	
							$matrix_data['id'.$f3]=$p3_member['Tree']['position_id'];		
							$matrix_data['username'.$f3]=$p3_member['User']['username'];
							$matrix_data['name'.$f3]=$p3_member['User']['first_name'].' '.$p3_member['User']['last_name'];
							$matrix_data['susername'.$f3]= $p3_member['User']['susername'];
							$matrix_data['country_name'.$f3]= $this->findCountryName($p3_member['User']['country_id']);			
							$matrix_data['joining_date'.$f3]= $p3_member['User']['created'];			
							$matrix_data['level'.$f3]= $p3_member['Tree']['level'];
							$matrix_data['position'.$f3]= $p3_member['Position']['referralcode'];								
							$matrix_data['member_icon'.$f3]='icon.png';
							
							} else if($position3==3){
							
							$f3=34;										
							$matrix_data['isComp'.$f3]=1;	
							$matrix_data['id'.$f3]=$p3_member['Tree']['position_id'];		
							$matrix_data['username'.$f3]=$p3_member['User']['username'];
							$matrix_data['name'.$f3]=$p3_member['User']['first_name'].' '.$p3_member['User']['last_name'];
							$matrix_data['susername'.$f3]= $p3_member['User']['susername'];
							$matrix_data['country_name'.$f3]= $this->findCountryName($p3_member['User']['country_id']);			
							$matrix_data['joining_date'.$f3]= $p3_member['User']['created'];			
							$matrix_data['level'.$f3]= $p3_member['Tree']['level'];	
							$matrix_data['position'.$f3]= $p3_member['Position']['referralcode'];							
							$matrix_data['member_icon'.$f3]='icon.png';
							
							}	
							
										
						
						}
						} else {
						
						 $matrix_data['spuser32']=$p2_member['User']['username'];
		                 $matrix_data['spuser33']=$p2_member['User']['username'];
		                 $matrix_data['spuser34']=$p2_member['User']['username'];
						
						}				   
			   
			 
			        } else if($f2==12){ 
			           
			   $p3_members=$this->Tree->find('all',array('conditions'=>array('Tree.parent_id'=>$userId)));	
			 
			   if(count($p3_members)>0){
			   
			    $matrix_data['spuser35']=$p2_member['User']['username'];
		                 $matrix_data['spuser36']=$p2_member['User']['username'];
		                 $matrix_data['spuser37']=$p2_member['User']['username'];
			   
				foreach($p3_members as $k3=>$p3_member){
				            
							//$f3=$k3+35;
							
							$position3=$k3+1;
							 
							if($position3==1){		
							$f3=35;										
							$matrix_data['isComp'.$f3]=1;	
							$matrix_data['id'.$f3]=$p3_member['Tree']['position_id'];		
							$matrix_data['username'.$f3]=$p3_member['User']['username'];
							$matrix_data['name'.$f3]=$p3_member['User']['first_name'].' '.$p3_member['User']['last_name'];
							$matrix_data['susername'.$f3]= $p3_member['User']['susername'];
							$matrix_data['country_name'.$f3]= $this->findCountryName($p3_member['User']['country_id']);			
							$matrix_data['joining_date'.$f3]= $p3_member['User']['created'];			
							$matrix_data['level'.$f3]= $p3_member['Tree']['level'];	
							$matrix_data['position'.$f3]= $p3_member['Position']['referralcode'];							
							$matrix_data['member_icon'.$f3]='icon.png';
							} else if($position3==2){
							
							$f3=36;										
							$matrix_data['isComp'.$f3]=1;	
							$matrix_data['id'.$f3]=$p3_member['Tree']['position_id'];		
							$matrix_data['username'.$f3]=$p3_member['User']['username'];
							$matrix_data['name'.$f3]=$p3_member['User']['first_name'].' '.$p3_member['User']['last_name'];
							$matrix_data['susername'.$f3]= $p3_member['User']['susername'];
							$matrix_data['country_name'.$f3]= $this->findCountryName($p3_member['User']['country_id']);			
							$matrix_data['joining_date'.$f3]= $p3_member['User']['created'];			
							$matrix_data['level'.$f3]= $p3_member['Tree']['level'];	
							$matrix_data['position'.$f3]= $p3_member['Position']['referralcode'];							
							$matrix_data['member_icon'.$f3]='icon.png';
							
							} else if($position3==3){
							
							$f3=37;										
							$matrix_data['isComp'.$f3]=1;	
							$matrix_data['id'.$f3]=$p3_member['Tree']['position_id'];		
							$matrix_data['username'.$f3]=$p3_member['User']['username'];
							$matrix_data['name'.$f3]=$p3_member['User']['first_name'].' '.$p3_member['User']['last_name'];
							$matrix_data['susername'.$f3]= $p3_member['User']['susername'];
							$matrix_data['country_name'.$f3]= $this->findCountryName($p3_member['User']['country_id']);			
							$matrix_data['joining_date'.$f3]= $p3_member['User']['created'];			
							$matrix_data['level'.$f3]= $p3_member['Tree']['level'];	
							$matrix_data['position'.$f3]= $p3_member['Position']['referralcode'];							
							$matrix_data['member_icon'.$f3]='icon.png';
							
							}													
											
				}
				} else {
						
						 $matrix_data['spuser35']=$p2_member['User']['username'];
		                 $matrix_data['spuser36']=$p2_member['User']['username'];
		                 $matrix_data['spuser37']=$p2_member['User']['username'];
						
						}	
			   	
			 
			        } else if($f2==13){ 
			            
			    $p3_members=$this->Tree->find('all',array('conditions'=>array('Tree.parent_id'=>$userId)));	
			 
			   if(count($p3_members)>0){
			   
			    $matrix_data['spuser38']=$p2_member['User']['username'];
		                 $matrix_data['spuser39']=$p2_member['User']['username'];
		                 $matrix_data['spuser40']=$p2_member['User']['username'];
						
			   
				foreach($p3_members as $k3=>$p3_member){
				
		                	//$f3=$k3+38;
												
							
							
							
							$position3=$k3+1;
							 
							if($position3==1){		
							$f3=38;										
							$matrix_data['isComp'.$f3]=1;	
							$matrix_data['id'.$f3]=$p3_member['Tree']['position_id'];		
							$matrix_data['username'.$f3]=$p3_member['User']['username'];
							$matrix_data['name'.$f3]=$p3_member['User']['first_name'].' '.$p3_member['User']['last_name'];
							$matrix_data['susername'.$f3]= $p3_member['User']['susername'];
							$matrix_data['country_name'.$f3]= $this->findCountryName($p3_member['User']['country_id']);			
							$matrix_data['joining_date'.$f3]= $p3_member['User']['created'];			
							$matrix_data['level'.$f3]= $p3_member['Tree']['level'];		
							$matrix_data['position'.$f3]= $p3_member['Position']['referralcode'];					
							$matrix_data['member_icon'.$f3]='icon.png';
							} else if($position3==2){
							
							$f3=39;										
							$matrix_data['isComp'.$f3]=1;	
							$matrix_data['id'.$f3]=$p3_member['Tree']['position_id'];		
							$matrix_data['username'.$f3]=$p3_member['User']['username'];
							$matrix_data['name'.$f3]=$p3_member['User']['first_name'].' '.$p3_member['User']['last_name'];
							$matrix_data['susername'.$f3]= $p3_member['User']['susername'];
							$matrix_data['country_name'.$f3]= $this->findCountryName($p3_member['User']['country_id']);			
							$matrix_data['joining_date'.$f3]= $p3_member['User']['created'];			
							$matrix_data['level'.$f3]= $p3_member['Tree']['level'];	
							$matrix_data['position'.$f3]= $p3_member['Position']['referralcode'];							
							$matrix_data['member_icon'.$f3]='icon.png';
							
							} else if($position3==3){
							
							$f3=40;										
							$matrix_data['isComp'.$f3]=1;	
							$matrix_data['id'.$f3]=$p3_member['Tree']['position_id'];		
							$matrix_data['username'.$f3]=$p3_member['User']['username'];
							$matrix_data['name'.$f3]=$p3_member['User']['first_name'].' '.$p3_member['User']['last_name'];
							$matrix_data['susername'.$f3]= $p3_member['User']['susername'];
							$matrix_data['country_name'.$f3]= $this->findCountryName($p3_member['User']['country_id']);			
							$matrix_data['joining_date'.$f3]= $p3_member['User']['created'];			
							$matrix_data['level'.$f3]= $p3_member['Tree']['level'];		
							$matrix_data['position'.$f3]= $p3_member['Position']['referralcode'];					
							$matrix_data['member_icon'.$f3]='icon.png';
							
							}	
										
				
				}
				} else {
						
						 $matrix_data['spuser38']=$p2_member['User']['username'];
		                 $matrix_data['spuser39']=$p2_member['User']['username'];
		                 $matrix_data['spuser40']=$p2_member['User']['username'];
						
						}				
			
			        }		
								
				
				}
				 
				 
				 } else {
				 
				   $matrix_data['spuser11']=$p1_member['User']['username'];
		           $matrix_data['spuser12']=$p1_member['User']['username'];
		           $matrix_data['spuser13']=$p1_member['User']['username'];
				 
				 }
				
							
			
			  
			
			}
						
			  	 	   	   	  

		  }
		  		  
		} else {
		
		  $matrix_data['spuser2']=$records_member['User']['username'];
		  $matrix_data['spuser3']=$records_member['User']['username'];
		  $matrix_data['spuser4']=$records_member['User']['username'];
		
		}	
       

		$this->set('records',$matrix_data);
				
		
	  }

  




  
   function findsName($direct_referral=0) {

	    $name='';	   

		if($direct_referral>0){

	    $records=$this->User->findById($direct_referral); 	
	    $name=$records['User']['first_name'].' '.$records['User']['last_name'];

		}

		return $name;

	 }

function findReferral($direct_referral=0) {

	    $name='';	   

		if($direct_referral>0){

	    $records=$this->User->findById($direct_referral); 	
	    $name=$records['User']['member_code'];

		}

		return $name;

	 }


	  function findName($member_code=0) {

	    $name='';	   

		if($member_code>0){

	    $records=$this->User->findByMemberCode($member_code); 	

	    $name=$records['User']['first_name'].' '.$records['User']['last_name'];

		}

		return $name;

	 }

	

	 public function findCountryName($country_id=0) {

	    $name='';	   

		if($country_id>0){

	    $records=$this->Country->findById($country_id); 	

	    $name=$records['Country']['name'];

		}

		return $name;

	 }
   

	 

}