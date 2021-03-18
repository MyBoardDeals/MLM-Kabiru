<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::import('Vendor', 'captcha/captcha');

/**

 * Users Controller

 *

 * @property User $User

 */

class AdministratorsController extends AppController {

	

	var $name = 'Administrators'; 	

	public $paginate = array('limit' => 1000);

    public $uses=array('Group','User');  

	 var $useTable = false; 

	 

	public function beforeFilter() {

	       parent::beforeFilter();

	       $this->Auth->allow('captcha_image','login','index','forgotpass');	    					

	}	

	

	

	public function login() {			

		$this->layout='default_login';
	    $load=0;		

       $sload=$this->Session->read('load');
	   if(isset($sload) && $sload==1){
	     $load=1;	
		 $this->Session->delete('load');	
	   }

   		if($this->request->is('post')) {
      
			if($this->Auth->login()) {

				//$admin_user=$this->Auth->User();							

				//$loginin=array();

				//$datetime=date('Y-m-d H:i:s');  

																  					

				//$this->User->id=$admin_user['id'];									

				//$this->User->saveField('last_login_ip',$_SERVER['REMOTE_ADDR']);	

				//$this->User->saveField('last_login_datetime',$datetime);				

										

				$this->redirect('/admin/pages/index');

							

        		} else {

            	
				 $load=1;	
				
				$this->Session->setFlash(__('Your username or password was incorrect.'));

        		}	
								

    	}
		
		$this->set('load',$load);					

	}

	
	public function forgotpass() {				

		$this->autoRender=false;
		

   		if($this->request->is('post')) {

		       
          $email=$this->request->data['User']['email'];
		  $user=$this->User->findByEmailAndGroupId($email,1);

		  if($user !=false){

		     
             $emailto=$user['User']['email'];
			 $password=rand(100,999).date('dmy');
			 $pass=AuthComponent::password($password);
			 $this->User->Query("update acs_users set password='".$pass."' where id=1");
			 

				$message='<p>Hi '.$user['User']['username'].',<br/>';
				$message.='Your new password : '.$password.'</p>';
								
				
				
				$Email = new CakeEmail();
				$Email->emailFormat('html');
				$Email->from(array('isuccess@gmail.com'=>'isuccess.biz'));
				$Email->to($emailto);
				$Email->subject('New password from isuccess');
				$Email->send($message); 
				
				$this->Session->setFlash(__('Your new password has been sent to your email.'));				

		  } else {

		      $this->Session->setFlash(__('Please enter your correct email address.'));			

		  }			

    	}	
		
		$this->Session->Write('load',1);
		
		$this->redirect('/administrators/login');
						

	}
	
	

	public function index() {

	  $this->redirect('/administrators/login');

	}

	

}