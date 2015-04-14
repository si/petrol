<?php
class TrainTicketsController extends AppController {

	var $name = 'TrainTickets';
	var $scaffold;

	function beforeRender() {
	  parent::beforeRender();
	}

	function beforeFilter() {
	  parent::beforeFilter();
	}

	function form($id='') {
		
		// If data is posted
	    if(!empty($this->data)) {
		    
		    // Format custom date to array
		    $data = $this->data;
		    $time = strtotime($data['TrainTicket']['created']['hour'] .':'.$data['TrainTicket']['created']['minute']);
		    $created = array(
			    'day' => $data['TrainTicket']['created']['day'],
			    'month' => $data['TrainTicket']['created']['month'],
			    'year' => date('Y'),
			    'hour' => date('h', $time),
			    'min' => date('i', $time),
			    'meridian' => date('a', $time),
		    );
		    $data['TrainTicket']['created'] = $created;
		    
			// Check validation
	        //if($this->Receipt->validates()) {
				// Check if saved
		        if($this->TrainTicket->save($data)) {
					$this->Session->setFlash("Train ticket saved!");
					$this->redirect('/train_tickets/view/'.$this->TrainTicket->id);
				}
			//}
			
		// Nothing posted
	    } else {

			// Check if editing
		    if($id!='') {
		    	// get receipt data
				$data = $this->TrainTicket->findById($id);
				// parse created to array from string
				$data['TrainTicket']['created'] = date_parse($data['TrainTicket']['created']);
				// Set data 
				$this->data = $data;
		    } else {
		    	// Set some defaults
		    	
			    $defaults['TrainTicket']['created']['hour'] = date('H');
			    $defaults['TrainTicket']['created']['minute'] = date('i');
			    $defaults['TrainTicket']['created']['day'] = date('d');
			    $defaults['TrainTicket']['created']['month'] = date('m');
			    
			    $this->data = $defaults;
			}			    
	    }

	    $this->set('train_stations', $this->TrainTicket->TrainStation->find('list'));
	    $this->set('train_ticket_types', $this->TrainTicket->TrainTicketType->find('list'));
	    $this->set('train_ticket_classes', $this->TrainTicket->TrainTicketClass->find('list'));
	    $this->set('train_ticket_restrictions', $this->TrainTicket->TrainTicketRestriction->find('list'));

	}
}
