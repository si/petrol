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
				'type' => 'number',
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
		    <div class="input-group col-md-12">
		    	<label for="ReceiptVehicleId">Vehicle</label>
		    	<select id="ReceiptVehicleId" name="ReceiptVehicleId" class="form-control">
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
		<?php
		else:
			echo $this->Form->input('vehicle_id', array(
        		'type' => 'hidden',
				'value' => current($vehicles),
			));
		endif;
		?>
    <div class="vehicle">
		<?php
			echo $this->Form->input('odometer', array(
				'label' => 'Current Mileage',
        'placeholder'=> (($latest!=null) ? 'Previously ' . $latest['Receipt']['odometer'] : ''),
        'size' => 6,
        'min' => (($latest!=null && isset($this->data['Receipt']['id']) && $this->data['Receipt']['id']=='') ? $latest['Receipt']['odometer'] : ''),
        'maxlength' => 7,
				'div'=>'input-group col-md-6',
        'class' => 'form-control',
			));
		?>
 		<?php
			echo $this->Form->input('indicator', array(
				'label' => 'Tank Level',
/*
				'options' => array(
				  '0' => 'Empty',
				  '1' => '1/8',
				  '2' => '1/4',
				  '3' => '3/8',
				  '4' => '1/2',
				  '5' => '5/8',
				  '6' => '3/4',
				  '7' => '7/8',
				  '8' => 'Full',
				),
*/
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
				'div'=>'input-group col-md-n6',
        'class' => 'form-control',
      ));

/*
    <script>
    $(function() {
    	var select = $( "#ReceiptIndicator" );
    	var slider = $( "<div id='slider'></div>" ).insertAfter( select ).slider({
    		min: 0,
    		max: 8,
    		range: "min",
    		value: select[ 0 ].selectedIndex + 1,
    		slide: function( event, ui ) {
    			select[ 0 ].selectedIndex = ui.value - 1;
    		}
    	});
    	$( "#ReceiptIndicator" ).change(function() {
    		slider.slider( "value", this.selectedIndex + 1 );
    	});
    });
    </script>
*/
		?>

		<?php
			echo $this->Form->input('created', array(
				'label' => 'When',
        'class' => 'form-control',
      ));
		?>
</fieldset>
<?php

// var_dump($this->Session);
		echo $this->Form->input('user_id', array(
				'type' => 'hidden',
				'value' => $this->Session->read('Auth.User.id'),
			));
?>
</div>


	<?php echo $this->Form->button('Save',array('class'=>'btn btn-large')); ?>
	<?php echo $this->Html->link('Cancel',array('action'=>'index'),array('class'=>'btn')); ?>

<?
	echo $this->Form->end();
?>
