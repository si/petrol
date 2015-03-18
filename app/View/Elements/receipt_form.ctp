<?php
echo $this->Form->create('Receipt', array());

  if(isset($this->data['Receipt']['id'])) echo $this->Form->input('id', array('type' => 'hidden'));
?>
<fieldset>
	<legend>Garage</legend>
	<div class="input-group">
		<?php
			echo $this->Form->input('cost', array(
				'type' => 'number',
		        'label' => 'Cost',
		        'placeholder' => '£',
		        'div' => 'col-4',
			));
		?>
		<?php
			echo $this->Form->input('litres', array(
				'type' => 'number',
		        'label' => 'Capacity',
		        'placeholder' => 'litres',
		        'div' => 'col-4',
			));
		?>
		<?php
			echo $this->Form->input('price_per_litre', array(
				'type' => 'text',
				'label' => 'Price',
				'placeholder' => '£/litre',
				'div' => 'col-4',
			));
		?>
	</div>

    <div class="input-group">
		<?php
			echo $this->Form->input('location', array(
				'label' => 'Petrol Station',
				'type' => 'text',
				'placeholder' => 'eg. BP Corporation Street, Rugby',
				'list'=>'location_history',
		        'div' => 'col-8',
			));

			if(isset($locations) && count($locations)>0) :
			?>
			<datalist id="location_history">
			<?php foreach($locations as $location) : ?>
			 <option value="<?php echo $location['Receipt']['location']; ?>">
  		<?php endforeach; ?>
			 </datalist>
  		<?php
  		endif;

  		/***
  		Try integrating Chris Coyier's Relevant Dropdown polyfill (https://github.com/chriscoyier/Relevant-Dropdowns)


		<p id="status"></p>
		<p><span id="latitude"></span> <span id="longitude"></span> <span id="accuracy"></span></p>
		<div id="placeholder" style="margin: 20px 0px 10px; width: 100%; height: 100%; position: relative;"></div>
  		***/
		?>
	</div>

</fieldset>
<fieldset>
	<legend>Vehicle</legend>
	<?php
	if(count($vehicles)>1) :
	?>
	<div class="input-group">
	    <div class="col-12">
	    	<label for="ReceiptVehicleId">Vehicle</label>
	    	<select id="ReceiptVehicleId" name="data[Receipt][vehicle_id]" class="">
	    	<?php 
	    	foreach($vehicles as $vehicle) : 
	    		echo '<option value="' . $vehicle['Vehicle']['id'] . '"'
	    			. 'data-registration="' . $vehicle['Vehicle']['registration'] . '"'
	    			. ( ( count($vehicle['Receipt'])>0 ) ? 'data-odometer="' . $vehicle['Receipt'][0]['odometer'] . '"' : '')
	    			. ( ( isset($this->data['Receipt']) && $this->data['Receipt']['vehicle_id'] == $vehicle['Vehicle']['id'] ) ? 'selected="selected"' : '' )
	    			. '>' 
	    			. $vehicle['Vehicle']['name'] 
	    			. '</option>';
	    	endforeach;
	    	?>
	    	</select>
	    </div>
	</div>
	<?php
	else:
		echo $this->Form->input('vehicle_id', array(
			'type' => 'hidden',
			'value' => current($vehicles),
		));
	endif;
	?>
	<div class="input-group">
		<?php
		echo $this->Form->input('indicator', array(
			'label' => 'Tank Level',
			'options' => array(
				'0' => 'Empty',
				'0.125' => '1/8',
				'0.25' => '1/4',
				'0.375' => '3/8',
				'0.5' => '1/2',
				'0.625' => '5/8',
				'0.75' => '3/4',
				'0.875' => '7/8',
				'1' => 'Full',
			),
			'type' => 'range',
			'min' => '0',
			'max' => '1',
			'step' => '0.125',
			'default' => 0,
			'data-highlight' => 'true',
			'div'=>'col-6',
		));
		?>
		<?php
			echo $this->Form->input('odometer', array(
				'label' => 'Mileage',
				'placeholder'=> (($latest!=null) ? 'Previously ' . $latest['Receipt']['odometer'] : ''),
				'size' => 6,
				'min' => (($latest!=null && isset($this->data['Receipt']['id']) && $this->data['Receipt']['id']=='') ? $latest['Receipt']['odometer'] : ''),
				'maxlength' => 7,
				'div'=>'col-6',
			));
		?>
	</div>
	<div class="input-group">
	<?php
		echo $this->Form->input('Receipt.created.hour', array(
		    'type' => 'number',
		    'name' => 'data[Receipt][created][hour]',
			'div' => 'col-3',
			'label' => 'Time',
			'placeholder' => 'HH'
		));
		echo $this->Form->input('Receipt.created.minute', array(
		    'type' => 'number',
		    'name' => 'data[Receipt][created][minute]',
			'div' => 'col-3 no-label',
			'label' => '',
			'placeholder' => 'MI'
		));
		echo $this->Form->input('Receipt.created.day', array(
		    'type' => 'number',
		    'name' => 'data[Receipt][created][day]',
			'div' => 'col-3',
			'label' => 'Date',
			'placeholder' => 'DD'
		));
		echo $this->Form->input('Receipt.created.month', array(
		    'type' => 'number',
		    'name' => 'data[Receipt][created][month]',
			'div' => 'col-3 no-label',
			'label' => '',
			'placeholder' => 'MM'
		));
	?>
	</div>
</fieldset>
<?php
echo $this->Form->input('user_id', array(
	'type' => 'hidden',
	'value' => $this->Session->read('Auth.User.id'),
));
?>
<div class="input-group">
	<?php echo $this->Form->button('Save',array('class'=>'btn')); ?>
	<?php echo $this->Html->link('Cancel',array('action'=>'index'),array('class'=>'btn')); ?>
</div>

<?php
echo $this->Form->end();
?>
