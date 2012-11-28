<h1>Tell us about your baby!</h1>

<?php
echo $this->Session->flash();

	echo $this->Form->create('Vehicle');
?>
<fieldset>
  <legend>Vehicle Details</legend>

		<?php
			echo $this->Form->input('registration');
		?>	

		<?php
			echo $this->Form->input('manufacturer');
		?>	

		<?php
			echo $this->Form->input('model');
		?>	

		<?php
			echo $this->Form->input('fuel_type', array(
			 'options'=> array(
			   'U'=>'Unleaded',
			   'D'=>'Diesel',
			   'A'=>'Autogas',
			 )
			));
		?>	

		<?php
			echo $this->Form->input('tank_capacity', array(
			 'type'=>'number',
			 'placeholder'=>'litres',
			));
			if(isset($max_litres['Fillup']['litres'])) echo '<em>Your top fillup was ' . $max_litres['Fillup']['litres'] . '</em>';
		?>	

		<?php
			echo $this->Form->input('status', array(
			 'options'=> array(
			   ''=>'On the road',
			   'R'=>'Rental',
			   'S'=>'SORN',
			 )
			));
		?>	

</fieldset>


<?php

		echo $this->Form->input('user_id', array(
				'type' => 'hidden',
				'value' => $this->Session->read('Auth.User.id'),
			));

		if(isset($this->Vehicle->data['Vehicle']['id'])) :
  		echo $this->Form->input('id', array('type' => 'hidden'));
		endif;

	echo $this->Form->end('Save');
?>