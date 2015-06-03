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

	function index() {
		$this->set('trainTickets', $this->paginate('TrainTicket'));

		// Get some trainTickets stats (total spent and tickets)
		$options = array(
			'fields' => array(
				'SUM(price) as total_spent',
				'COUNT(*) as total_tickets',
				'MIN(TrainTicket.created) first',
				'MAX(TrainTicket.created) last',
				'DATEDIFF(MAX(TrainTicket.created), MIN(TrainTicket.created)) duration'
			),
			'conditions' => array('TrainTicket.user_id' => $this->Session->read('Auth.User.id'))
		);
		$this->set('stats', $this->TrainTicket->find('all', $options));

		// Get some monthly figures
		$options = array(
			'fields' => array(
				"DATE_FORMAT(TrainTicket.created, '%Y-%m') month",
				'SUM(price) as total_spent',
			),
			'conditions' => array('TrainTicket.user_id' => $this->Session->read('Auth.User.id')),
			'group' => array("DATE_FORMAT(TrainTicket.created, '%Y-%m')"),
			'order' => array('TrainTicket.created ASC')
		);
		$totals = $this->TrainTicket->find('all', $options);
		// Clean up totals array without the extra associative array around each object
		foreach($totals as $total) {
			$totals_clean[] = $total[0];
		}
		$this->set('totals', $totals_clean);
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
		    
		    $data['TrainTicket']['user_id'] = $this->Session->read('Auth.User.id');
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
