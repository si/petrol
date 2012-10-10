<?php
class Vehicle extends AppModel {    
	var $name = 'Vehicle';                    

	var $displayField = 'name';
	var $virtualFields = array(
		'name' => "CONCAT(Vehicle.manufacturer, ' ', Vehicle.model)"
	);

	var $hasMany = array(
	  'Fillup' => array(
      'order' => 'Fillup.created DESC',
      'limit' => '10',
    )
  );  

	var $belongsTo = 'User';
	
}
