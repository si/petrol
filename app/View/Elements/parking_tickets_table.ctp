<canvas class="chart" data-chart-source="#parking-tickets" data-chart-item="tbody tr" data-chart-x=".date a" data-chart-y=".price" data-chart-order="reverse" data-chart-debug="true" width="350" height="200"></canvas>

<table id="parking-tickets" class="table">
  <thead>
  	<?php if(isset($this->Paginator)) : ?>
	<tr>
		<th><?php echo $this->Paginator->sort('created', 'When'); ?></th>
		<th><?php echo $this->Paginator->sort('location_id', 'Where'); ?></th>
		<th><?php echo $this->Paginator->sort('duration', 'Duration'); ?></th>
    	<th><?php echo $this->Paginator->sort('cost', 'Cost'); ?></th>
	</tr>
	<?php endif; ?>
	</thead>
	<tbody>
		<?php foreach($data as $item): ?>
		<tr>
			<td class="date"><?php echo $this->Html->link($this->Time->format('d/m', $item['ParkingTicket']['created']), array('controller'=>'parking_tickets', 'action'=>'view', $item['ParkingTicket']['id'])); ?> </td>
		    <td><?php echo $item['Location']['name']; ?> </td>
		    <td><?php echo ($item['ParkingTicket']['duration_hours'] >= 24) ? ($item['ParkingTicket']['duration_hours'] / 24) . 'd' : $item['ParkingTicket']['duration_hours'] . 'h'; ?> </td>
			<td class="price"><?php echo $this->Number->currency($item['ParkingTicket']['cost'],'GBP',array('places'=>2)); ?> </td>
		</tr>
		<?php endforeach; ?>
  </tbody>
</table>
