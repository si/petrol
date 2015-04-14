
<table class="table-cards">
  <thead>
	<tr>
		<th><?php echo $this->Paginator->sort('created', 'When'); ?></th>
		<th><?php echo $this->Paginator->sort('origin_id', 'From'); ?></th>
		<th><?php echo $this->Paginator->sort('destination_id', 'To'); ?></th>
	    <th><?php echo $this->Paginator->sort('cost', 'Cost'); ?></th>
	</tr>
	</thead>
	<tbody>
  <?php foreach($data as $item): ?>
	<tr>
		<td><?php echo $this->Html->link($this->Time->format('d/m', $item['TrainTicket']['created']), array('controller'=>'train_tickets','action'=>'view',$item['TrainTicket']['id'])); ?> </td>
	    <td><?php echo $item['OriginId']['code']; ?> </td>
	    <td><?php echo $item['DestinationId']['code']; ?> </td>
		<td><?php echo $this->Number->currency($item['TrainTicket']['price'],'GBP',array('places'=>2)); ?> </td>
	</tr>
	<?php endforeach; ?>
  </tbody>
</table>
