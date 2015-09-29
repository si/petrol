<h1>Ticket Use</h1>
<?php echo $this->Form->create('ParkingTicketUse'); 

  if(isset($this->data['ParkingTicketUse']['id'])) echo $this->Form->input('id', array('type' => 'hidden'));
?>
<div class="input-group">
    <?php
		echo $this->Form->input('parking_ticket_id', array(
			'label' => 'Parking Ticket',
			'div' => 'col-12'
		));
    ?>
</div>

<fieldset>
	<legend>Optional</legend>
	<div class="input-group">
		<?php
			echo $this->Form->input('starts', array(
		        'label' => 'Starts',
		        'separator' => '',
		        'empty' => '-',
		        'div' => 'col-6',
		        'maxYear' => date('Y'),
		    ));
		?>
		<?php
			echo $this->Form->input('ends', array(
		        'label' => 'Ends',
		        'separator' => '',
		        'empty' => '-',
		        'div' => 'col-6',
		        'maxYear' => date('Y'),
		    ));
		?>
	</div>

</fieldset>
<div class="input-group">
	<?php echo $this->Form->button('Save'); ?>
	<?php echo $this->Html->link('Cancel', (isset($this->data['ParkingTicketUse']['parking_ticket_id'])) ? array('controller'=>'parking_tickets', 'action'=>'view', $this->data['ParkingTicketUse']['parking_ticket_id']) : array('action'=>'index'), array('class'=>'btn')); ?>
</div>
<?php echo $this->Form->end(); ?>