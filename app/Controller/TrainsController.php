<?php
class TrainsController extends AppController {

  var $name = 'Trains';
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
