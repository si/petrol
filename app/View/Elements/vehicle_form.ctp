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

	echo $this->Form->end('Save');
?>