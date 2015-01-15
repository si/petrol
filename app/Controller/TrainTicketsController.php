<?php
class TrainTicketsController extends AppController {

  var $name = 'TrainTickets';
  var $scaffold;

//  var $helpers = array('Map');
  public $helpers = array('GoogleMap');

	function beforeRender() {
	  parent::beforeRender();
	}

	function beforeFilter() {
	  parent::beforeFilter();
	}



}
