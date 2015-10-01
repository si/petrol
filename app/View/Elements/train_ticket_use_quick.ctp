<?php echo $this->Form->create('TrainTicketUse', array('action'=>'add', 'class'=>'quick'));

	echo $this->Form->input('context', array(
		'type' => 'hidden',
		'value' => 'quick'
	));

	if(isset($this->data['TrainTicketUse']['id'])) echo $this->Form->input('id', array('type' => 'hidden'));

	echo $this->Form->input('train_ticket_id', array(
		'type' => 'hidden',
		'value' => ((isset($trainTicket['TrainTicket']['id'])) ? $trainTicket['TrainTicket']['id'] : ''),
	));
?>
<fieldset>
<div class="input-group">
	<?php
		echo $this->Form->input('departs.time', array(
			'type' => 'text',
	        'label' => '',
	        'placeholder' => 'HH:MI',
	        'div' => 'col-3',
	    ));
	?>
	<?php
		echo $this->Form->input('platform', array(
	        'label' => '',
	        'div' => 'col-3',
	        'placeholder' => 'Platform'
	    ));
	?>
	<?php
		echo $this->Form->input('delay', array(
	        'label' => '',
	        'div' => 'col-3',
	        'placeholder' => 'Delay'
	    ));
	?>
	<?php echo $this->Form->button('Save'); ?>
</div>
</fieldset>
<?php echo $this->Form->end(); ?>