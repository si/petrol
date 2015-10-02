<?php echo $this->element('train_ticket_view'); ?>

<div class="input-group">
	<?php echo $this->Html->link('Edit', array('action'=>'form', $trainTicket['TrainTicket']['id']), array('class'=>'btn')); ?>
	<?php echo $this->Html->link('Back', array('action'=>'index'), array('class'=>'btn')); ?>
</div>