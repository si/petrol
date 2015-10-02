<h1>Ticket Use</h1>
<?php echo $this->Form->create('TrainTicketUse'); 

  if(isset($this->data['TrainTicketUse']['id'])) echo $this->Form->input('id', array('type' => 'hidden'));
?>
<fieldset>
<div class="input-group">
    <?php
		echo $this->Form->input('train_ticket_id', array(
			'label' => 'Train Ticket',
			'div' => 'col-12'
		));
    ?>
</div>
</fieldset>

<fieldset>
	<legend>Times</legend>
	<div class="input-group">
		<?php
			echo $this->Form->input('departs_date', array(
		        'label' => 'Date',
		        'type' => 'text',
		        'div' => 'col-6',
		        'value' => date('d/m/Y', strtotime($this->data['TrainTicketUse']['departs']))
		    ));
			echo $this->Form->input('departs_time', array(
		        'label' => 'Departs',
		        'type' => 'text',
		        'div' => 'col-3',
		        'placeholder' => 'HH:MI',
		        'value' => date('H:i', strtotime($this->data['TrainTicketUse']['departs']))
		    ));
		?>
		<?php
			echo $this->Form->input('arrives', array(
		        'label' => 'Arrives',
		        'type' => 'text',
		        'div' => 'col-3',
		        'placeholder' => 'HH:MI',
		        'value' => $this->data['TrainTicketUse']['arrives'] != '' ? date('H:i', strtotime($this->data['TrainTicketUse']['arrives'])) : ''
		    ));
		?>
	</div>
</fieldset>

<fieldset>
	<legend>Extra</legend>
	<div class="input-group">
		<?php
			echo $this->Form->input('platform', array(
		        'label' => 'Platform',
		        'div' => 'col-6',
		    ));
		?>
		<?php
			echo $this->Form->input('delay', array(
		        'label' => 'Delay',
		        'div' => 'col-6',
		    ));
		?>
	</div>
</fieldset>

<div class="input-group">
	<?php echo $this->Form->button('Save'); ?>
	<?php echo $this->Html->link('Cancel', (isset($this->data['TrainTicketUse']['train_ticket_id'])) ? array('controller'=>'train_tickets', 'action'=>'view', $this->data['TrainTicketUse']['train_ticket_id']) : array('action'=>'index'), array('class'=>'btn')); ?>
</div>
<?php echo $this->Form->end(); ?>