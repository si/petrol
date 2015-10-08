<article class="card">
  
  <h1>#<?php echo $receipt['Receipt']['id']; ?></h1>

  <table>
	<thead>
	 <tr>
	   <th>Litres</th>
	   <th>Price</th>
	   <th>Total</th>
	 </tr>
	</thead>
	<tbody>
	 <tr>
	   <td><?php echo $this->Number->precision($receipt['Receipt']['litres'],2); ?></td>
	   <td><?php echo $this->Number->currency($receipt['Receipt']['price_per_litre'],'GBP', array('precision'=>3)); ?></td>
	   <td><?php echo $this->Number->currency($receipt['Receipt']['cost'],'GBP'); ?></td>
	 </tr>
	</tbody>

	<thead>
	 <tr>
	   <th>Vehicle</th>
	   <th>Odometer</th>
	   <th>Indicator</th>
	 </tr>
	</thead>
	<tbody>
	 <tr>
	   <td><?php echo ($receipt['Vehicle']['name']); ?></td>
	   <td><?php echo $this->Number->format($receipt['Receipt']['odometer']); ?></td>
	   <td>
		<progress value="<?php echo ($receipt['Receipt']['indicator']*100); ?>" max="100"><?php echo $this->Number->toPercentage($receipt['Receipt']['indicator']*100); ?></progress>
	   </td>
	 </tr>
	</tbody>
	</table>

	<div class="map"><?php echo ($receipt['Receipt']['location']); ?></div>

	<table>
	<thead>
	 <tr>
	   <th>Date</th>
	   <th>Time</th>
	 </tr>
	</thead>
	<tbody>
	 <tr>
	   <td><?php echo $this->Time->format('d/m/y',$receipt['Receipt']['created']); ?></td>
	   <td><?php echo $this->Time->format('h:ia',$receipt['Receipt']['created']); ?></td>
	 </tr>
	</tbody>
	</table>
	
</article>