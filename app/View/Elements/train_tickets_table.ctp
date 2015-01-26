
<table class="table  table-striped">
  <thead>
	<tr>
		<th><?php echo $this->Paginator->sort('created', 'When'); ?></th>
		<th><?php echo $this->Paginator->sort('origin_id', 'Origin'); ?></th>
		<th><?php echo $this->Paginator->sort('destination_id', 'Destination'); ?></th>
		<th><?php echo $this->Paginator->sort('cost', 'Cost'); ?></th>
	</tr>
	</thead>
	<tbody>
  <?php foreach($data as $item): ?>
	<tr>
		<td><?php echo $this->Html->link($this->Time->niceShort($item['TrainTicket']['created']), array('controller'=>'train_tickets','action'=>'view',$item['TrainTicket']['id'])); ?> </td>
    <td><?php echo $item['OriginId']['name']; ?> </td>
    <td><?php echo $item['DestinationId']['name']; ?> </td>
		<td><?php echo $this->Number->currency($item['TrainTicket']['price'],'GBP',array('places'=>2)); ?> </td>
	</tr>
	<?php endforeach; ?>
  </tbody>
</table>
