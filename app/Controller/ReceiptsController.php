<?php
class ReceiptsController extends AppController {

	var $scaffold;
	var $helpers = array('Html','Time','Number','Paginator');
	
	var $paginate = array(
		'limit' => 10,
		'order' => array(
			'Receipt.created' => 'desc',
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
  	 "Receipt.user_id" => $this->Session->read('Auth.User.id')
    );

    // Conditional Vehicle filter
  	if(isset($this->params['named']['vehicle'])) {
  	  $conditions['vehicle_id'] =  $this->params['named']['vehicle'];
  	  $this->set('vehicle', $this->Receipt->Vehicle->findById($this->params['named']['vehicle']));
    }

    // Conditional Location filter
  	if(isset($this->params['named']['location'])) {
  	  $conditions['location'] =  $this->params['named']['location'];
  	  $this->set('location', $this->params['named']['location']);
    }
  
	  $data = $this->paginate('Receipt',$conditions);
	  $this->set('data', $data);
	  
	  $totals = $this->Receipt->find('all', array(
      'fields'=> array(
        'SUM(cost) AS spent',
        'SUM(litres) AS litres',
        'MAX(odometer) - MIN(odometer) AS miles',
        'COUNT(*) AS entries',
        'COUNT(DISTINCT location) AS stations',
      ),
      'conditions' => $conditions,
    ));
	  $this->set('totals',$totals);
	  
	  $vehicles = $this->Receipt->Vehicle->find('list', array('conditions'=>array('user_id'=>$this->Session->read('Auth.User.id'))));
	  $this->set('vehicles',$vehicles);
	  
  }
  
	function add() {
	
			$vehicles = $this->Receipt->Vehicle->find('all', array(
	    	'conditions' => array(
	    		"Vehicle.user_id" => $this->Session->read('Auth.User.id')
	    	)
	    ));
	    $this->set('vehicles', $vehicles);

	    if($vehicles==null) {
	    	$this->Session->setFlash('You need to add a vehicle first');
	    	$this->redirect(array('controller'=>'vehicles','action'=>'add'));
	    }

			$locations = $this->Receipt->find('all', array(
			  'fields' => array('DISTINCT location'),
	    	'conditions' => array(
          'location <>' => '', 
	    		"Vehicle.user_id" => $this->Session->read('Auth.User.id'),
	    	),
	    	'order' => array('Receipt.created DESC'),
	    ));
	    $this->set('locations', $locations);	    

	    if(!empty($this->data)) {
	    
        if($this->Receipt->validates()) {

	        if($this->Receipt->save($this->data)) {
	        
	        
            $data = $this->Receipt->findById($this->Receipt->id);
            
            /* Send email - disabled until debugged on new server
						$Email = new CakeEmail('smtp');
						$Email->template('receipt');
						$Email->from(array('receipts@petrolapp.me' => 'Petrol app'));
						$Email->to($this->Session->read('Auth.User.email'));
						$Email->subject('[Petrol] Your Receipt #' . $data['Receipt']['id']);
						$Email->emailFormat('html');
						$Email->helpers(array('Html', 'Number', 'Time'));
						$Email->viewVars(array('data'=>$data));
						$Email->send();
	    */
	        
            $this->Session->setFlash("Receipt saved!");
            $this->redirect('/receipts');
	        }

	      }
	      
	    }
	 
	    $this->set('latest', $this->Receipt->find(
        'first', 
        array(
          'conditions' => array(
          'Receipt.user_id' => $this->Session->read('Auth.User.id')
         ),
         'order' => array(
           'Receipt.created DESC'
         )
        )
      ));

	}

	function edit($id='') {
	  // Save data
    if(!empty($this->data)) {
      if($this->Receipt->save($this->data)) {
          $this->Session->setFlash("Receipt saved!");
          $this->redirect('/receipts');
      }
    }
    // Lookup data
    if($id!='') {
      $this->data = $this->Receipt->findById($id);
    }
    
    // Get Vehicles
		$vehicles = $this->Receipt->Vehicle->find('list', array(
    	'conditions' => array(
    		"Vehicle.user_id" => $this->Session->read('Auth.User.id')
    	)
    ));
    $this->set('vehicles', $vehicles);	    

    // Get locations
		$locations = $this->Receipt->find('all', array(
		  'fields' => array('DISTINCT location'),
    	'conditions' => array(
        'location <>' => '', 
    		"Vehicle.user_id" => $this->Session->read('Auth.User.id'),
    	),
    	'order' => array('Receipt.created DESC'),
    ));
    $this->set('locations', $locations);	    

    // Get latest
    $this->set('latest', $this->Receipt->find(
      'first', 
      array(
        'conditions' => array(
        'Receipt.user_id' => $this->Session->read('Auth.User.id')
       ),
       'order' => array(
         'Receipt.created DESC'
       )
      )
    ));

	}

	function delete($id='') {
  	if($id!='') {
    	$this->Receipt->delete($id);
      $this->Session->setFlash("Receipt deleted!");
      $this->redirect('/Receipts');
    	
  	}
	}
	
	function local_search($lat='', $long='', $radius=5000) {
	
	  /* 
	  Google Places Search
	  */
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
		
		/*
		Foursquare Search
		https://developer.foursquare.com/docs/venues/search
		*/
		$foursquare_api = 'https://api.foursquare.com/v2/venues/search?ll=' . $lat . ',' . $long . '&query=petrol&oauth_token=IAHNDBYKKRTR1M5XJZC15CD1AM52I2SKGWSTGQCWEWDS1VVQ&v=20121213';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $foursquare_api);
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
    $foursquare_data = curl_exec($ch);
    // Close the cURL resource, and free system resources
    curl_close($ch);
		$this->set('foursquare', $foursquare_data);
		
		$this->layout = 'empty';

	}
	
	function stats($view='ppl-monthly') {
  	
  	if($view=='total-monthly') {
    	$sql = 'SELECT
  	           MONTHNAME(created) month,
  	           YEAR(created) year,
    	         SUM(cost) spent
    	       FROM `Receipts`
    	       GROUP BY
    	         MONTH(created), YEAR(created)';
    	
  	} elseif($view=='ppl-weekly') {
    	$sql = 'SELECT
  	           WEEK(created) week,
  	           YEAR(created) year,
  	           (cost/litres) ppl
  	         FROM `Receipts`
  	         GROUP BY
  	           WEEK(created), YEAR(created)';

  	} elseif($view=='ppl-monthly') {
    	$sql = 'SELECT
  	           MONTHNAME(created) month,
  	           YEAR(created) year,
  	           (cost/litres) ppl
  	         FROM `Receipts`
  	         GROUP BY
  	           MONTH(created), YEAR(created)';
  	}
  	
  	$this->set('view',$view);
  	$this->set('data',$this->Receipt->query($sql));
  	
	}
    

}
