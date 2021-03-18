<?php

App::uses('AppModel', 'Model', 'AuthComponent', 'Controller/Component');

class User extends AppModel {

	public $name = 'User';	

	public $displayField = 'username';

    public $actsAs = array('Acl' => array('type' => 'requester'));

    public $hasMany = array(

       	'Invoice' => array(
            'className'  => 'Invoice',
			'foreignKey' => 'user_id'
        ),
		'Tree' => array(
            'className'  => 'Tree',
			'foreignKey' => 'user_id'
        ),
		'Position' => array(
            'className'  => 'Position',
			'foreignKey' => 'user_id'
        )
    );

	public $belongsTo = array(

		'Group' => array(

			'className' => 'Group',

			'foreignKey' => 'group_id'		

		),

		'Country' => array(

			'className' => 'Country',

			'foreignKey' => 'country_id'		

		),	

		'Gender' => array(

			'className' => 'Gender',

			'foreignKey' => 'gender_id'		

		)

	);

	public function parentNode() {

   		 if (!$this->id && empty($this->data)) {

   		     return null;

   		 }

   		 if (isset($this->data['User']['group_id'])) {

   		     $groupId = $this->data['User']['group_id'];

   		 } else {

   		     $groupId = $this->field('group_id');

   		 }

   		 if (!$groupId) {

   		     return null;

   		 } else {

   		     return array('Group' => array('id' => $groupId));

   		 }

	}


	public function bindNode($user) {

   		return array('model' => 'Group', 'foreign_key' => $user['User']['group_id']);

	}

}

