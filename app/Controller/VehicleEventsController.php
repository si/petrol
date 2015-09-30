<?php
class VehicleEventsController extends AppController {

	var $name = 'VehicleEvents';
	var $scaffold;

	function beforeRender() {
		parent::beforeRender();
	}

	function beforeFilter() {
		parent::beforeFilter();
    	$this->Auth->allow('export');
	}

	function export($format='ics', $key='') { 

		if($key == '') {
			throw exception ('Unauthorised access');
		}
		$user_email = base64_decode($key);
		$user_id = $this->VehicleEvent->Vehicle->User->findByEmail($user_email);

		$this->layout = $format.'/default';

		// Find fields needed without recursing through associated models 
		$vehicleEvents = $this->VehicleEvent->find( 
			'all', 
			array( 
				'conditions' => array(
					'Vehicle.user_id' => $user_id
				)
			)
		); 
		// Make the data available to the view (and the resulting CSV file) 
		$this->set(compact('vehicleEvents','format')); 

		// Set calendar reminder to 1 hour
		$this->set('reminder_value',1);
		$this->set('reminder_unit','H');

	}
}