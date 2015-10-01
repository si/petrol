<?php
class TrainTicketUsesController extends AppController {

	var $name = 'TrainTicketUses';
	var $scaffold;

	function beforeRender() {
		parent::beforeRender();
	}

	function beforeFilter() {
		parent::beforeFilter();
	}

	function add() {
		  // Save data if posted or quick start/stop params are passed
		if(!empty($this->data) || isset($this->params['named']['departs']) || isset($this->params['named']['arrives'])) {

			$response = '';

			// Load form data to writable array
		    $form_data = $this->data;

	    	// Set the Train ticket based on passed param
			if(isset($this->params['named']['train_ticket_id']))
				$form_data['TrainTicketUse']['train_ticket_id'] = $this->params['named']['train_ticket_id'];

			// Set START date/time based on passed parameter
			if(isset($this->params['named']['departs'])) {
				$starts = strtotime($this->params['named']['departs']);
				$form_data['TrainTicketUse']['departs'] = $this->_dateToArray($starts);
			    $response = 'Ticket use started!';
			}

			// Set END date/time based on passed parameter
			if(isset($this->params['named']['arrives'])) {
			    // Find the last ticket use that was started to end it
			    $form_data = $this->TrainTicketUse->find('first',
			    	array(
			    		'conditions'=>array(
			    			'TrainTicketUse.arrives'=>NULL,
			    			//'TrainTicket.user_id'=>$this->Session->read('Auth.User.id')
			    		),
			    		'order'=> array(
			    			'TrainTicketUse.created DESC'
			    		)
			    	)
			    );

				$ends = strtotime($this->params['named']['arrives']);
				$form_data['TrainTicketUse']['arrives'] = $this->_dateToArray($ends);
				$response = 'Ticket use ended!';
			}

			// Time to curate the data from quick form
		    //echo '<textarea>'; var_dump($form_data); echo '</textarea>';
		    if(isset($form_data['TrainTicketUse']['context']) && $form_data['TrainTicketUse']['context']=='quick') {
		    	$ttu = $form_data['TrainTicketUse'];

		    	// Sort out departure time
		    	$departs = $ttu['departs'];
		    	if($departs == '') {
		    		$response = 'No departure set';
		    	} else {
		    		$response = 'Got departure';
		    		// No colon in time
		    		if(strpos($departs,':') == false) {
		    			$mins = substr($departs, -2);
		    			$hours = substr($departs, -(strlen($departs)), (strlen($departs))-2);
		    			$departs = $hours . ':' . $mins;
		    		} 
		    		$departs = strtotime($departs);
		    		
		    		$form_data['TrainTicketUse']['departs'] = $this->_dateToArray($departs);
		    	}
		    }

		    //echo '<textarea>'; var_dump($form_data); echo '</textarea>';

			if($this->TrainTicketUse->save($form_data)) {

				$this->Session->setFlash($response);
				$this->redirect('/train_tickets/view/' . $form_data['TrainTicketUse']['train_ticket_id'] . "#usage");
			}

		// Nothing posted
	    } else {

	    	$defaults = array();

	    	// Set the Train ticket based on passed param
			if(isset($this->params['named']['train_ticket_id'])) {

				$defaults['TrainTicketUse']['train_ticket_id'] = $this->params['named']['train_ticket_id'];

				// Get the Train ticket data
				$trainTicket = $this->TrainTicketUse->TrainTicket->findById($this->params['named']['train_ticket_id']);

				// Set START date/time based on Train ticket start date
				$defaults['TrainTicketUse']['departs'] = $trainTicket['TrainTicket']['created'];

				// Set END date/time based on Train ticket end date

			}

			$this->data = $defaults;
		}

		// Lookups
		$this->set('trainTickets', $this->TrainTicketUse->TrainTicket->find('list', array(
			'conditions'=>array(
				'TrainTicket.user_id'=>$this->Session->read('Auth.User.id')
			)
		)));

	}

	function _dateToArray($timestamp) {
		return array(
		    'day' => date('d', $timestamp),
		    'month' => date('m', $timestamp),
		    'year' => date('Y', $timestamp),
		    'hour' => date('h', $timestamp),
		    'min' => date('i', $timestamp),
		    'second' => date('s', $timestamp),
		    'meridian' => date('a', $timestamp),
	    );
	}

	function delete($id) {
		if($id!='') {
			$TrainTicketUse = $this->TrainTicketUse->findById($id);
			$this->TrainTicketUse->delete($id);
			$this->Session->setFlash('Ticket use removed');
			$this->redirect('/train_tickets/view/' . $TrainTicketUse['TrainTicketUse']['train_ticket_id'] . '#usage');
		}
	}

}
