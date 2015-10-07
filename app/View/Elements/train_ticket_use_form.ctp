<h1>Ticket Use</h1>
<?php echo $this->Form->create('TrainTicketUse'); 

  if(isset($this->data['TrainTicketUse']['id'])) echo $this->Form->input('id', array('type' => 'hidden'));
?>
<div class="input-group">
    <?php
		echo $this->Form->input('train_ticket_id', array(
			'label' => 'Train Ticket',
			'div' => 'col-12'
		));
    ?>
</div>

<fieldset>
	<legend>Times</legend>
	<div class="input-group">
		<?php
			echo $this->Form->input('departs', array(
		        'label' => 'Departs',
		        'separator' => '',
		        'empty' => '-',
		        'div' => 'col-6',
		        'maxYear' => date('Y'),
		    ));
		?>
		<?php
			$arrives = '';
			if( isset($this->data['TrainTicketUse']['departs']) && $this->data['TrainTicketUse']['arrives'] == '' ) {
				$arrives = $this->data['TrainTicketUse']['departs'];
			}
			echo $this->Form->input('arrives', array(
		        'label' => 'Arrives',
		        'separator' => '',
		        'empty' => '-',
		        'div' => 'col-6',
		        'maxYear' => date('Y'),
		        'selected' => $arrives
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