<?php
class Fillup extends AppModel {    
	var $name = 'Fillup';
	var $order = array('Fillup.created DESC');
	var $virtualFields = array(
		'price_per_litre' => "(Fillup.cost / Fillup.litres)"
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
