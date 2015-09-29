<?php
class TrainTicket extends AppModel {
	var $name = 'TrainTicket';
	var $order = array('TrainTicket.created DESC');

	var $belongsTo = array(
		'User',
		'TrainTicketClass',
		'TrainTicketRestriction',
		'TrainTicketType',
		'TrainStation' => array(
			'className'    => 'TrainStation',
			'foreignKey'   => 'origin_id',
		),
		'OriginId' => array(
			'className'    => 'TrainStation',
			'foreignKey'   => 'origin_id',
		),
		'DestinationId' => array(
			'className'    => 'TrainStation',
			'foreignKey'   => 'destination_id',
		),
	);

  var $hasMany = array(
   'TrainTicketUse' => array(
   	'foreignKey' => 'train_ticket_id',
   	'order' => array('TrainTicketUse.departs DESC')
   ),
  );

  var $validation = array(
    'price' => array(
      'required' => array(
        'rule' => 'required',
        'message' => 'Required'
      ),
      'value' => array(
        'rule' => 'empty',
        'message' => 'Required',
      ),
      'currency' => array(
        'rule' => array('money', 'left'),
        'message' => 'In pounds please',
      ),
    ),
  );

}
