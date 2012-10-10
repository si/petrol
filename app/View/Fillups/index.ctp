
<div class="hero-unit">
  <h1>Your Fill Ups</h1>
  <h2>You've already spent <?php echo $this->Number->currency($totals[0][0]['spent'],'GBP'); ?> this year</h2>
  <?php echo $this->Html->link('Add Fillup', array('controller'=>'fillups','action'=>'add'), array('class'=>'btn btn-primary btn-large')); ?>
</div>
<?php // var_dump($data); 
  
if(isset($view) && $view=='table') : 
?>

<table class="table  table-striped">
  <thead>
	<tr> 
		<th><?php echo $this->Paginator->sort('created', 'When'); ?></th> 
		<th><?php echo $this->Paginator->sort('cost', 'Price'); ?></th> 
		<th><?php echo $this->Paginator->sort('litres', 'Litres'); ?></th> 
		<th><?php echo $this->Paginator->sort('price_per_litre', 'Price per Litre'); ?></th> 
		<th><?php echo $this->Paginator->sort('location', 'Location'); ?></th> 
		<th><?php echo $this->Paginator->sort('vehicle_id', 'Vehicle'); ?></th> 
		<th><?php echo $this->Paginator->sort('odometer', 'Mileage'); ?></th> 
		<th>Options</th>
	</tr> 
	</thead>
	<tbody>
  <?php foreach($data as $fillup): ?> 
	<tr> 
		<td><?php echo $this->Html->link($fillup['Fillup']['odometer'], array('controller'=>'fillups','action'=>'edit',$fillup['Fillup']['id'])); ?> </td> 
		<td><?php echo $this->Number->currency($fillup['Fillup']['cost'],'GBP'); ?> </td> 
		<td><?php echo $this->Number->precision($fillup['Fillup']['litres'],2); ?> </td> 
		<td><?php echo $this->Number->currency($fillup['Fillup']['price_per_litre'],'GBP',array('places'=>3)); ?> </td> 
		<td><?php echo $fillup['Fillup']['location']; ?> </td> 
		<td><?php echo $this->Html->link($fillup['Vehicle']['name'], array('controller'=>'vehicles','action'=>'view',$fillup['Fillup']['vehicle_id'])); ?> </td> 
		<td><?php echo $fillup['Fillup']['odometer']; ?> </td> 
		<td>
		  <?php echo $this->Html->link('Edit', array('controller'=>'fillups','action'=>'edit',$fillup['Fillup']['id'])); ?>
		  <?php echo $this->Html->link('Delete', array('controller'=>'fillups','action'=>'delete',$fillup['Fillup']['id']),array(),'You definitely want to delete this?'); ?>
		</td>
	</tr> 
	<?php endforeach; ?> 
  </tbody>	
</table> 


<?php 
  // Simple (list) view
else: 
  echo $this->element('fillups_list', array('data'=>$data));

endif; 
?>

<p><?php echo 'Page ' . $this->Paginator->counter(); ?></p>

<ul class="pager">
  <li class="previous">
  	<?php
  	if($this->Paginator->hasPrev()) echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled')); ?>
  </li>
  <li class="next">
	<?php
  	if($this->Paginator->hasNext()) echo $this->Paginator->next('Next »', null, null, array('class' => 'disabled')); ?> 
  </li>
</ul>


	
</div>
