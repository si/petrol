<?php
class ParkingTicketUse extends AppModel {
	var $name = 'ParkingTicketUse';
	var $order = array('ParkingTicketUse.created DESC');

	var $belongsTo = array(
	 'ParkingTicket',
	);

	var $virtualFields = array(
		'duration' => "TIMEDIFF(`ends`,`starts`)"
	);

}