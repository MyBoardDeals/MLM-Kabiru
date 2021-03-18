<?php

App::uses('AppModel', 'Model', 'Controller/Component');



class Tree extends AppModel {



	public $name = 'Tree';

	public $actsAs = array('Containable');

		

	

	public $belongsTo = array(      

		 'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id'	
		 ),
		 'Position' => array(
			'className' => 'Position',
			'foreignKey' => 'position_id'	
		 )

					

     );		

}