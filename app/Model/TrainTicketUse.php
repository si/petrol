<?php
class TrainTicketUse extends AppModel {
	var $name = 'TrainTicketUse';
	var $order = array('TrainTicketUse.departs DESC');

	var $belongsTo = array(
		'TrainTicket' => array(
			'className'    => 'TrainTicket',
			'foreignKey'   => 'train_ticket_id',
		),
	);

	var $virtualFields = array(
		'duration' => "TIMEDIFF(`arrives`,`departs`)"
	);
}