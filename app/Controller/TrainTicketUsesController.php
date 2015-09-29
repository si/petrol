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

			// Load form data to writable array
		    $form_data = $this->data;

	    	// Set the Train ticket based on passed param
			if(isset($this->params['named']['train_ticket_id']))
				$form_data['TrainTicketUse']['train_ticket_id'] = $this->params['named']['train_ticket_id'];

			// Set START date/time based on passed parameter
			if(isset($this->params['named']['departs'])) {
				$starts = strtotime($this->params['named']['departs']);
				$form_data['TrainTicketUse']['departs'] = array(
				    'day' => date('d', $starts),
				    'month' => date('m', $starts),
				    'year' => date('Y', $starts),
				    'hour' => date('h', $starts),
				    'min' => date('i', $starts),
				    'second' => date('s', $starts),
				    'meridian' => date('a', $starts),
			    );
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
				$form_data['TrainTicketUse']['arrives'] = array(
				    'day' => date('d', $ends),
				    'month' => date('m', $ends),
				    'year' => date('Y', $ends),
				    'hour' => date('h', $ends),
				    'min' => date('i', $ends),
				    'second' => date('s', $ends),
				    'meridian' => date('a', $ends),
			    );
				$response = 'Ticket use ended!';
			}

			if($this->TrainTicketUse->save($form_data)) {

	            /* Send email */
	            /* Doesn't work on UWH
				$Email = new CakeEmail('smtp');
				$Email->template('Train_use');
				$Email->from(array('Train@commutingcosts.com' => 'Commute App'));
				$Email->to($this->Session->read('Auth.User.email'));
				$Email->subject('[Commute] Train Used #' . $this->TrainTicketUse->id);
				$Email->emailFormat('html');
				$Email->helpers(array('Html', 'Number', 'Time'));
				$Email->viewVars(array('data'=>$form_data));
				$Email->send();
				*/

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

	function delete($id) {
		if($id!='') {
			$TrainTicketUse = $this->TrainTicketUse->findById($id);
			$this->TrainTicketUse->delete($id);
			$this->Session->setFlash('Ticket use removed');
			$this->redirect('/train_tickets/view/' . $TrainTicketUse['TrainTicketUse']['train_ticket_id'] . '#usage');
		}
	}

}
