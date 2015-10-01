<div class="input-group">
	<?php
	if(!isset($timer) || !$timer) {
		echo $this->Html->link('Quick Start',
			array('controller'=>'train_ticket_uses', 'action'=>'add', 'train_ticket_id'=>$trainTicket['TrainTicket']['id'], 'departs'=>'now'),
			array('class'=>'btn i-timer')
		);
	} else {
		echo $this->Html->link('Quick End',
			array('controller'=>'train_ticket_uses', 'action'=>'add', 'train_ticket_id'=>$trainTicket['TrainTicket']['id'], 'arrives'=>'now'),
			array('class'=>'btn i-timer')
		);
	}

	echo $this->Html->link('Add Use',
		array('controller'=>'train_ticket_uses', 'action'=>'add', 'train_ticket_id'=>$trainTicket['TrainTicket']['id']),
		array('class'=>'btn i-add')
	); ?>
</div>