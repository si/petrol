<div class="hero-unit">
  <h1><?php echo $vehicle['Vehicle']['registration']; ?></h1>
  <h2><?php echo $vehicle['Vehicle']['manufacturer'] . ' ' . $vehicle['Vehicle']['model']; ?></h2>
</div>

<h2>Recent Fillups</h2>
<?php
  echo $this->element('receipts_list', array('data'=>$vehicle['Receipt']));
?>

    <?php echo $this->Html->link('Edit Vehicle',array('action'=>'edit',$vehicle['Vehicle']['id']),array('class'=>'btn btn-mini')); ?>
    <?php echo $this->Html->link('Delete Vehicle',array('action'=>'delete',$vehicle['Vehicle']['id']),array('class'=>'btn btn-mini'),'Are you sure you want to delete this vehicle?'); ?>
