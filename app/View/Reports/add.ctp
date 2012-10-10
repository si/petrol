<!-- File: reports/add.ctp -->	
	
<h1>Report Reckless Driving</h1>
<?php
echo $this->Form->create('Report');
?>
<fieldset>
<?
echo $this->Form->input('reg_plate', array('label'=>'Vehicle Registration','placeholder'=>'AA12 AAA'));
echo $this->Form->input('vehicle_details', array('label'=>'Vehicle Details'));
echo $this->Form->input('location', array('label'=>'Where?','placeholder'=>'Postcode, street name, area'));
echo $this->Form->input('tags', array('label'=>'Reasons (comma separated)'));
echo $this->Form->input('when', array('label'=>'When'));
echo $this->Form->submit('Report');
?>
</fieldset>
<?php
echo $this->Form->end();
?>