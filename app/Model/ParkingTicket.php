<?php
class ParkingTicket extends AppModel {
	var $name = 'ParkingTicket';
	var $order = array('ParkingTicket.created DESC');
  var $displayField = "display";


	var $belongsTo = array(
	 'Location',
  );

  var $hasMany = array(
   'ParkingTicketUse' => array(
   	'order' => array('ParkingTicketUse.starts DESC')
   ),
  );

  var $virtualFields = array(
    'expires' => "DATE_ADD(`ParkingTicket.created`, INTERVAL `duration_hours` HOUR)",
    'display' => "CONCAT(DATE_FORMAT(ParkingTicket.created, '%a %e %b'), ', £', cost)"
  );

  var $validation = array(
    'cost' => array(
      'required' => array(
        'rule' => 'required',
        'message' => 'Required'
      ),
		)
  );

}
