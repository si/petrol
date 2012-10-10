
<!-- File: reports/edit.ctp -->
	
<h1>Edit Report</h1>
<?php
	echo $this->Form->create('Report', array('action' => 'edit'));
	echo $this->Form->input('reg_plate');
	echo $this->Form->input('location');
	echo $this->Form->input('tags');
	echo $this->Form->input('created');
  echo $this->Form->input('id', array('type'=>'hidden')); 
	echo $this->Form->end('Save Report');
?>
