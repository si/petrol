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

</article>

<div class="input-group">
	<?php echo $this->Html->link('Edit', array('action'=>'form', $trainTicket['TrainTicket']['id']), array('class'=>'btn')); ?>
	<?php echo $this->Html->link('Back', array('action'=>'index'), array('class'=>'btn')); ?>
</div>