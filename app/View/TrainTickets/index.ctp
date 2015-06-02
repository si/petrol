<h1>Your Train Tickets</h1>

<table class="stats">
  <tbody>
  <tr>
    <td><?php
    $total = 0;
    foreach($trainTickets as $ticket) {
      $total += $ticket['TrainTicket']['price'];
    }
    echo $this->Number->currency($total,'GBP'); ?></td>
    <td><?php echo $this->Number->format(count($trainTickets)); ?></td>
  </tr>
  <tr>
    <th>total spent</th>
    <th>tickets</th>
  </tr>
  </tbody>
</table>

<?php echo $this->Html->link('Add Ticket', array('controller'=>'train_tickets','action'=>'form'), array('class'=>'btn')); ?>
<?php
echo $this->element('train_tickets_table', array('data' => $trainTickets));
?>

<p><?php echo 'Page ' . $this->Paginator->counter(); ?></p>

<ul class="pager">
  <li class="previous">
  	<?php
  	if($this->Paginator->hasPrev()) echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled')); ?>
  </li>
  <li class="next">
	<?php
  	if($this->Paginator->hasNext()) echo $this->Paginator->next('Next »', null, null, array('class' => 'disabled')); ?>
  </li>
</ul>
