<canvas class="chart" data-chart-source="#receipts-table" data-chart-item="tbody tr" data-chart-x=".date a[data-short]" data-chart-y=".ppl" data-chart-order="reverse" width="350" height="200"></canvas>

<table id="receipts-table" class="table chart">
  <thead>
  	<?php if(isset($this->Paginator)) : ?>
	<tr>
		<th><?php echo $this->Paginator->sort('created', 'When', array('model'=>'Receipt')); ?></th> 
		<th><?php echo $this->Paginator->sort('cost', 'Price', array('model'=>'Receipt')); ?></th> 
		<th><?php echo $this->Paginator->sort('price_per_litre', '£/li', array('model'=>'Receipt')); ?></th> 
		<th><?php echo $this->Paginator->sort('location', 'Location', array('model'=>'Receipt')); ?></th> 
	</tr> 
	<?php endif; ?>
	</thead>
	<tbody>
	<?php 
	foreach($data as $receipt): 

		if(isset($receipt['Receipt'])) $receipt = $receipt['Receipt'];
	?> 
	<tr> 
		<td class="date">
		<?php 
			echo $this->Html->link(
				$this->Time->format($receipt['created'], '%d/%m'), 
				array('controller'=>'Receipts','action'=>'view',$receipt['id']),
				array(
					'data-utc'=> $this->Time->format($receipt['created'], '%c'),
					'data-short'=> $this->Time->format($receipt['created'], '%e %b %y'
					)
				)
			);
		?>
		</td> 
		<td><?php echo $this->Number->currency($receipt['cost'],'GBP'); ?> </td> 
		<td class="ppl"><?php echo $this->Number->currency($receipt['price_per_litre'],'GBP',array('places'=>3)); ?> </td> 
		<td>
		<?php 
		  echo '<a href="' 
		  . $this->Html->url(
		    array('controller'=>'receipts','action'=>'index','location'=>$receipt['location'])
		  ) 
		  . '">'.$receipt['location'] . '</a>'; 
		?>
		</td> 
	</tr> 
	<?php endforeach; ?> 
  </tbody>	
</table> 

