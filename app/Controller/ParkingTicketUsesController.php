<?php
class ParkingTicketUsesController extends AppController {

	var $name = 'ParkingTicketUses';
	var $scaffold;

	function beforeRender() {
		parent::beforeRender();
	}

	function beforeFilter() {
		parent::beforeFilter();
	}

	function add() {
		  // Save data if posted or quick start/stop params are passed
		if(!empty($this->data) || isset($this->params['named']['starts']) || isset($this->params['named']['ends'])) {

			// Load form data to writable array
		    $form_data = $this->data;

	    	// Set the parking ticket based on passed param
			if(isset($this->params['named']['parking_ticket_id'])) 
				$form_data['ParkingTicketUse']['parking_ticket_id'] = $this->params['named']['parking_ticket_id'];

			// Set START date/time based on passed parameter
			if(isset($this->params['named']['starts'])) {
				$starts = strtotime($this->params['named']['starts']);
				$form_data['ParkingTicketUse']['starts'] = array(
				    'day' => date('d', $starts),
				    'month' => date('m', $starts),
				    'year' => date('Y', $starts),
				    'hour' => date('h', $starts),
				    'min' => date('i', $starts),
				    'meridian' => date('a', $starts),
			    );
			}

			// Set END date/time based on passed parameter
			if(isset($this->params['named']['ends'])) {
			    // Find the last ticket use that was started to end it
			    $form_data = $this->ParkingTicketUse->find('first', 
			    	array(
			    		'conditions'=>array(
			    			'ParkingTicketUse.ends'=>NULL, 
			    			'ParkingTicket.user_id'=>$this->Session->read('Auth.User.id')
			    		), 
			    		'order'=> array(
			    			'ParkingTicketUse.created DESC'
			    		)
			    	)
			    );
			    
				$ends = strtotime($this->params['named']['ends']);
				$form_data['ParkingTicketUse']['ends'] = array(
				    'day' => date('d', $ends),
				    'month' => date('m', $ends),
				    'year' => date('Y', $ends),
				    'hour' => date('h', $ends),
				    'min' => date('i', $ends),
				    'meridian' => date('a', $ends),
			    );

			}

			if($this->ParkingTicketUse->save($form_data)) {
				$this->Session->setFlash("Ticket use saved!");
				$this->redirect(array('controller'=>'parking_tickets','action'=>'view', $form_data['ParkingTicketUse']['parking_ticket_id']));
			}

		// Nothing posted
	    } else {

	    	$defaults = array();

	    	// Set the parking ticket based on passed param
			if(isset($this->params['named']['parking_ticket_id'])) {

				$defaults['ParkingTicketUse']['parking_ticket_id'] = $this->params['named']['parking_ticket_id'];

				// Get the parking ticket data
				$parkingTicket = $this->ParkingTicketUse->ParkingTicket->findById($this->params['named']['parking_ticket_id']);

				// Set START date/time based on parking ticket start date
				$defaults['ParkingTicketUse']['starts'] = $parkingTicket['ParkingTicket']['created'];
				
				// Set END date/time based on parking ticket end date
				$defaults['ParkingTicketUse']['ends'] = $parkingTicket['ParkingTicket']['expires'];

			}

			$this->data = $defaults;
		}

		// Lookups
		$this->set('parkingTickets', $this->ParkingTicketUse->ParkingTicket->find('list', array(
			'conditions'=>array(
				'ParkingTicket.user_id'=>$this->Session->read('Auth.User.id')
			)
		)));

	}

}