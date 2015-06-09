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
		  // Save data
		if(!empty($this->data)) {

			// Load form data to writable array
		    $form_data = $this->data;

			if($this->ParkingTicketUse->save($form_data)) {
				$this->Session->setFlash("Ticket use saved!");
				$this->redirect(array('controller'=>'parking_tickets','action'=>'view', $this->data['ParkingTicketUse']['parking_ticket_id']));
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