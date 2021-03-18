<?php
App::uses('AppModel', 'Model', 'Controller/Component');
/**
 * Country  Model
 *
 * @property Country  $Country 
 */
class Plan extends AppModel {

/**
 * Display field
 *
 * @var string
 */
    public $name = 'Plan';	
	public $displayField = 'name';
	public $actsAs = array('Containable');

   public $hasMany = array(
		'User' => array(
			'className' => 'User'					
		)
	);
   
     public function parentNode() {
        return null;
    }

/**
 * hasMany associations
 *
 * @var array
 */
/*	public $hasMany = array(
		'ps' => array(
			'className' => 'District',
			'foreignKey' => 'state_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);*/

}
