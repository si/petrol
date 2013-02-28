<div class="row">
<?php
echo $this->Form->create('Fillup');

  if(isset($this->data['Fillup']['id'])) echo $this->Form->input('id', array('type' => 'hidden'));
?>
<fieldset class="span4">
  <legend>Garage</legend>
  <div>
		<?php
			echo $this->Form->input('cost', array(
        'label' => 'Amount Spent',
        'placeholder' => '£',
        'div' => 'span4',
        'class' => 'input-mini',
			));
		?>	
		<?php
			echo $this->Form->input('litres', array(
        'label' => 'Litres',
        'div' => 'span4',
        'class' => 'input-mini',
			));
		?>	
		<?php
			echo $this->Form->input('price_per_litre', array(
        'label' => '£ per Litre',
        'div' => 'span4',
        'class' => 'input-mini',
			));
		?>	
    </div>

		<?php
			echo $this->Form->input('discount', array(
        'label' => 'Discount (coupons)',
        'placeholder'=> '£',
			));
		?>	

		<?php
			echo $this->Form->input('location', array(
				'label' => 'Petrol Station',
				'type' => 'text',
				'placeholder' => 'eg. BP Corporation Street, Rugby',
				'list'=>'location_history'
			));
			
			if(isset($locations) && count($locations)>0) : 
			?>
			<datalist id="location_history">
			<?php foreach($locations as $location) : ?>
			 <option value="<?php echo $location['Fillup']['location']; ?>">
  		<?php endforeach; ?>
			 </datalist>
  		<?php
  		endif;
  		
  		/***
  		Try integrating Chris Coyier's Relevant Dropdown polyfill (https://github.com/chriscoyier/Relevant-Dropdowns)
  		***/
		?>	
			<p id="status"></p>
			<p><span id="latitude"></span> <span id="longitude"></span> <span id="accuracy"></span></p>

		<div id="placeholder" style="margin: 20px 0px 10px; width: 100%; height: 100%; position: relative;">
			<i>Note: May take a few seconds to get the location.</i>
		</div>		
</fieldset>
<fieldset class="span4">
  <legend>Vehicle</legend>

		<?php
		if(count($vehicles)>1) :
			echo $this->Form->input('vehicle_id', array(
				'label' => 'Vehicle',
				'options' => $vehicles,
			));
		else: 
			echo $this->Form->input('vehicle_id', array(
        'type' => 'hidden',
				'value' => current($vehicles),
			));		  
		endif;
		?>	
		<?php
			echo $this->Form->input('odometer', array(
				'label' => 'Current Mileage' . (($latest!=null) ? ' (previously <strong class="odometer">' . $latest['Fillup']['odometer'] . '</strong> <- Needs to be dynamic based on selected vehicle)' : ''),
				'size' => 6,
				'maxlength' => 7,
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
				'data-highlight' => 'true',
			));

/*
    <script>
    $(function() {
    	var select = $( "#FillupIndicator" );
    	var slider = $( "<div id='slider'></div>" ).insertAfter( select ).slider({
    		min: 0,
    		max: 8,
    		range: "min",
    		value: select[ 0 ].selectedIndex + 1,
    		slide: function( event, ui ) {
    			select[ 0 ].selectedIndex = ui.value - 1;
    		}
    	});
    	$( "#FillupIndicator" ).change(function() {
    		slider.slider( "value", this.selectedIndex + 1 );
    	});
    });
    </script>
*/
		?>	
</fieldset>

<fieldset class="span4">
  <legend>Optional</legend>
		<?php
			echo $this->Form->input('created', array(
				'label' => 'When',
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

<?
	echo $this->Form->end('Save');
?>
</div>