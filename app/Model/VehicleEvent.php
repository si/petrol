<?php
class VehicleEvent extends AppModel {    
	var $name = 'VehicleEvent';
	var $displayField = 'date';

	var $belongsTo = array(
		'Vehicle',
		'VehicleEventType'
	);
}