<?php
class Train extends AppModel {    
	var $name = 'Train';
	var $order = array('Train.created DESC');
	
	var $belongsTo = array(
	 'User',
  );

  var $validation = array(
    'price' => array(
      'required' => array(
        'rule' => 'required',
        'message' => 'Required'
      ),
      'value' => array(
        'rule' => 'empty',
        'message' => 'Required',
      ),
      'currency' => array(
        'rule' => array('money', 'left'),
        'message' => 'In pounds please',
      ),
    ),
  );

}
