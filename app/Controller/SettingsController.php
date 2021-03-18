<?php
App::uses('AppController', 'Controller');
App::import('Lib', 'Watimage');


class SettingsController extends AppController {





	var $name = 'Settings'; 
	public $uses=array('Setting','PaymentSetting','User','Country','Bank','State','City');	
	public $paginate = array('limit' => 100);


	public function beforeFilter() {
    		parent::beforeFilter();	
			
	}




  public function admin_index($id=1) {  

		$this->Setting->id=$id;
		if (!$this->Setting->exists()) {
			throw new NotFoundException(__('Invalid setting'));
		}


		if ($this->request->is('post') || $this->request->is('put')) {			


			$company_logo_arry=$this->request->data['Setting']['site_logo'];
			unset($this->request->data['Setting']['site_logo']);
			
			

			if ($this->Setting->save($this->request->data)) {
			  if($company_logo_arry['error']==0){	

					$allowedExts = array("gif", "jpeg", "jpg", "png", "GIF", "JPEG", "JPG", "PNG");



					$temp = explode(".", $company_logo_arry["name"]);



					$extension = end($temp);	



                    $company_logo=$company_logo_arry['name'];					







					$file=time().'-'.$company_logo;	



				    $original_file_path =WWW_ROOT . 'files' . DS . 'logo' . DS .$file;	



			        move_uploaded_file($company_logo_arry['tmp_name'],$original_file_path);











	               /* $thumb_path =WWW_ROOT . 'files' . DS . 'logo' . DS . $file;	



					$wic=new Watimage();		



					$wic->setImage($original_file_path);



					$wic->resize(array('type' => 'resizecrop', 'size' => array('180','90')));



					$wic->generate($thumb_path);	



					unset($wic);*/







					$this->Setting->saveField('site_logo',$file);



	             }	


				$this->Session->setFlash('The settings information has been saved','default',array('class'=>'alert alert-success'));
				$this->redirect(array('controller'=>'settings','action' => 'index'));
			} else {
				$this->Session->setFlash('The settings could not be saved. Please, try again.','default',array('class'=>'alert alert-danger'));
			}

		} else {















			$this->request->data = $this->Setting->read(null,$id);















		}







	}	
  
   public function admin_general_setting($id=1) {  



       		



		$this->Setting->id=$id;



		if (!$this->Setting->exists()) {



			throw new NotFoundException(__('Invalid setting'));



		}







		







		if($this->request->is('post') || $this->request->is('put')) {			



						







			if ($this->Setting->save($this->request->data)) {



			



                $this->Session->setFlash('The settings information has been saved','default',array('class'=>'alert alert-success'));			



				$this->redirect(array('controller'=>'settings','action' => 'general_setting'));







			} else {				



                $this->Session->setFlash('The settings could not be saved. Please, try again.','default',array('class'=>'alert alert-danger'));	



			}







		} else {







			$this->request->data = $this->Setting->read(null,$id);







		}







	}	
   
   public function admin_commission_setting($id=1) {  


		$this->Setting->id=$id;
		if (!$this->Setting->exists()) {
			throw new NotFoundException(__('Invalid setting'));

		}


		if($this->request->is('post') || $this->request->is('put')) {	
			if ($this->Setting->save($this->request->data)) {

                $this->Session->setFlash('The settings information has been saved','default',array('class'=>'alert alert-success'));			
				$this->redirect(array('controller'=>'settings','action' => 'commission_setting'));

			} else {	
                $this->Session->setFlash('The settings could not be saved. Please, try again.','default',array('class'=>'alert alert-danger'));	
			}

		} else {

			$this->request->data = $this->Setting->read(null,$id);
		}
	}		

   public function admin_bw_setting($id=1) {  

		$this->Setting->id=$id;
		if (!$this->Setting->exists()) {
			throw new NotFoundException(__('Invalid setting'));
		}



		if($this->request->is('post') || $this->request->is('put')) {			


			if($this->Setting->save($this->request->data)) {

                $this->Session->setFlash('The settings information has been saved','default',array('class'=>'alert alert-success'));			
				$this->redirect(array('controller'=>'settings','action' => 'bw_setting'));

			} else {	
                $this->Session->setFlash('The settings could not be saved. Please, try again.','default',array('class'=>'alert alert-danger'));	
			}
		} else {
			$this->request->data = $this->Setting->read(null,$id);

		}

	}		


}