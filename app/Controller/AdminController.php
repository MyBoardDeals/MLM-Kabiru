<?php
App::uses('AppController', 'Controller');


class AdminController extends AppController {

	var $name = 'Admin'; 
	public $paginate = array('limit' => 100);

	public function beforeFilter() {
	       parent::beforeFilter();
	       $this->redirect('/admin/pages/index');	    					

	}	

}