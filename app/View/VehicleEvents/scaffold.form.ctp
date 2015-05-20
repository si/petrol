<?php echo $this->Form->create('VehicleEvent'); 

  if(isset($this->data['VehicleEvent']['id'])) echo $this->Form->input('id', array('type' => 'hidden'));
?>
<div class="input-group radio-group">
    <?php
		echo $this->Form->input('vehicle_event_type_id', array(
			'div' => 'col-12',
			'legend' => false,
			'type' => 'radio',
			'class' => 'radio',
			'data-label' => 'TBC'
		));
    ?>
</div>

<fieldset>
	<legend>Details</legend>
	<div class="input-group">
		<?php
			echo $this->Form->input('vehicle_id', array(
		        'label' => 'Vehicle',
		        'div' => 'col-12'
		    ));
		?>
	</div>

	<div>
		<?php
			echo $this->Form->input('date', array(
		        'label' => 'When',
		        'type' => 'date',
		        'div' => 'input-group',
		        'class' => 'col-4',
		        'separator' => ''
		    ));
		?>
	</div>

	<div class="input-group">
		<?php
			echo $this->Form->input('provider', array(
		        'label' => 'Provider',
		        'div' => 'col-12'
		    ));
		?>
	</div>
	<div class="input-group">
	    <?php
			echo $this->Form->input('provider_reference', array(
				'div' => 'col-6',
				'label' => 'Reference',
			));
	    ?>
	    <?php
			echo $this->Form->input('provider_telephone', array(
				'div' => 'col-6',
				'label' => 'Telephone',
				'type' => 'tel'
			));
	    ?>
	</div>

</fieldset>

<?php echo $this->Form->button('Save'); ?>
<?php echo $this->Html->link('Cancel',array('action'=>'index'),array('class'=>'btn')); ?>

<?php echo $this->Form->end(); ?>