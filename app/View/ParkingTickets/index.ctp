<?php 
$this->viewVars['title_for_layout'] = 'Parking Tickets';
?>

<h1>Your Parking Tickets</h1>

<?php echo $this->Html->link('Add Parking', array('action'=>'edit'), array('class'=>'btn btn-primary btn-large')); ?>

<?php echo $this->Form->create(null, array('class'=>'filters')); ?>
  <?php echo $this->Form->input('from', array('class'=>'date','label'=>'','placeholder'=>'From')); ?>
  <?php echo $this->Form->input('to', array('class'=>'date','label'=>'','placeholder'=>'To')); ?>
  <div class="btns">
    <?php echo $this->Form->button('Apply'); ?>
    <?php echo $this->Html->link('Clear', array('action'=>'index'), array('class'=>'btn')); ?>
  </div>
<?php echo $this->Form->end(); ?>

<table class="stats">
  <tbody>
    <tr>
      <td><?php echo $this->Number->currency($stats[0][0]['total_spent'],'GBP'); ?></td>
      <td><?php echo $this->Number->format($stats[0][0]['total_tickets']); ?></td>
      <td title="<?php echo $this->Time->format('d M Y', $stats[0][0]['first']) . '–' . $this->Time->format('d M Y', $stats[0][0]['last']); ?>">
        <?php echo $this->Number->format(($stats[0][0]['duration'])); ?>
      </td>
    </tr>
    <tr>
      <th>total spent</th>
      <th>tickets</th>
      <th>days</th>
    </tr>
  </tbody>
  <tfoot class="small">
    <tr>
      <td colspan="3">
        <?php echo $this->Html->link('More stats', array('action'=>'stats')); ?>
      </td>
    </tr>
  </tfoot>
</table>

<?php
echo $this->element('parking_tickets_table', array('data' => $parkingTickets));
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
