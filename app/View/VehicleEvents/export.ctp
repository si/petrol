<?php
$name = 'Vehicle Diary';
switch($format) {

  case 'json':

    header('Content-Disposition: attachment; filename="'.str_replace(' ','-',$name).'.json"');
    
    echo json_encode($vehicleEvents);
    break;
  
  default:  // ICS
  
    header('Content-Type: text/calendar');
    header('Content-Disposition: attachment; filename="'.str_replace(' ','-',$name).'.ics"');

    foreach($vehicleEvents as $event) : 

      echo $this->element('/ics/event', array(
        'uid' => $name . $event['VehicleEvent']['id'],
        'summary' => $event['VehicleEventType']['name'] . ' for ' . $event['Vehicle']['registration'],
        'location' => $event['VehicleEvent']['provider'],
        'start' => $event['VehicleEvent']['date'],
        'end' => $event['VehicleEvent']['date'],
        'description' => (
          'Provider: ' . $event['VehicleEvent']['provider'] . "\r\n" . 
          'Reference: ' . $event['VehicleEvent']['provider_reference'] . "\r\n" . 
          'Telephone: ' . $event['VehicleEvent']['provider_telephone'] . "\r\n"
        ),
        'reminder_value' => $reminder_value,
        'reminder_unit' => $reminder_unit
      ));

    endforeach; 
    ?>
<?php
  break;  // end ICS format
} // end foramt switch