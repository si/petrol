<article class="card">

	<div class="item-group">
		<h1 class="col-8">Parking Ticket №<?php echo $parkingTicket['ParkingTicket']['id']; ?></h1>
		<span class="col-4 price"><?php echo $this->Number->currency($parkingTicket['ParkingTicket']['cost'],'GBP'); ?></span>
	</div>
	<div class="item-group">
		<time class="col-6" datetime="<?php echo $this->Time->format('c', $parkingTicket['ParkingTicket']['created']); ?>"><?php echo $this->Time->format('d M y h:ia', $parkingTicket['ParkingTicket']['created']); ?></time>
		<time class="col-6" datetime="<?php echo $this->Time->format('c', $parkingTicket['ParkingTicket']['expires']); ?>"><?php echo $this->Time->format('d M y h:ia', $parkingTicket['ParkingTicket']['expires']); ?></time>
	</div>
	<div class="map">
		<span class="location">
			<?php echo $parkingTicket['Location']['name']; ?>
		</span>
	</div>
</article>

<div class="input-group">
	<?php echo $this->Html->link('Edit', array('action'=>'edit', $parkingTicket['ParkingTicket']['id']), array('class'=>'btn')); ?>
	<?php echo $this->Html->link('Back', array('action'=>'index'), array('class'=>'btn')); ?>
</div>