
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
		<td><?php echo $this->Html->link($this->Time->niceShort($fillup['Fillup']['created']), array('controller'=>'fillups','action'=>'edit',$fillup['Fillup']['id'])); ?> </td> 
		<td><?php echo $this->Number->currency($fillup['Fillup']['cost'],'GBP'); ?> </td> 
		<td><?php echo $this->Number->precision($fillup['Fillup']['litres'],2); ?> </td> 
		<td><?php echo $this->Number->currency($fillup['Fillup']['price_per_litre'],'GBP',array('places'=>3)); ?> </td> 
		<td><?php echo $fillup['Fillup']['location']; ?> </td> 
		<td><?php echo $this->Html->link($fillup['Vehicle']['name'], array('controller'=>'vehicles','action'=>'view',$fillup['Fillup']['vehicle_id'])); ?> </td> 
		<td><?php echo $fillup['Fillup']['odometer']; ?> </td> 
		<td>
		  <?php echo $this->Html->link('Edit', array('controller'=>'fillups','action'=>'edit',$fillup['Fillup']['id']),array('class'=>'btn btn-mini')); ?>
		  <?php echo $this->Html->link('Delete', array('controller'=>'fillups','action'=>'delete',$fillup['Fillup']['id']),array('class'=>'btn btn-mini'),'You definitely want to delete this?'); ?>
		</td>
	</tr> 
	<?php endforeach; ?> 
  </tbody>	
</table> 

