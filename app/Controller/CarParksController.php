<?php
class CarParksController extends AppController {

	var $name = 'CarParks';
	var $scaffold;

	function beforeRender() {
		parent::beforeRender();
	}

	function beforeFilter() {
		parent::beforeFilter();
	}

	function edit($id='') {
		  // Save data
		if(!empty($this->data)) {

			// Load form data to writable array
		    $form_data = $this->data;

		    // Update duration based on units
		    if($form_data['CarPark']['duration_units'] == 'd') {
		    	$form_data['CarPark']['duration_hours'] *= 24;
		    } elseif($form_data['CarPark']['duration_units'] == 'w') {
		    	$form_data['CarPark']['duration_hours'] *= (24 * 7);
		    }

		    // Format custom date to array
		    $time = strtotime($form_data['CarPark']['created']['hour'] .':'.$form_data['CarPark']['created']['minute']);
		    $created = array(
			    'day' => $form_data['CarPark']['created']['day'],
			    'month' => $form_data['CarPark']['created']['month'],
			    'year' => date('Y'),
			    'hour' => date('h', $time),
			    'min' => date('i', $time),
			    'meridian' => date('a', $time),
		    );
		    $form_data['CarPark']['created'] = $created;

		    // Set userId to current account
		    $form_data['CarPark']['user_id'] = $this->Session->read('Auth.User.id');

			if($this->CarPark->save($form_data)) {
				$this->Session->setFlash("Car park saved!");
				$this->redirect(array('action'=>'view', $this->CarPark->id));
			}

		// Nothing posted
	    } else {

			// Check if editing
		    if($id!='') {
		    	// get receipt data
				$data = $this->CarPark->findById($id);
				// parse created to array from string
				$data['CarPark']['created'] = date_parse($data['CarPark']['created']);
				// Set data 
				$this->data = $data;
		    } else {
		    	// Set some defaults
		    	
			    $defaults['CarPark']['created']['hour'] = date('H');
			    $defaults['CarPark']['created']['minute'] = date('i');
			    $defaults['CarPark']['created']['day'] = date('d');
			    $defaults['CarPark']['created']['month'] = date('m');
			    
			    $this->data = $defaults;
			}			    
		}

		$this->set('locations', $this->CarPark->Location->find('list'));
	}


}
