<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');


class TransactionsController  extends AppController {



	var $name = 'Transactions'; 

	public $uses=array('Transaction','User','Setting','Invoice','Position');	

	public $paginate = array('limit' => 100);

	public $helpers = array('Csv');

	

	public function beforeFilter() {

    		parent::beforeFilter();
           
	}

    



	public function admin_index($userid=null) {

		$this->Transaction->recursive = 1;
		

		$path = func_get_args();
		
		$fdate='';

		$tdate='';

		$search=array();

		//$search['Transaction.commission_type']=1;

		if($userid!=null)
		{
		$search['User.username']=$userid;
		}

		if(is_array($path) && count($path)==2){
		$search['Transaction.user_id']=$userid;
		 $search['Transaction.created between ? and ?']=array($path['0'],$path['1']);

		 $fdate=$path['0'];

		 $tdate=$path['1'];

		}

		$this->paginate = array('limit' =>100,'order' => array('Transaction.created' => 'desc'));			

		$this->set('results',$this->paginate('Transaction',$search));			

		$this->set('fdate',$fdate);

		$this->set('tdate',$tdate);	

				

	}

	
     public function admin_money_adjustment($id=null) {

			$this->User->id = $id;
			if (!$this->User->exists()) {
		  	  throw new NotFoundException(__('Invalid user'));
			}
			
         $userl=$this->Auth->User();	

	    $records=array();
		if($this->request->is('post') || $this->request->is('put')) {	

		$amount=$this->request->data['Transaction']['amount'];
		$adjustment_type=$this->request->data['Transaction']['adjustment_type'];
		$adjustment_tofrom=$this->request->data['Transaction']['adjustment_tofrom'];

		$setting=$this->Setting->findById(1);		
		$admin_fees=0;		







		if(is_numeric($amount) && $amount>0){

		  $userbs= $this->User->read(null,$id);	
		  $remarks=$this->request->data['Transaction']['remarks'];
		  $userId=$userbs['User']['id'];	


		  $commission_type=0;
		  if($adjustment_type==1){	            

			$transaction=array();	

			$transaction['Transaction']['user_id']=$userId;	

			$transaction['Transaction']['type']=4;

			$transaction['Transaction']['amount']=$amount;

			$transaction['Transaction']['received_type']=1;

			$transaction['Transaction']['commission_type']=$commission_type;

			$transaction['Transaction']['payment_status']=1;	

			$transaction['Transaction']['from_user_id']=$userl['id'];

			$transaction['Transaction']['bonus_from']=$userl['first_name'].' '.$userl['last_name'];
			$transaction['Transaction']['remarks']=$remarks;	
			$transaction['Transaction']['created']=date('Y-m-d H:i:s');
			$this->Transaction->Create();
			if($this->Transaction->Save($transaction)){	
			
			      if($adjustment_tofrom==1){
				     $this->User->query("update acs_users set ewallet=ewallet+$amount where id=".$userId);
				   } else if($adjustment_tofrom==2){
				     $this->User->query("update acs_users set bwewallet=bwewallet+$amount where id=".$userId);
				   } 

			 }	



			$this->Session->setFlash('Amount has been adjusted to this user account.','default',array('class'=>'alert alert-success'));	

		    $this->redirect(array('action' => 'index','controller'=>'users')); 	 





		  }	else if($adjustment_type==0){	

		       $balance_amount=$userbs['User']['ewallet']-$amount; 	
			   $deduct_amount=$amount;


			if($balance_amount>=0){

			$transaction=array();	
			$transaction['Transaction']['user_id']=$userId;	
			$transaction['Transaction']['type']=4;
			$transaction['Transaction']['amount']=$deduct_amount;
			$transaction['Transaction']['received_type']=0;
			$transaction['Transaction']['commission_type']=$commission_type;
			$transaction['Transaction']['remarks']=$remarks;
			$transaction['Transaction']['from_user_id']=$userl['id'];
			$transaction['Transaction']['bonus_from']=$userl['first_name'].' '.$userl['last_name'];
			$transaction['Transaction']['created']=date('Y-m-d H:i:s');
			$this->Transaction->Create();
			if($this->Transaction->Save($transaction)){		
				
				  if($adjustment_tofrom==1){
				    $this->User->query("update acs_users set ewallet=ewallet-$deduct_amount where id=".$userId); 
				   } else if($adjustment_tofrom==2){
				     $this->User->query("update acs_users set bwewallet=bwewallet-$deduct_amount where id=".$userId);
				   } 
				
				  
				
	
			}	

			$this->Session->setFlash('Amount has been adjusted to this user account.','default',array('class'=>'alert alert-success'));	
		    $this->redirect(array('action' => 'index','controller'=>'users')); 

		  } else {
		     $this->Session->setFlash('The amount enter by you is incorrect. Please enter correct amount and try again.','default',array('class'=>'alert alert-danger'));	
		    }	
		 }	



		 } else {

             $this->Session->setFlash('The amount enter by you is incorrect. Please enter correct amount and try again.','default',array('class'=>'alert alert-danger'));	

		 }			

		} 

		$records= $this->User->read(null,$id);	
		$this->set('result',$records);

	}	
		


