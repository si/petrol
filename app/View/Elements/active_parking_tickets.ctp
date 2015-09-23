<?php 
$parkingTicket = $this->requestAction(['controller' => 'parking_tickets', 'action' => 'active'], ['return']);

if($parkingTicket) {
	echo $parkingTicket;
} else {
	echo 'No active parking tickets. ' . $this->Html->link('Go get one', array('controller'=>'parking_tickets', 'action'=>'edit'));
}