<div class="hero-unit">
  <h1><?php echo $vehicle['Vehicle']['registration']; ?></h1>
  <h2><?php echo $vehicle['Vehicle']['manufacturer'] . ' ' . $vehicle['Vehicle']['model']; ?></h2>
</div>

<table>
	<thead>
		<tr>
			<th>Fuel Type</th>
			<th>Fuel Capacity</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><?php echo $vehicle['Vehicle']['fuel_type']; ?></td>
			<td><?php echo $vehicle['Vehicle']['tank_capacity']; ?>l</td>
		</tr>
	</tbody>
</table>

<?php echo $this->element('receipts_list'); ?>

<p>Added <time><?php echo $this->Time->nice($vehicle['Vehicle']['created']); ?></time></p>

<?php echo $this->Html->link('Edit Vehicle',array('action'=>'edit',$vehicle['Vehicle']['id']),array('class'=>'btn btn-mini')); ?>
<?php echo $this->Html->link('Delete Vehicle',array('action'=>'delete',$vehicle['Vehicle']['id']),array('class'=>'btn btn-mini'),'Are you sure you want to delete this vehicle?'); ?>
<?php echo $this->Html->link('Garage',array('action'=>'index'),array('class'=>'btn')); ?>
