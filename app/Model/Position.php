<?php

App::uses('AppModel', 'Model');



class Position extends AppModel {



	public $name = 'Position';	



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

