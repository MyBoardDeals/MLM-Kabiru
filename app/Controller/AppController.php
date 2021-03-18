<?php
App::uses('Controller', 'Controller');
App::uses('L10n', 'I18n');



/**



 * Application Controller



 *



 * Add your application-wide methods in the class below, your controllers



 * will inherit them.



 *



 * @package       app.Controller



 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller



 */



class AppController extends Controller {



	



	  public $components = array(



        'Acl',



        'Auth' => array(



            'authorize' => array(



                'Actions' => array('actionPath' => 'controllers')



            )



        ),



        'Session','Cookie'



    );



		



		    



  



	public $uses=array('Setting','User','Group');
    public $helpers = array('Html', 'Form', 'Session', 'Js', 'Time');	


	 public function beforeFilter() {	 



	 



        //Configure AuthComponent 



		//$this->Auth->allow('index'); 


	    $this->Auth->actionPath = 'controllers/';
        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
        $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');	
       // $this->Auth->loginRedirect = array('controller' => 'pages', 'action' => 'home');  	

	        


        $this->set('logged_in',$this->is_LoggedIn());   
        $this->set('group_id',$this->is_GroupId());


		$lang = 'en';
		$language = $this->Session->read('Config.language');
		$return_lang=is_null($language) ? $lang : $language;	
		Configure::write('Config.language',$return_lang);
			

        $this->set('setting',$this->Setting->findById(1));
		$this->set('currency','MYBS');
	    $this->set('currency_code','MYBS');
		
       		

    }



    



	



	



    	public function is_LoggedIn() {



           $logged_in = FALSE;



           if($this->Auth->user()) {



               $logged_in = TRUE;



           }



        	return $logged_in;



       }		



	 public function is_GroupId() {

           $group_id = 0;

					 



           if($this->Auth->user()) {



               $group_id = $this->Auth->user('group_id');		
			   $authuser=$this->Auth->User();
			   $display_name=$authuser['username'];
			   $fullname=$authuser['first_name'].' '.$authuser['last_name'];
			   $last_login_datetime=date('Y-m-d H:i:s');
			   $servertime=date('Y-m-d H:i:s');
			   $country=$authuser['Country']['name'];	
			 
	           
			$luser=$this->User->find('first',array('conditions'=>array('User.id'=>$authuser['id']),'fields'=>array('User.reentry','User.expiry_date','User.member_photo')));
			$member_photo=$luser['User']['member_photo'];	
			$reentry=$luser['User']['reentry'];	
			
			$expiry_date=$luser['User']['expiry_date'];	
			$this->set('reentryChk',$reentry);
			$this->set('expiryDate',$expiry_date);
  
			   $this->set('display_name',$display_name);
               $this->set('memberphoto',$member_photo);
			   $this->set('fullname',$fullname);          
			   $this->set('last_login_datetime',$last_login_datetime);
			   $this->set('servertime',$servertime);
			   $this->set('country',$country);			   
			 

			   
           } 



        	return $group_id;



       }



	 function _setErrorLayout() {

	   if($this->name == 'CakeError') { 

		  $this->layout = 'error';

		}

	}

	

	function beforeRender () {

	   $this->_setErrorLayout();

	}



}