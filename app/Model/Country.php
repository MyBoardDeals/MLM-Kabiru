<?php

App::uses('AppModel', 'Model');

/**

 * Country  Model

 *

 * @property Country  $Country 

 */

class Country extends AppModel {



/**

 * Display field

 *

 * @var string

 */

    public $name = 'Country';	

	public $displayField = 'name';

	public $actsAs = array();



    public function parentNode() {

        return null;

    }



	

/**

 * hasMany associations

 *

 * @var array

 */

	public $hasMany = array(

		/*'State' => array(

			'className' => 'State',

			'foreignKey' => 'country_id',

			'dependent' => false,

			'conditions' => '',

			'fields' => '',

			'order' => '',

			'limit' => '',

			'offset' => '',

			'exclusive' => '',

			'finderQuery' => '',

			'counterQuery' => ''

		)*/

	);



	



}

