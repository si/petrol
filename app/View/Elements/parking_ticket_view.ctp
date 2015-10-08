<article class="card">

	<div class="item-group">
		<h1 class="col-8">#<?php echo $parkingTicket['ParkingTicket']['id']; ?></h1>
		<span class="col-4 price"><?php echo $this->Number->currency($parkingTicket['ParkingTicket']['cost'],'GBP'); ?></span>
	</div>
	<div class="item-group route">
		<time class="col-6" datetime="<?php echo $this->Time->format('c', $parkingTicket['ParkingTicket']['created']); ?>"><?php echo $this->Time->format('d M y h:ia', $parkingTicket['ParkingTicket']['created']); ?></time>
		<time class="col-6" datetime="<?php echo $this->Time->format('c', $parkingTicket['ParkingTicket']['expires']); ?>"><?php echo $this->Time->format('d M y h:ia', $parkingTicket['ParkingTicket']['expires']); ?></time>
	</div>
	<div class="map" style="background-size: cover;background-image: url('http://maps.googleapis.com/maps/api/staticmap?center=<?php echo urlencode($parkingTicket['Location']['name']); ?>&size=640x400&style=element:labels|visibility:off&style=element:geometry.stroke|visibility:off&style=feature:landscape|element:geometry|saturation:-100&style=feature:water|saturation:-100|invert_lightness:true&key=AIzaSyBMISecHzJR_Mie1nlsQWpQkv-E6B7ZFno');">
		<?php echo $parkingTicket['Location']['name']; ?>
		<span class="geo">(<?php echo $parkingTicket['Location']['long'] . ',' . $parkingTicket['Location']['lat']; ?>)</span>
	</div>

	<section id="usage">
		<?php
		if(count($parkingTicket['ParkingTicketUse'])>0) : ?>
		<div class="timeline">
		<ol>
			<?php foreach($parkingTicket['ParkingTicketUse'] as $use): ?>
			<li>
				<a href="/parking_ticket_uses/edit/<?php echo $use['id']; ?>">
					<span class="date"><?php echo $this->Time->format('d/m', $use['starts']); ?></span>
					<span class="times"><?php echo $this->Time->format('H:i', $use['starts']) . '–' . (($use['ends']!='') ? $this->Time->format('H:i', $use['ends']) : 'TBC'); ?></span>
					<?php if($use['ends']!='') : ?>
					<span class="duration">(<?php echo $this->Time->format('H\hi',$use['duration']); ?>)</span>
					<?php endif; ?>
				</a>

				<?php
				echo $this->Html->link('X',
					array('controller'=>'parking_ticket_uses', 'action'=>'delete', $use['id']),
					array('class'=>'btn-sm')
					//'Are you sure?'
				) ;
				?>
			</li>
			<?php
				if($use['ends']=='') $timer = true;
			endforeach;
			?>
		</ol>
		</div>
		<?php endif; ?>

		<div class="input-group">
			<?php
			if(!isset($timer) || !$timer) {
				echo $this->Html->link('Quick Start',
					array('controller'=>'parking_ticket_uses', 'action'=>'add', 'parking_ticket_id'=>$parkingTicket['ParkingTicket']['id'], 'starts'=>'now'),
					array('class'=>'btn i-timer')
				);
			} else {
				echo $this->Html->link('Quick End',
					array('controller'=>'parking_ticket_uses', 'action'=>'add', 'parking_ticket_id'=>$parkingTicket['ParkingTicket']['id'], 'ends'=>'now'),
					array('class'=>'btn i-timer')
				);
			}

			echo $this->Html->link('Add Use',
				array('controller'=>'parking_ticket_uses', 'action'=>'add', 'parking_ticket_id'=>$parkingTicket['ParkingTicket']['id']),
				array('class'=>'btn i-add')
			); ?>
		</div>
	</section>

</article>

<div class="input-group">
	<?php echo $this->Html->link('Edit', array('action'=>'edit', $parkingTicket['ParkingTicket']['id']), array('class'=>'btn')); ?>
	<?php echo $this->Html->link('Back', array('action'=>'index'), array('class'=>'btn')); ?>
</div>
