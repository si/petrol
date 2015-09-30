<?php
class VehicleEventsController extends AppController {

	var $name = 'VehicleEvents';
	var $scaffold;

	function beforeRender() {
		parent::beforeRender();
	}

	function beforeFilter() {
		parent::beforeFilter();
	}

	function export($id='',$format='ics') { 

		$this->layout = $format.'/default';

		// Find fields needed without recursing through associated models 
		$vehicleEvents = $this->VehicleEvent->find( 
			'all', 
			array( 
				'conditions' => array(
					'Vehicle.user_id' => $this->Session->read('Auth.User.id')
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