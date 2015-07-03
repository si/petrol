<?php
class ParkingTicketsController extends AppController {

	var $name = 'ParkingTickets';
	var $scaffold;

	function beforeRender() {
		parent::beforeRender();
	}

	function beforeFilter() {
		parent::beforeFilter();
	}

	function index() {
		// Get pagination results for ParkingTicket model
		$this->set('parkingTickets', $this->paginate('ParkingTicket'));

		// Get some ParkingTicket stats (total spent and tickets)
		$options = array(
			'fields' => array(
				'SUM(cost) as total_spent',
				'COUNT(*) as total_tickets',
				'MIN(ParkingTicket.created) first',
				'MAX(ParkingTicket.created) last',
				'DATEDIFF(MAX(ParkingTicket.created), MIN(ParkingTicket.created)) duration'
			),
			'conditions' => array('ParkingTicket.user_id' => $this->Session->read('Auth.User.id'))
		);
		$this->set('stats', $this->ParkingTicket->find('all', $options));
	}

	function edit($id='') {
		  // Save data
		if(!empty($this->data)) {

			// Load form data to writable array
		    $form_data = $this->data;

		    // Update duration based on units
		    if($form_data['ParkingTicket']['duration_units'] == 'd') {
		    	$form_data['ParkingTicket']['duration_hours'] *= 24;
		    } elseif($form_data['ParkingTicket']['duration_units'] == 'w') {
		    	$form_data['ParkingTicket']['duration_hours'] *= (24 * 7);
		    }

		    // Format custom date to array
		    $time = strtotime($form_data['ParkingTicket']['created']['hour'] .':'.$form_data['ParkingTicket']['created']['minute']);
		    $created = array(
			    'day' => $form_data['ParkingTicket']['created']['day'],
			    'month' => $form_data['ParkingTicket']['created']['month'],
			    'year' => date('Y'),
			    'hour' => date('h', $time),
			    'min' => date('i', $time),
			    'meridian' => date('a', $time),
		    );
		    $form_data['ParkingTicket']['created'] = $created;

		    // Set userId to current account
		    $form_data['ParkingTicket']['user_id'] = $this->Session->read('Auth.User.id');

		    // Get location ID if already created
		    $location_data = array('name'=>$form_data['ParkingTicket']['location']);
		    $location = $this->ParkingTicket->Location->find('all', array('conditions' => $location_data));

		    if(count($location)==0) {
			    $location_data['user_id'] = $this->Session->read('Auth.User.id');
		    	$location = $this->ParkingTicket->Location->save($location_data);
		    }

		    // Set location ID for Parking Ticket
		    $form_data['ParkingTicket']['location_id'] = (isset($location['Location'])) ? $location['Location']['id'] : $location[0]['Location']['id'];

		    // Set Parking Ticket Use start time to now for brand new tickets
		    if($id=='') $form_data['ParkingTicketUse'][0]['starts'] = $created;

			if($this->ParkingTicket->saveAll($form_data)) {
				$this->Session->setFlash("Parking ticket saved!");
				$this->redirect(array('action'=>'view', $this->ParkingTicket->id));
			}

		// Nothing posted
	    } else {

			// Check if editing
		    if($id!='') {
		    	// get receipt data
				$data = $this->ParkingTicket->findById($id);
				// parse created to array from string
				$data['ParkingTicket']['created'] = date_parse($data['ParkingTicket']['created']);
				// Set data 
				$this->data = $data;
		    } else {
		    	// Set some defaults
		    	
			    $defaults['ParkingTicket']['created']['hour'] = date('H');
			    $defaults['ParkingTicket']['created']['minute'] = date('i');
			    $defaults['ParkingTicket']['created']['day'] = date('d');
			    $defaults['ParkingTicket']['created']['month'] = date('m');
			    
			    $this->data = $defaults;
			}			    
		}

		$this->set('locations', $this->ParkingTicket->Location->find('list'));
		$this->set('location_history', $this->ParkingTicket->find('all', array(
			'fields' => array(
				'DISTINCT Location.id',
				'Location.name',
			),
			'conditions'=>array(
				'ParkingTicket.user_id'=>$this->Session->read('Auth.User.id')
			)
		)));
	}


}
