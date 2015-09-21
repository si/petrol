<?php 
$parkingTicket = $this->requestAction('/parking_tickets/active');
var_dump($parkingTicket);

if($parkingTicket) {
	echo $this->element('parking_ticket_view'); 	
} else {
	echo 'No active parking tickets. ' . $this->Html->link('Go get one', array('controller'=>'parking_tickets', 'action'=>'edit'));
}