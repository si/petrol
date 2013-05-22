<div class="receipt">
  
  <h1>Receipt #<?php echo $receipt['Receipt']['id']; ?></h1>

	<table class="table table-striped">
	 <tr>
	   <td><?php echo $this->Number->precision($receipt['Receipt']['litres'],2); ?></td>
	   <td><?php echo $this->Number->currency($receipt['Receipt']['price_per_litre'],'GBP'); ?></td>
	   <td><?php echo $this->Number->currency($receipt['Receipt']['cost'],'GBP'); ?></td>
	 </tr>
	 <tr>
	   <th>Litres</th>
	   <th>Price</th>
	   <th>Total</th>
	 </tr>
	</table>

	<table class="table table-striped">
	 <tr>
	   <td><?php echo ($receipt['Vehicle']['name']); ?></td>
	   <td><?php echo ($receipt['Receipt']['odometer']); ?></td>
	   <td><?php echo ($receipt['Receipt']['indicator']); ?></td>
	 </tr>
	 <tr>
	   <th>Vehicle</th>
	   <th>Odometer</th>
	   <th>Indicator</th>
	 </tr>
	 <tr>
	   <td><?php echo $this->Time->format('d/m/y',$receipt['Receipt']['created']); ?></td>
	   <td><?php echo $this->Time->format('h:ia',$receipt['Receipt']['created']); ?></td>
	   <td><?php echo ($receipt['Receipt']['location']); ?></td>
	 </tr>
	 <tr>
	   <th>Date</th>
	   <th>Time</th>
	   <th>Station</th>
	 </tr>
	</table>


	<?php echo $this->Html->link('Edit',array('action'=>'edit',$receipt['Receipt']['id']),array('class'=>'btn')); ?>
	<?php echo $this->Html->link('Delete',array('action'=>'delete',$receipt['Receipt']['id']),array('class'=>'btn')); ?>
	<?php echo $this->Html->link('Back to Wallet',array('action'=>'index'),array('class'=>'btn')); ?>
	
</div>