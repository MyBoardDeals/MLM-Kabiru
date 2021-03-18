<?php



App::uses('AppController', 'Controller');



App::import('Lib', 'Watimage');



/**



 * Posts Controller



 *



 * @property Sliders $Sliders



 



 */



class EmailTemplatesController extends AppController {



	



	var $name = 'EmailTemplates'; 



	public $uses=array('EmailTemplate');	



	public $paginate = array('limit' => 1000);



	



	



	public function beforeFilter() {



    		parent::beforeFilter();

			$this->Auth->allow('ajaxcommon');

	    

	}







/**



 * index method



 *



 * @return void



 */



	public function admin_index() {



		$this->EmailTemplate->recursive = 0;

		$this->set('results', $this->paginate('EmailTemplate'));



	}
    
	

  


/**



 * add method



 *



 * @return void



 */



	public function admin_add() {



		if ($this->request->is('post')) {



            $this->request->data['EmailTemplate']['created']=date('Y-m-d H:i:s');
          
		   	



			$this->EmailTemplate->create();

			if ($this->EmailTemplate->save($this->request->data)) {


               
			        

				$this->Session->setFlash(__('The email template has been saved'));

				$this->redirect(array('action' => 'index'));

				



			} else {



				$this->Session->setFlash(__('The email template could not be saved. Please, try again.'));



			}

		}

	}







/**



 * edit method



 *



 * @throws NotFoundException



 * @param string $id



 * @return void



 */



	public function admin_edit($id = null) {



		$this->EmailTemplate->id = $id;

		if (!$this->EmailTemplate->exists()) {



			throw new NotFoundException(__('Invalid Email Template'));

		}



		if ($this->request->is('post') || $this->request->is('put')) {
		    



			if ($this->EmailTemplate->save($this->request->data)) {			  				 	



				$this->Session->setFlash(__('The email template has been updated'));

				$this->redirect(array('action' => 'index'));



			} else {

				$this->Session->setFlash(__('The email template could not be updated. Please, try again.'));

			}

		} else {



			$this->request->data = $this->EmailTemplate->read(null, $id);



		}

	}



public function admin_view($id = null) {



		$this->EmailTemplate->id = $id;



		if (!$this->EmailTemplate->exists()) {



			throw new NotFoundException(__('Invalid Email Template'));



		}



		$this->set('result', $this->EmailTemplate->read(null, $id));



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



	   $this->EmailTemplate->id = $id;

	   

		if (!$this->EmailTemplate->exists()) {

			throw new NotFoundException(__('Invalid Email Template'));

		}



		if ($this->MonthlyReport->delete()) {

		

			$this->Session->setFlash(__('Email template has been deleted'));

			$this->redirect(array('action' => 'index'));

		}



		$this->Session->setFlash(__('Email template was not deleted'));

		$this->redirect(array('action' => 'index'));



	}







public function ajaxcommon() { 

	       $this->autoRender = false; 

		   $string='';

		 

    	if($this->request->is('post')) {		

		  $post=$this->request->data;

		  

		  switch($post['act']){	

		  	  	  



			

			case 'updatestatus':			

			    $status=$post['status'];

				$id=$post['id'];

				$this->EmailTemplate->query("update acs_email_templates set status='".$status."' where id=".$id); 

				$string=$id;

			break;

						  

		  }		  		

		}				

		 echo $string;		   

	}



}



	


