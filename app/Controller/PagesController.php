<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class PagesController extends AppController {

/**
 * Controller name
 *
 * @var string
 */

	public $name = 'Pages'; 
	public $uses = array('User','Setting','Page','Invoice','Tree','Transaction');


    public function beforeFilter() {

   		 	parent::beforeFilter();

			$this->Auth->allow('randomCode','index');		
			
					
			
	}	

	

	public function index() {       
            $this->redirect('/administrators/login');
	}
	

	

	public function admin_details($id=null) {

        $this->Page->id = $id;

		if (!$this->Page->exists()) {

			throw new NotFoundException(__('Invalid page'));

		}

		

		$this->set('page',$this->Page->findById($id));

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

	

		
	

    public function admin_index() {		

		
		$this->Invoice->recursive = 0;	
		$this->paginate = array('limit' =>10,'order' => array('Invoice.id' => 'desc'));
		$this->set('invoices',$this->paginate('Invoice'));			
      
		$this->set('users',$this->User->find('all',array('limit'=>10,'order'=>array('User.id'=>'desc'))));	
				
		
		$total_customers=$this->User->find('count');
		$total_free_customers=$this->User->find('count',array('conditions'=>array('User.payment_status'=>0)));
		$total_paid_customers=$this->User->find('count',array('conditions'=>array('User.payment_status'=>1)));
		$this->set('total_customers',$total_customers);
		$this->set('total_free_customers',$total_free_customers);
		$this->set('total_paid_customers',$total_paid_customers);
		//-----------------------------			
		
		$capital_refund=$this->Transaction->find('all',array('conditions'=>array('Transaction.type'=>3,'Transaction.commission_type'=>1),'fields'=>array('sum(Transaction.amount) as amount')));
		$capitalrefund=$capital_refund['0']['0']['amount']+0;	
		
		$extra_commission=$this->Transaction->find('all',array('conditions'=>array('Transaction.type'=>3,'Transaction.commission_type'=>2),'fields'=>array('sum(Transaction.amount) as amount')));
		$extracommission=$extra_commission['0']['0']['amount']+0;	
		
		$upline_commission=$this->Transaction->find('all',array('conditions'=>array('Transaction.type'=>3,'Transaction.commission_type'=>3),'fields'=>array('sum(Transaction.amount) as amount')));
		$uplinecommission=$upline_commission['0']['0']['amount']+0;	
		
		$total_bw=$this->Transaction->find('all',array('conditions'=>array('Transaction.type'=>3,'Transaction.commission_type'=>4),'fields'=>array('sum(Transaction.amount) as amount')));
		$totalbw=$total_bw['0']['0']['amount']+0;	
		
		
		
		$sale_amount=$this->Invoice->find('all',array('conditions'=>array('Invoice.payment_status'=>1),'fields'=>array('sum(Invoice.amount) as amount')));			
		$total_sale_amount=$sale_amount['0']['0']['amount']+0;					
		
		$this->set('capitalrefund',$capitalrefund);				
		$this->set('extracommission',$extracommission);		
		$this->set('uplinecommission',$uplinecommission);				
		$this->set('total_bw',$totalbw);		
		$this->set('total_sale_amount',$total_sale_amount);
		
		//------------------------------------------
				
			 			
				
		$this->set('statements',$this->Transaction->find('all',array('limit'=>50,'order'=>array('Transaction.id'=>'desc'))));	
		
			
		

	}





   public function admin_view() {       

	    $this->Page->recursive = 0;

		$this->set('pages', $this->paginate('Page'));   

	}

	

	

	public function admin_edit($id = null) {

	

		$this->Page->id = $id;

		if (!$this->Page->exists()) {

			throw new NotFoundException(__('Invalid page'));

		}

		if ($this->request->is('post') || $this->request->is('put')) {		

		    		

			if ($this->Page->save($this->request->data)) {

					

				//$this->Session->setFlash(__('The page has been saved'));

				$this->redirect(array('action' => 'view'));

				

			} else {

				$this->Session->setFlash(__('The page could not be saved. Please, try again.'));

			}

		} else {

			$this->request->data = $this->Page->read(null, $id);

		}

	}





}