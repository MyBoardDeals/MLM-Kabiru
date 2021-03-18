<?php
App::uses('AppController', 'Controller');
App::import('Lib', 'Coinbase');


class InvoicesController  extends AppController {


	var $name = 'Invoices'; 
	public $uses=array('Invoice','User','Setting','Order','Plan','Country','PaymentProcessor');
	public $paginate = array('limit' => 100);


	public function beforeFilter() {
    		parent::beforeFilter();	
			
			
			
    		$this->Auth->allow('bitcoin','paypal','stppayment');

	}
	
	
		
	
	public function download($file) {

        $this->viewClass = 'Media';
		       
		$temp = explode(".", $file);

		$extension = end($temp);	

        $params = array(

            'id'        => $file,

            'name'      => $temp['0'],

            'download'  => true,

            'extension' => $extension,

            'path'      => WWW_ROOT . 'files' . DS . 'order' . DS ,

        );

        $this->set($params);

    }
	
	
    public function admin_index($fdate='',$tdate='',$username='') {

	         $search=array();				
			 $search['Invoice.payment_status']=1;
			 if(isset($username) && strlen($username)>0){
		       $search['User.username']=$username;
		     }		



			if(strlen($fdate)==10 && strlen($tdate)==10){
			$fdate1=$fdate.' 00:00:00';
			$tdate1=$tdate.' 23:59:00';
			$search['Invoice.created between ? and ?']=array($fdate1,$tdate1);	
			} 	

			

			$this->Invoice->recursive = 1;	
			$this->paginate = array('conditions'=>$search,'limit' =>100,'order' => array('Invoice.created' => 'desc'));	
			$this->set('results',$this->paginate('Invoice'));	

			$this->set('fdate',$fdate);
			$this->set('tdate',$tdate);	
		    $this->set('username',$username);		

	}
	
	/* public function admin_completed($fdate='',$tdate='',$username='') {

	       $path = func_get_args();
		   
		    $search=array();				
			$search['Invoice.payment_status']=1;
			 if(isset($username) && strlen($username)>0){
		       $search['User.username']=$username;
		     }		



			if(strlen($fdate)==10 && strlen($tdate)==10){
			$fdate1=$fdate.' 00:00:00';
			$tdate1=$tdate.' 23:59:00';
			$search['Invoice.created between ? and ?']=array($fdate1,$tdate1);	
			} 	

			

			$this->Invoice->recursive = 1;	
			$this->paginate = array('conditions'=>$search,'limit' =>100,'order' => array('Invoice.created' => 'desc'));	
			$this->set('results',$this->paginate('Invoice'));	

			$this->set('fdate',$fdate);
			$this->set('tdate',$tdate);	
		    $this->set('username',$username);		

	}  
    
	 public function admin_canceled($fdate='',$tdate='',$username='') {

	        $search=array();				
			$search['Invoice.payment_status']=2;
			 if(isset($username) && strlen($username)>0){
		       $search['User.username']=$username;
		     }		



			if(strlen($fdate)==10 && strlen($tdate)==10){
			$fdate1=$fdate.' 00:00:00';
			$tdate1=$tdate.' 23:59:00';
			$search['Invoice.created between ? and ?']=array($fdate1,$tdate1);	
			} 	

			

			$this->Invoice->recursive = 1;	
			$this->paginate = array('conditions'=>$search,'limit' =>100,'order' => array('Invoice.created' => 'desc'));	
			$this->set('results',$this->paginate('Invoice'));	

			$this->set('fdate',$fdate);
			$this->set('tdate',$tdate);	
		    $this->set('username',$username);		

	}
   */
  
	/*public function admin_csv($fdate=null,$tdate=null) {	

	    $this->layout=false;	
		$search=array();
			

		
			
				   
			$search['Invoice.payment_status']=1;
					
			
			if(strlen($fdate)==10 && strlen($tdate)==10){
			  $fdate=$fdate.' 00:00:00';
			  $tdate=$tdate.' 23:59:00';	
			  $search['Invoice.created between ? and ?']=array($fdate,$tdate);
			} else {
			  $fdate=date('Y-m-d').' 00:00:00';
			  $tdate=date('Y-m-d').' 23:59:00';	
			  $search['Invoice.created between ? and ?']=array($fdate,$tdate);
			}	
			
			
			$this->set('results',$this->Invoice->find('all',array('conditions'=>$search)));
			$this->set('filename','invoice');

		 

							

	    $headers  = array('No','User','Email','Address','Mobile No','Amount','Payment Through','Transaction Number','Status','Remarks','Order Date');		

		$head=$this->set('header',$headers);

	

	}*/




 public function admin_view($id=null) {

		
		$this->Invoice->recursive = 1;

		$this->Invoice->id = $id;
		if (!$this->Invoice->exists()) {
			throw new NotFoundException(__('Invalid Invoice'));
		}

		

		$invoices=$this->Invoice->findById($id);					
		$this->set('invoices',$invoices);

       
		
		$this->set('setting', $this->Setting->findById(1));		
		$this->Country->recursive=-1;
	    $country=$this->Country->findById($invoices['User']['country_id']);
		$this->set('country',$country);
      
	}



/**

 * delete method

 *

 * @throws MethodNotAllowedException

 * @throws NotFoundException

 * @param string $id

 * @return void

 */

	public function admin_delete($id = null) {

		

		$this->Invoice->id = $id;

		if (!$this->Invoice->exists()) {

			throw new NotFoundException(__('Invalid Invoice'));

		}

		if ($this->Invoice->delete()) {

			$this->Session->setFlash(__('Invoice deleted'));

			$this->redirect(array('action' => 'index'));

		}

		$this->Session->setFlash(__('Invoice was not deleted'));

		$this->redirect(array('action' => 'index'));

	}

	

	

}