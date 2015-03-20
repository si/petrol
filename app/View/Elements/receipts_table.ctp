<canvas id="receiptsChart" width="300" height="300"></canvas>

<table class="table chart">
  <thead>
	<tr> 
		<th><?php echo $this->Paginator->sort('created', 'When'); ?></th> 
		<th><?php echo $this->Paginator->sort('cost', 'Price'); ?></th> 
		<th><?php echo $this->Paginator->sort('price_per_litre', '£/li'); ?></th> 
		<th><?php echo $this->Paginator->sort('location', 'Location'); ?></th> 
	</tr> 
	</thead>
	<tbody>
  <?php foreach($data as $Receipt): ?> 
	<tr> 
		<td><?php echo $this->Html->link($this->Time->niceShort($Receipt['Receipt']['created']), array('controller'=>'Receipts','action'=>'view',$Receipt['Receipt']['id']), array('data-utc'=> $this->Time->format($Receipt['Receipt']['created'], '%c'), 'data-short'=> $this->Time->format($Receipt['Receipt']['created'], '%e %b %y'))); ?> </td> 
		<td><?php echo $this->Number->currency($Receipt['Receipt']['cost'],'GBP'); ?> </td> 
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
	</tr> 
	<?php endforeach; ?> 
  </tbody>	
</table> 

