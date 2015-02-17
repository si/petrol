
<table class="table">
  <thead>
	<tr>
		<th><?php echo $this->Paginator->sort('created', 'When'); ?></th>
		<th><?php echo $this->Paginator->sort('location_id', 'Where'); ?></th>
		<th><?php echo $this->Paginator->sort('duration', 'Duration'); ?></th>
    	<th><?php echo $this->Paginator->sort('cost', 'Cost'); ?></th>
	</tr>
	</thead>
	<tbody>
  		<?php foreach($data as $item): ?>
		<tr>
			<td><?php echo $this->Html->link($this->Time->niceShort($item['CarPark']['created']), array('controller'=>'car_parks','action'=>'view',$item['CarPark']['id'])); ?> </td>
		    <td><?php echo $item['Location']['name']; ?> </td>
		    <td><?php echo ($item['CarPark']['duration_hours'] > 24) ? ($item['CarPark']['duration_hours'] / 24) . ' days' : $item['CarPark']['duration_hours'] . ' hours'; ?> </td>
			<td><?php echo $this->Number->currency($item['CarPark']['cost'],'GBP',array('places'=>2)); ?> </td>
		</tr>
		<?php endforeach; ?>
  </tbody>
</table>
