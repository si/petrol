<?php
class Location extends AppModel {    
	var $name = 'Location';                    

	var $displayField = 'name';
	var $order = array('Location.name ASC');

	var $hasMany = array(
		'ParkingTicket' => array(
			'order' => 'ParkingTicket.created DESC',
		)
	);

	var $belongsTo = 'User';
}
