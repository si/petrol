
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
  <?php foreach($data as $Receipt): ?> 
	<tr> 
		<td><?php echo $this->Html->link($this->Time->niceShort($Receipt['Receipt']['created']), array('controller'=>'Receipts','action'=>'edit',$Receipt['Receipt']['id'])); ?> </td> 
		<td><?php echo $this->Number->currency($Receipt['Receipt']['cost'],'GBP'); ?> </td> 
		<td><?php echo $this->Number->precision($Receipt['Receipt']['litres'],2); ?> </td> 
		<td><?php echo $this->Number->currency($Receipt['Receipt']['price_per_litre'],'GBP',array('places'=>3)); ?> </td> 
		<td>
		<?php 
		  echo '<a href="' 
		  . $this->Html->url(
		    array('controller'=>'Receipts','action'=>'index','location'=>$Receipt['Receipt']['location'])
		  ) 
		  . '">'.$Receipt['Receipt']['location'] . '</a>'; 
		?>
		</td> 
		<td><?php echo $this->Html->link($Receipt['Vehicle']['name'], array('controller'=>'vehicles','action'=>'view',$Receipt['Receipt']['vehicle_id'])); ?> </td> 
		<td><?php echo $Receipt['Receipt']['odometer']; ?> </td> 
		<td>
		  <?php echo $this->Html->link('Edit', array('controller'=>'Receipts','action'=>'edit',$Receipt['Receipt']['id']),array('class'=>'btn btn-mini')); ?>
		  <?php echo $this->Html->link('Delete', array('controller'=>'Receipts','action'=>'delete',$Receipt['Receipt']['id']),array('class'=>'btn btn-mini'),'You definitely want to delete this?'); ?>
		</td>
	</tr> 
	<?php endforeach; ?> 
  </tbody>	
</table> 

