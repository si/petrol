<?php
class Vehicle extends AppModel {    
	var $name = 'Vehicle';                    

	var $displayField = 'name';
	var $virtualFields = array(
		'name' => "CONCAT(Vehicle.manufacturer, ' ', Vehicle.model)"
	);
	var $order = array('Vehicle.status ASC','Vehicle.created DESC');

	var $hasMany = array(
		'Receipt' => array(
			'order' => 'Receipt.created DESC',
			'limit' => '10',
		)
	);

	var $belongsTo = 'User';
}
