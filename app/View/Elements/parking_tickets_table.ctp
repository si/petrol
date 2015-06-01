
<table class="table">
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
			<td><?php echo $this->Html->link($this->Time->niceShort($item['ParkingTicket']['created']), array('controller'=>'parking_tickets', 'action'=>'view', $item['ParkingTicket']['id'])); ?> </td>
		    <td><?php echo $item['Location']['name']; ?> </td>
		    <td><?php echo ($item['ParkingTicket']['duration_hours'] >= 24) ? ($item['ParkingTicket']['duration_hours'] / 24) . ' day' . (($item['ParkingTicket']['duration_hours'] / 24)>1 ? 's' : '') : $item['ParkingTicket']['duration_hours'] . ' hours'; ?> </td>
			<td><?php echo $this->Number->currency($item['ParkingTicket']['cost'],'GBP',array('places'=>2)); ?> </td>
		</tr>
		<?php endforeach; ?>
  </tbody>
</table>
