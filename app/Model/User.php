<?php
// app/Model/User.php

App::uses('AuthComponent', 'Controller/Component');

class User extends AppModel {

    public $name = 'User';
    public $displayField = 'username';
    
    public $hasMany = array(
      'Fillup',
      'Vehicle',
    );
    
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Username is required'
            )
        ),
/*
        'password' => array(
					'rule' => 'alphanumeric',
          'required' => true,
        ),
        'email' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Your email is required'
            )
        ),
*/
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('admin', 'author')),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        )
    );
    
    public $hasMany = array(
      'Fillup' => array(
        'order' => 'Fillup.created DESC',
        'limit' => '10',
      ),
      'Vehicle',
    );
    
    public function beforeSave() {
	    if (isset($this->data[$this->alias]['password'])) {
	        $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
	    }
	    return true;
		}

 }
