<h1>Your Garage</h1>

<?php echo $this->Html->link('Add Vehicle', array('controller'=>'vehicles','action'=>'add'), array('class'=>'btn')); ?>

<?php 
  echo $this->element('vehicles_list',array('data'=>$data)); 
?>
