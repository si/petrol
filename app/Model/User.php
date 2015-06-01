<?php
// app/Model/User.php

App::uses('AuthComponent', 'Controller/Component');

class User extends AppModel {

    public $name = 'User';
    public $displayField = 'username';

    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Username is required'
            ),
            'alphaNumeric' => array(
              'rule' => 'alphaNumeric',
              'required' => true,
              'message' => 'Letters and numbers only'
            ),
            'unique' => array(
              'rule' => 'isUnique',
              'message' => 'Username has already been taken.'
            ),
        ),
        'password' => array(
          'rule' => array('notEmpty'),
          'message' => 'Password is required'
        ),
        'email' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Email is required'
            ),
            'unique' => array(
              'rule' => 'isUnique',
              'message' => 'Email has already been registered'
            ),
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('Admin', 'Member')),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        )
    );

    public $hasMany = array(
      'Receipt' => array(
        'order' => 'Receipt.created DESC',
        'limit' => '10',
      ),
      'TrainTicket' => array(
        'order' => 'TrainTicket.created DESC',
        'limit' => '10',
      ),
      'ParkingTicket' => array(
        'order' => 'ParkingTicket.created DESC',
        'limit' => '10',
      ),
      'Vehicle' => array(
        'conditions' => array("Vehicle.status = ''"),
        'order' => array('Vehicle.created DESC')

      )
    );


    public function beforeSave($options = array()) {
	    if (isset($this->data[$this->alias]['password'])) {
	        $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
	    }
	    return true;
		}

 }
