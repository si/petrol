<h1>Vehicle Events</h1>

<table>
	<thead>
		<tr>
			<th>When</th>
			<th>Type</th>
			<th>Vehicle</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($vehicleEvents as $event) : ?>
		<tr>
			<td><?php echo $this->Html->link($event['VehicleEvent']['date'], array('action'=>'edit', $event['VehicleEvent']['id'])); ?></td>
			<td><?php echo $this->Html->link($event['VehicleEventType']['name'], array('controller'=>'vehicle_event_types','action'=>'edit', $event['VehicleEventType']['id'])); ?></td>
			<td><?php echo $this->Html->link($event['Vehicle']['registration'], array('controller'=>'vehicles','action'=>'edit', $event['Vehicle']['id'])); ?></td>
		</tr>
		<?php endforeach; ?>
	</thead>	
</table>