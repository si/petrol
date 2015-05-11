<?php
class CarPark extends AppModel {
	var $name = 'CarPark';
	var $order = array('CarPark.created DESC');

	var $belongsTo = array(
	 'Location',
  );

  var $virtualFields = array(
    'expires' => "DATE_ADD(`CarPark.created`, INTERVAL `duration_hours` HOUR)"
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
