<?php

App::uses('AppModel', 'Model');



class Transaction extends AppModel {



	public $name = 'Transaction';	



	public $displayField = 'username';

    public $actsAs = array();

    public function parentNode() {

        return null;

    }

	

	

 public $hasMany = array(    

		

    );

	

	public $belongsTo = array(

		'User' => array(

			'className' => 'User',

			'foreignKey' => 'user_id'		

		)

	);   	



}

