<h1>Your Parking Tickets</h1>

<table class="statistics">
  <tbody>
  <tr>
    <td><?php
    $total = 0;
    foreach($carParks as $carPark) {
      $total += $carPark['CarPark']['cost'];
    }
    echo $this->Number->currency($total,'GBP'); ?></td>
    <td><?php echo $this->Number->format(count($carParks)); ?></td>
  </tr>
  <tr>
    <th>total spent</th>
    <th>tickets</th>
  </tr>
  </tbody>
</table>

<?php echo $this->Html->link('Add Parking', array('action'=>'edit'), array('class'=>'btn btn-primary btn-large')); ?>
<?php
echo $this->element('car_parks_table', array('data' => $carParks));
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
