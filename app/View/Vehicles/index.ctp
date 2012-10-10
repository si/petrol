
<div class="hero-unit">
  <h1>Your Vehicles</h1>

  <?php echo $this->Html->link('Add Vehicle', array('controller'=>'vehicles','action'=>'add'), array('class'=>'btn')); ?>
</div>




<?php if(isset($view)) : ?>
<table>
	<tr> 
		<th><?php echo $this->Paginator->sort('registration', 'Registration'); ?></th> 
		<th><?php echo $this->Paginator->sort('manufacturer', 'Manufacturer'); ?></th> 
		<th><?php echo $this->Paginator->sort('model', 'Model'); ?></th> 
		<th><?php echo $this->Paginator->sort('created', 'When'); ?></th> 
	</tr> 
	   <?php foreach($data as $vehicle): ?> 
	<tr> 
		<td><?php echo $this->Html->link($vehicle['Vehicle']['registration'], array('controller'=>'vehicles','action'=>'view',$vehicle['Vehicle']['id'])); ?> </td> 
		<td><?php echo $vehicle['Vehicle']['manufacturer']; ?> </td> 
		<td><?php echo $vehicle['Vehicle']['model']; ?> </td> 
		<td><?php echo $this->Time->niceShort($vehicle['Vehicle']['created']); ?> </td> 
	</tr> 
	<?php endforeach; ?> 
	
</table> 
<?php 
else: //  List view

  echo $this->element('vehicles_list',array('data'=>$data)); 
  
endif;
?>

<p><?php echo $this->Paginator->counter(); ?></p>

<p>
	<!-- Shows the next and previous links -->
	<?php echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled')); ?>
	<!-- Shows the page numbers -->
	<?php echo $this->Paginator->numbers(); ?>
	
	<?php echo $this->Paginator->next('Next »', null, null, array('class' => 'disabled')); ?> 
	<!-- prints X of Y, where X is current page and Y is number of pages -->
</p>