<article class="card">

	<div class="item-group">
		<h1 class="col-6">№<?php echo $trainTicket['TrainTicket']['id']; ?></h1>
		<span class="col-6 price"><?php echo $this->Number->currency($trainTicket['TrainTicket']['price'],'GBP'); ?></span>
	</div>

	<div class="route">
		<abbr title="<?php echo $trainTicket['OriginId']['name']; ?>">
			<?php echo $trainTicket['OriginId']['code']; ?>
		</abbr>
		<abbr title="<?php echo $trainTicket['DestinationId']['name']; ?>">
			<?php echo $trainTicket['DestinationId']['code']; ?>
		</abbr>
	</div>

	<div class="vitals">
		<time datetime="<?php echo $this->Time->format('c', $trainTicket['TrainTicket']['created']); ?>"><?php echo $this->Time->format('d M y h:ia', $trainTicket['TrainTicket']['created']); ?></time>
	</div>

	<table>
		<thead>
			<tr>
				<th>Type</th>
				<th>Class</th>
				<th>Restrictions</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $trainTicket['TrainTicketType']['name']; ?></td>
				<td><?php echo $trainTicket['TrainTicketClass']['name']; ?></td>
				<td><?php echo ($trainTicket['TrainTicketRestriction']['name']!='') ? $trainTicket['TrainTicketRestriction']['name'] : '–'; ?></td>
			</tr>
		</tbody>
	</table>

	<section id="usage">
		<?php
		if(count($trainTicket['TrainTicketUse'])>0) : ?>
		<div class="timeline">
		<ol>
			<?php foreach($trainTicket['TrainTicketUse'] as $use): ?>
			<li>
				<a href="/train_ticket_uses/edit/<?php echo $use['id']; ?>">
					<span class="date"><?php echo $this->Time->format('d/m', $use['departs']); ?></span>
					<span class="times"><?php echo $this->Time->format('H:i', $use['departs']) . '–' . (($use['arrives']!='') ? $this->Time->format('H:i', $use['arrives']) : 'TBC'); ?></span>
					<?php if($use['arrives']!='') : ?>
					<span class="duration">(<?php echo $this->Time->format('H\hi',$use['duration']); ?>)</span>
					<?php endif; ?>
				</a>

				<?php
				echo $this->Html->link('X',
					array('controller'=>'train_ticket_uses', 'action'=>'delete', $use['id']),
					array('class'=>'btn-sm')
					//'Are you sure?'
				) ;
				?>
			</li>
			<?php
				if($use['arrives']=='') $timer = true;
			endforeach;
			?>
		</ol>
		</div>
		<?php endif; ?>

		<div class="input-group">
			<?php
			if(!isset($timer) || !$timer) {
				echo $this->Html->link('Quick Start',
					array('controller'=>'train_ticket_uses', 'action'=>'add', 'train_ticket_id'=>$trainTicket['TrainTicket']['id'], 'departs'=>'now'),
					array('class'=>'btn i-timer')
				);
			} else {
				echo $this->Html->link('Quick End',
					array('controller'=>'train_ticket_uses', 'action'=>'add', 'train_ticket_id'=>$trainTicket['TrainTicket']['id'], 'arrives'=>'now'),
					array('class'=>'btn i-timer')
				);
			}

			echo $this->Html->link('Add Use',
				array('controller'=>'train_ticket_uses', 'action'=>'add', 'train_ticket_id'=>$trainTicket['TrainTicket']['id']),
				array('class'=>'btn i-add')
			); ?>
		</div>
	</section>

</article>

<div class="input-group">
	<?php echo $this->Html->link('Edit', array('action'=>'form', $trainTicket['TrainTicket']['id']), array('class'=>'btn')); ?>
	<?php echo $this->Html->link('Back', array('action'=>'index'), array('class'=>'btn')); ?>
</div>