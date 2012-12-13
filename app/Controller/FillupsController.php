<?php
class FillupsController extends AppController {

	var $scaffold;
	var $helpers = array('Html','Time','Number');

	var $paginate = array(
		'limit' => 10,
		'order' => array(
			'Fillup.created' => 'desc',
		),
	);
    
	function beforeRender() {
	  parent::beforeRender();
	}
	
	function beforeFilter() {
	  parent::beforeFilter();
	}
	
  function index() {
  
  	$user_id = $this->Session->read('Auth.User.id');
  	
  	$conditions = array(
  	 "Fillup.user_id" => $this->Session->read('Auth.User.id')
    );

    // Conditional Vehicle filter
  	if(isset($this->params['named']['vehicle'])) {
  	  $conditions['vehicle_id'] =  $this->params['named']['vehicle'];
  	  $this->set('vehicle', $this->Fillup->Vehicle->findById($this->params['named']['vehicle']));
    }

    // Conditional Location filter
  	if(isset($this->params['named']['location'])) {
  	  $conditions['location'] =  $this->params['named']['location'];
  	  $this->set('location', $this->params['named']['location']);
    }
  
	  $data = $this->paginate('Fillup',$conditions);
	  $this->set('data', $data);
	  
	  $totals = $this->Fillup->find('all', array(
	      'fields'=> array('SUM(cost) AS spent'),
	      'conditions' => $conditions,
	    ));
/*
	  	FROM fillups
	  	WHERE user_id = ' . $this->Session->read('Auth.User.id'))
	  	;
*/
	  $this->set('totals',$totals);
	  
	  $vehicles = $this->Fillup->Vehicle->find('list', array('conditions'=>array('user_id'=>$this->Session->read('Auth.User.id'))));
	  $this->set('vehicles',$vehicles);
	  
  }
  
	function add() {
	
			$vehicles = $this->Fillup->Vehicle->find('list', array(
	    	'conditions' => array(
	    		"Vehicle.user_id" => $this->Session->read('Auth.User.id')
	    	)
	    ));
	    $this->set('vehicles', $vehicles);	    
	    if($vehicles==null) {
	    	$this->Session->setFlash('You need to add a vehicle first');
	    	$this->redirect(array('controller'=>'vehicles','action'=>'add'));
	    }

			$locations = $this->Fillup->find('all', array(
			  'fields' => array('DISTINCT location'),
	    	'conditions' => array(
          'location <>' => '', 
	    		"Vehicle.user_id" => $this->Session->read('Auth.User.id'),
	    	),
	    	'order' => array('Fillup.created DESC'),
	    ));
	    $this->set('locations', $locations);	    

	    if(!empty($this->data)) {
	    
        if($this->Fillup->validates()) {

	        if($this->Fillup->save($this->data)) {
	            $this->Session->setFlash("Fill up saved!");
	            $this->redirect('/fillups');
	        }

	      }
	      
	    }
	 
	    $this->set('latest', $this->Fillup->find(
        'first', 
        array(
          'conditions' => array(
          'Fillup.user_id' => $this->Session->read('Auth.User.id')
         ),
         'order' => array(
           'Fillup.created DESC'
         )
        )
      ));

	}

	function edit($id='') {
	  // Save data
    if(!empty($this->data)) {
      if($this->Fillup->save($this->data)) {
          $this->Session->setFlash("Fillup saved!");
          $this->redirect('/fillups');
      }
    }
    // Lookup data
    if($id!='') {
      $this->data = $this->Fillup->findById($id);
    }
    
    // Get Vehicles
		$vehicles = $this->Fillup->Vehicle->find('list', array(
    	'conditions' => array(
    		"Vehicle.user_id" => $this->Session->read('Auth.User.id')
    	)
    ));
    $this->set('vehicles', $vehicles);	    

    // Get locations
		$locations = $this->Fillup->find('all', array(
		  'fields' => array('DISTINCT location'),
    	'conditions' => array(
        'location <>' => '', 
    		"Vehicle.user_id" => $this->Session->read('Auth.User.id'),
    	),
    	'order' => array('Fillup.created DESC'),
    ));
    $this->set('locations', $locations);	    

    // Get latest
    $this->set('latest', $this->Fillup->find(
      'first', 
      array(
        'conditions' => array(
        'Fillup.user_id' => $this->Session->read('Auth.User.id')
       ),
       'order' => array(
         'Fillup.created DESC'
       )
      )
    ));

	}

	function delete($id='') {
  	if($id!='') {
    	$this->Fillup->delete($id);
      $this->Session->setFlash("Fillup deleted!");
      $this->redirect('/fillups');
    	
  	}
	}
	
	function local_search($lat='', $long='', $radius=5000) {
	
		$google_api_key = 'AIzaSyBMISecHzJR_Mie1nlsQWpQkv-E6B7ZFno';
		$google_places_api = 'https://maps.googleapis.com/maps/api/place/search/json?key=' . $google_api_key . '&location=' . $lat . ',' . $long . '&radius=' . $radius . '&sensor=true&types=gas_station';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $google_places_api);
    // Set a referer
    curl_setopt($ch, CURLOPT_REFERER, "http://dev.petrolapp.me");
    // User agent
    curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
    // Include header in result? (0 = yes, 1 = no)
    curl_setopt($ch, CURLOPT_HEADER, 0);
    // Should cURL return or print out the data? (true = return, false = print)
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // Timeout in seconds
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    // Download the given URL, and return output
    $output = curl_exec($ch);
    // Close the cURL resource, and free system resources
    curl_close($ch);
    		
		// wrap the data as with the callback
		$callback = isset($_GET["callback"]) ? $_GET["callback"] : "alert";
		$this->set('callback', $output);
		
		$this->layout = 'empty';

	}
	
	function stats($view='ppl-monthly') {
  	
  	if($view=='total-monthly') {
    	$sql = 'SELECT
  	           MONTHNAME(created) month,
  	           YEAR(created) year,
    	         SUM(cost) spent
    	       FROM `fillups`
    	       GROUP BY
    	         MONTH(created), YEAR(created)';
    	
  	} elseif($view=='ppl-weekly') {
    	$sql = 'SELECT
  	           WEEK(created) week,
  	           YEAR(created) year,
  	           (cost/litres) ppl
  	         FROM `fillups`
  	         GROUP BY
  	           WEEK(created), YEAR(created)';

  	} elseif($view=='ppl-monthly') {
    	$sql = 'SELECT
  	           MONTHNAME(created) month,
  	           YEAR(created) year,
  	           (cost/litres) ppl
  	         FROM `fillups`
  	         GROUP BY
  	           MONTH(created), YEAR(created)';
  	}
  	
  	$this->set('view',$view);
  	$this->set('data',$this->Fillup->query($sql));
  	
	}
    

}
