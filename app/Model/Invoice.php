<?php
App::uses('AppModel', 'Model');

class Invoice extends AppModel {

	public $name = 'Invoice';	

	public $displayField = 'name';
    public $actsAs = array();
	
    public function parentNode() {
        return null;
    }
	
    public $hasMany = array(
      
    );
	

	public $belongsTo = array( 
	     'User' => array(
            'className'  => 'User',
			'foreignKey' => 'user_id'
        )
		);
		    
}
