<?php
class ReportsController extends AppController {

  var $name = 'Reports';
  
//  var $helpers = array('Map');
  public $helpers = array('GoogleMap'); 

	function beforeRender() {
	  parent::beforeRender();
	}
	
	function beforeFilter() {
	  parent::beforeFilter();
	}
	

  function index() {

    $this->set('reports', $this->Report->find('all'));
  }

	function view($id = null) {

		$this->Report->id = $id;
		$this->set('report', $this->Report->read());
	}

	function add() {

		if (!empty($this->data)) {
			if ($this->Report->save($this->data)) {
				$this->flash('Report added.', '/reports');
			}
		}
	}
	
  function edit($id = null) {

  	$this->Report->id = $id;
  	if (empty($this->data)) {
  		$this->data = $this->Report->read();
  	} else {
  		if ($this->Report->save($this->data)) {
  			$this->flash('Your report has been updated.','/reports');
  		}
  	}
  }
  
	function delete($id) {

  	$this->Report->delete($id);
  	$this->flash('The report with id: '.$id.' has been deleted.', '/reports');
  }
}