   /* public function admin_today_withdrawal_request() {

         $this->Transaction->recursive = 1;

     		

		    $fdate=date('Y-m-d').' 00:00:00';

			$tdate=date('Y-m-d H:i:s');

			

			$search=array();

			$search['Transaction.type']=5;

			$search['Transaction.withdrawal_status IN(?,?,?)']=array(0,1,2);		

			$search['Transaction.created between ? and ?']=array($fdate,$tdate);		

			$this->paginate = array('limit' =>100,'order' => array('Transaction.created' => 'desc'));			

			$this->set('results',$this->paginate('Transaction',$search));			

		

	}*/
	
    public function admin_bw_summary_history() {
	
	    $search=array();	
		$search['Position.bw > ']=0;	
	    $this->paginate = array('conditions'=>$search,'limit' =>100,'order' => array('Position.bw' => 'desc'));	
		$this->set('results',$this->paginate('Position'));

	}
	
	public function admin_uc_summary_history() {
	
	    $search=array();	
		$search['Position.tcommission > ']=0;	
	    $this->paginate = array('conditions'=>$search,'limit' =>100,'order' => array('Position.tcommission' => 'desc'));	
		$this->set('results',$this->paginate('Position'));

	}
	
	
   public function admin_commission_summary($fdate=0,$tdate=0,$type=1,$key=0) {	 		   
			

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
		
		$this->User->unbindModel(array('hasMany' => array('Invoice','Tree')));		
		$this->paginate = array('conditions'=>$search,'limit' =>100,'fields'=>array('User.id','User.created','User.username','User.first_name','User.last_name','User.email','User.status'),'order' => array('User.id' => 'asc'));	
		$results=$this->paginate('User');
		
		if(count($results)>0){ 
		   foreach($results as $k=>$result){
		   
		          $positions=$result['Position'];
		          if(count($positions)>0){
				   foreach($positions as $pk=>$position){
				   
				     $user_id=$position['user_id'];
				     $referralcode=$position['referralcode'];
					 
					 $rmcommission=$this->Transaction->find('all',array('conditions'=>array('Transaction.user_id'=>$user_id,'Transaction.positionreffid'=>$referralcode,'Transaction.type'=>3,'Transaction.commission_type <= '=>3),'fields'=>array('sum(Transaction.amount) as amount')));  	
		             $totalcom=$rmcommission['0']['0']['amount']+0;
					 
					 $position['totalcom']=$totalcom;					 
					 
					 $positions[$pk]=$position;
					 
				   }
				  }
		          
				  $results[$k]['Position']=$positions;
		   
		   }		
		}	
		
		
		$this->set('results',$results);			
		
		$this->set('fdate',$fdate);
		$this->set('tdate',$tdate); 		
	}		

   public function admin_capital_refund($fdate=0,$tdate=0,$username=0) {	 		   
			

		$search=array();	
		$search['Transaction.commission_type']=1;	

		if(!is_numeric($username)){
		  $search['Transaction.username LIKE ']="%$username%";
		}

		if(strlen($fdate)==10 && strlen($tdate)==10){	
		  $fdate1=$fdate.' 00:00:00';
		  $tdate1=$tdate.' 23:59:00'; 
		  $search['Transaction.created between ? and ?']=array($fdate1,$tdate1);
		} else {
		  $fdate='';
		  $tdate=''; 
		}				

		$this->paginate = array('conditions'=>$search,'limit' =>100,'order' => array('Transaction.id' => 'desc'));	
		$this->set('results',$this->paginate('Transaction'));	
		
		$this->set('fdate',$fdate);
		$this->set('tdate',$tdate);  
		
		
	}		

   public function admin_extra_commission($fdate=0,$tdate=0,$username=0) {	 		   
			

		$search=array();	
		$search['Transaction.commission_type']=2;	

		if(!is_numeric($username)){
		  $search['Transaction.username LIKE ']="%$username%";
		}

		if(strlen($fdate)==10 && strlen($tdate)==10){	
		  $fdate1=$fdate.' 00:00:00';
		  $tdate1=$tdate.' 23:59:00'; 
		  $search['Transaction.created between ? and ?']=array($fdate1,$tdate1);
		} else {
		  $fdate='';
		  $tdate=''; 
		}				

		$this->paginate = array('conditions'=>$search,'limit' =>100,'order' => array('Transaction.id' => 'desc'));	
		$this->set('results',$this->paginate('Transaction'));	
		
		$this->set('fdate',$fdate);
		$this->set('tdate',$tdate);  
		
		
	}		

