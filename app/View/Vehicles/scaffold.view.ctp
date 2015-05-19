<h1 class="reg"><?php echo $vehicle['Vehicle']['registration']; ?></h1>
<h2><?php echo $vehicle['Vehicle']['nickname']; ?></h2>

<table>
	<thead>
		<tr>
			<th>Make</th>
			<th>Model</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><?php echo $vehicle['Vehicle']['manufacturer']; ?></td>
			<td><?php echo $vehicle['Vehicle']['model']; ?></td>
		</tr>
	</tbody>
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
	<tfoot>
		<tr>
			<td colspan="2">
				Added <time><?php echo $this->Time->nice($vehicle['Vehicle']['created']); ?></time>
			</td>
		</tr>
	</tfoot>
</table>


<h3>
	<?php echo $this->Html->link('Vehicle History', array('controller'=>'vehicle_events', 'action'=>'index')); ?>
</h3>

<?php echo $this->Html->link('Add Record', array('controller'=>'vehicle_events', 'action'=>'add'), array('class'=>'btn')); ?>

<table>
	<?php foreach($vehicle['VehicleEvent'] as $event) : ?>
	<thead>
		<th colspan="2">
			<?php echo $this->Html->link($event['vehicle_event_type_id'],
				array('controller'=>'vehicle_events', 'action'=>'edit', $event['id'])); ?>
		</th>
	</thead>
	<tbody>
		<tr>
			<th>When</th>
			<td><?php echo $this->Time->format('d M Y', $event['date']); ?></td>
		</tr>
		<tr>
			<th>Provider</th>
			<td><?php echo $event['provider']; ?></td>
		</tr>
		<?php if($event['provider_reference']!='') : ?>
		<tr>
			<th>Reference</th>
			<td><?php echo $event['provider_reference']; ?></td>
		</tr>
		<?php endif; ?>
		<?php if($event['provider_telephone']!='') : ?>
		<tr>
			<th>Telephone</th>
			<td><?php echo '<a href="tel:' . $event['provider_telephone'] . '">'
				. $event['provider_telephone']
				. '</a>'; ?></td>
		</tr>
		<?php endif; ?>
	</tbody>
	<?php endforeach; ?>
</table>


<?php echo $this->Html->link('Edit Vehicle',array('action'=>'edit',$vehicle['Vehicle']['id']),array('class'=>'btn btn-mini')); ?>
<?php echo $this->Html->link('Delete Vehicle',array('action'=>'delete',$vehicle['Vehicle']['id']),array('class'=>'btn btn-mini'),'Are you sure you want to delete this vehicle?'); ?>
<?php echo $this->Html->link('Garage',array('action'=>'index'),array('class'=>'btn')); ?>
