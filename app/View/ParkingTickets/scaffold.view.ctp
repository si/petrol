<article class="card">

	<div class="item-group">
		<h1 class="col-8">Parking Ticket №<?php echo $parkingTicket['ParkingTicket']['id']; ?></h1>
		<span class="col-4 price"><?php echo $this->Number->currency($parkingTicket['ParkingTicket']['cost'],'GBP'); ?></span>
	</div>
	<div class="item-group route">
		<time class="col-6" datetime="<?php echo $this->Time->format('c', $parkingTicket['ParkingTicket']['created']); ?>"><?php echo $this->Time->format('d M y h:ia', $parkingTicket['ParkingTicket']['created']); ?></time>
		<time class="col-6" datetime="<?php echo $this->Time->format('c', $parkingTicket['ParkingTicket']['expires']); ?>"><?php echo $this->Time->format('d M y h:ia', $parkingTicket['ParkingTicket']['expires']); ?></time>
	</div>
	<div class="map">
		<span class="location">
			<?php echo $parkingTicket['Location']['name']; ?>
		</span>
	</div>

	<section class="usage">
	<?php 
	if(count($parkingTicket['ParkingTicketUse'])>0) : ?>
	<ol class="marker">
		<?php foreach($parkingTicket['ParkingTicketUse'] as $use): ?>
		<li>
			<a href="/parking_ticket_uses/edit/<?php echo $use['id']; ?>">
				<span class="date"><?php echo $this->Time->format('d/m', $use['starts']); ?></span>
				<span class="times"><?php echo $this->Time->format('H:i', $use['starts']) . '–' . (($use['ends']!='') ? $this->Time->format('H:i', $use['ends']) : 'TBC'); ?></span>
				<span class="duration">(<?php echo $this->Time->format('H\hi',$use['duration']); ?>)</span>
			</a>
		</li>
		<?php endforeach; ?>
	</ol>
	<?php endif; ?>

	<?php 
	echo $this->Html->link('Add Use', 
		array('controller'=>'parking_ticket_uses', 'action'=>'add', 'parking_ticket_id'=>$parkingTicket['ParkingTicket']['id']),
		array('class'=>'btn')
	); ?>
	</section>

</article>

<div class="input-group">
	<?php echo $this->Html->link('Edit', array('action'=>'edit', $parkingTicket['ParkingTicket']['id']), array('class'=>'btn')); ?>
	<?php echo $this->Html->link('Back', array('action'=>'index'), array('class'=>'btn')); ?>
</div>