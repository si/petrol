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

	  $data = $this->Vehicle->find('all', array(
      'conditions'=> array(
        "Vehicle.user_id" => $this->Session->read('Auth.User.id')
      ),
      'order' => array('Vehicle.status ASC','Vehicle.created DESC')
    ));
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

	function edit($id='') {
	  // Save data
    if(!empty($this->data)) {
      if($this->Vehicle->save($this->data)) {
          $this->Session->setFlash("Vehicle saved!");
          $this->redirect('/vehicles');
      }
    }
    // Lookup data
    if($id!='') {
      $this->data = $this->Vehicle->findById($id);
      $this->set('max_litres',$this->Vehicle->Receipt->find('first',array('fields'=>array('litres'),'conditions'=>array('Receipt.vehicle_id'=>$id),'order'=>array('litres DESC'))));
    }
	}

	function delete($id='') {
    if($id!='') {
      if($this->Vehicle->delete($id)) {
        $this->Session->setFlash("Vehicle deleted!");
        $this->redirect('/vehicles');
      }
    }
  }

}
