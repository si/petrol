<?php
class Receipt extends AppModel {    
	var $name = 'Receipt';
	var $order = array('Receipt.created DESC');
	var $virtualFields = array(
		'price_per_litre' => "(Receipt.cost / Receipt.litres)"
	);
	
	var $belongsTo = array(
	 'Vehicle',
	 'User',
  );

  var $validation = array(
    'odometer' => array(
      'numeric' => array(
        'rule' => 'numeric',
        'required' => true,
        'message' => 'Numbers only'
      ),
    ),
    'cost' => array(
      'rule' => array('money', 'left'),
      'message' => 'In pounds please'
    ),
    'litres' => array(
      'numeric' => array(
        'rule' => 'numeric',
        'required' => true,
        'message' => 'Numbers only'
      ),
    ),
  );

}