   public function admin_upline_commission($fdate=0,$tdate=0,$username=0) {	 		   
			

		$search=array();	
		$search['Transaction.commission_type']=3;	

		if(!is_numeric($username)){
		  $search['Transaction.username LIKE ']="%$username%";
		}

		if(strlen($fdate)==10 && strlen($tdate)==10){	
		  $fdate1=$fdate.' 00:00:00';
		  $tdate1=$tdate.' 23:59:00'; 
		  $search['Transaction.created between ? and ?']=array($fdate1,$tdate1);
		} else {
		  $fdate='';
		  $tdate=''; 
		}				

		$this->paginate = array('conditions'=>$search,'limit' =>100,'order' => array('Transaction.id' => 'desc'));	
		$this->set('results',$this->paginate('Transaction'));	
		
		$this->set('fdate',$fdate);
		$this->set('tdate',$tdate);  
		
		
	}		
	
   public function admin_bwhistory($fdate=0,$tdate=0,$username=0) {	 		   
			

		$search=array();	
		$search['Transaction.commission_type']=4;	

		if(!is_numeric($username)){
		  $search['Transaction.username LIKE ']="%$username%";
		}

		if(strlen($fdate)==10 && strlen($tdate)==10){	
		  $fdate1=$fdate.' 00:00:00';
		  $tdate1=$tdate.' 23:59:00'; 
		  $search['Transaction.created between ? and ?']=array($fdate1,$tdate1);
		} else {
		  $fdate='';
		  $tdate=''; 
		}				

		$this->paginate = array('conditions'=>$search,'limit' =>100,'order' => array('Transaction.id' => 'desc'));	
		$this->set('results',$this->paginate('Transaction'));	
		
		$this->set('fdate',$fdate);
		$this->set('tdate',$tdate);  
		
		
	}
	   
		
    public function admin_wallet_statement($fdate='',$tdate='') {

		$search=array();
        $search['Transaction.type']=4;	
		if(strlen($fdate)==10 && strlen($tdate)==10){
		 $fdate1=$fdate.' 00:00:00';
		 $tdate1=$tdate.' 23:59:00';
		 $search['Transaction.created between ? and ?']=array($fdate1,$tdate1);		
		} 
		$this->paginate = array('conditions'=>$search,'limit' =>100,'order' => array('Transaction.created' => 'desc'));	
        $this->Transaction->recursive = 1;	
		$this->set('results',$this->paginate('Transaction'));
		
	}

	public function admin_delete($id = null) {

		

		$this->Transaction->id = $id;

		if (!$this->Transaction->exists()) {

			throw new NotFoundException(__('Invalid Transaction'));

		}

		if ($this->Transaction->delete()) {

			$this->Session->setFlash(__('Transaction deleted'));

			$this->redirect(array('action' => 'index'));

		}

		$this->Session->setFlash(__('Transaction was not deleted'));

		$this->redirect(array('action' => 'index'));

	}	

	public function admin_statement($id=null) {

	

	   

	    $user=$this->Auth->User();

		$search=array();

			

		$currentdt = date("Y-m-d");

		$statement_date='90 days';

        $previous_date= date("Y-m-d", strtotime( "$currentdt -$statement_date"));	

		

		$search['Transaction.user_id']=$id;	

		//$search['Transaction.created >= ']=$previous_date;	

			

	   /* $statement = $this->Transaction->find('all', array('conditions' => array('Transaction.user_id'=>$id,'Transaction.created >= '=> $previous_date),'order'=>array('Transaction.id ASC')));*/		

		

		$this->paginate = array('limit' =>100,'order' => array('Transaction.id' => 'ASC'));	

		$this->Transaction->unbindModel(array('belongsTo'=>array('User','Product'),'hasMany'=>array('Order')));

				

		$this->set('statements',$this->paginate('Transaction',$search));	

		

	    $userrs=$this->User->findById($id);

		$this->set('userrs',$userrs);		

	

	}	

	public function admin_ajax_common() { 

	       $this->autoRender = false; 

		   $string='';

		 

    	if($this->request->is('post')) {		

		  $post=$this->request->data;

		  switch($post['act']){	

		  		 

			  

			case 'status_change':

			  $status=$post['status'];

			  $this->User->query('update acs_transactions set withdrawal_status='.$status.' where id='.$post['id']);

			  if($status==0){$string='Request For Withdrawal';}

			  if($status==1){$string='Processing';}

			  if($status==2){$string='Canceled';}

			  if($status==3){$string='Completed';}

			  

			break;  

			  

		   

			  

		  }		  		

		}

		

		

		 echo $string;

		   

	}	
	

}