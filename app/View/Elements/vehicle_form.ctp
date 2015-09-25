<h1>Tell us about your baby!</h1>

<?php
echo $this->Session->flash();

echo $this->Form->create('Vehicle');
?>
<fieldset>
  <legend>Vehicle Details</legend>
	<div class="input-group">  
		<?php
			echo $this->Form->input('registration', array('class'=>'reg'));
		?>
	</div>
	<div class="input-group">  
		<?php
			echo $this->Form->input('manufacturer');
		?>
		<?php
			echo $this->Form->input('model');
		?>
	</div>
	<div class="input-group">  
		<?php
			echo $this->Form->input('fuel_type', array(
			 'options'=> array(
			   'U'=>'Unleaded',
			   'D'=>'Diesel',
			   'A'=>'Autogas',
			 ),
			 'div' => 'col-6'
			));
		?>
		<?php
			echo $this->Form->input('tank_capacity', array(
			 'type'=>'number',
			 'placeholder'=>'litres',
			 'div' => 'col-6'
			));
			if(isset($max_litres['Receipts']['litres'])) echo '<em>Your top fillup was ' . $max_litres['Fillup']['litres'] . '</em>';
		?>
	</div>
</fieldset>
<fieldset>
	<legend>Let's add a personal touch</legend>
	<div class="input-group">  
		<?php
			echo $this->Form->input('nickname');
		?>
		<?php
			echo $this->Form->input('avatar', array('type'=>'file'));
		?>
	</div>
	<div class="input-group">
		<?php
			echo $this->Form->input('status', array(
				'options'=> array(
					''=>'On the road',
					'O'=>'Off road',
					'R'=>'Rental',
					'S'=>'Sold',
				)
			));
		?>
	</div>
</fieldset>

<?php echo $this->Form->button('Save'); ?>
<?php echo $this->Html->link('Cancel', array('action' => (isset($this->data['Vehicle']['id']) ? 'view/'.$this->data['Vehicle']['id'] : 'index')), array('class'=>'btn')); ?>

<?php
echo $this->Form->input('user_id', array(
		'type' => 'hidden',
		'value' => $this->Session->read('Auth.User.id'),
	));

if(isset($this->data['Vehicle']['id']))	echo $this->Form->input('id', array('type' => 'hidden'));

echo $this->Form->end();
?>
