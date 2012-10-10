<?php
class VehiclesController extends AppController {

	public $scaffold;

	var $paginate = array(
		'limit' => 10,
		'order' => array(
			'Vehicle.created' => 'desc',
		),
	);
    
	function beforeFilter() {
	    parent::beforeFilter();
	}

  function index() {
  
	  $data = $this->paginate('Vehicle',array("Vehicle.user_id" => $this->Session->read('Auth.User.id')));
	  $this->set('data', $data);
	  	  
  }

	function add() {
    if(!empty($this->data)) {
      if($this->Vehicle->save($this->data)) {
          $this->Session->setFlash("Vehicle saved!");
          $this->redirect('/vehicles');
      }
    }
	}
	

}
