<?php 
$trainTicket = $this->requestAction(['controller' => 'train_tickets', 'action' => 'active'], ['return']);

if($trainTicket) {
	echo $trainTicket;
} else {
	echo 'No active train tickets. ' . $this->Html->link('Add one', array('controller'=>'train_tickets', 'action'=>'edit'));
}