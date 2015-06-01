<?php
class ParkingTicket extends AppModel {
	var $name = 'ParkingTicket';
	var $order = array('ParkingTicket.created DESC');

	var $belongsTo = array(
	 'Location',
  );

  var $virtualFields = array(
    'expires' => "DATE_ADD(`ParkingTicket.created`, INTERVAL `duration_hours` HOUR)"
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
