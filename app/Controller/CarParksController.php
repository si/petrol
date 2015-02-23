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

		    // Set userId to current account
		    $form_data['CarPark']['user_id'] = $this->Session->read('Auth.User.id');

			if($this->CarPark->save($form_data)) {
				$this->Session->setFlash("Car park saved!");
				$this->redirect(array('action'=>'view', $this->CarPark->id));
			}
		}

		// Lookup data
		if($id!='') {
			$this->data = $this->CarPark->findById($id);
		}

		$this->set('locations', $this->CarPark->Location->find('list'));
	}


}
