<h1>Your Garage</h1>

<?php if(count($data)==0) : ?>
<p>You must have some wheels if you're here. Let's add it to your garage</p>
<?php endif; ?>

<?php echo $this->Html->link('Add Vehicle', array('controller'=>'vehicles','action'=>'add'), array('class'=>'btn')); ?>

<?php 
  echo $this->element('vehicles_list',array('data'=>$data)); 
?>
