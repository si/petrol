<h1>Your Statistics</h1>
<ul class="nav nav-tabs">
  <li class="<?php echo ((isset($this->params['pass'][0]) && $this->params['pass'][0]=='ppl-monthly') ? 'active' : ''); ?>"><?php echo $this->Html->link('Litre Monthly', array('controller'=>'fillups','action'=>'stats','ppl-monthly')); ?></li>
  <li class="<?php echo ((isset($this->params['pass'][0]) && $this->params['pass'][0]=='ppl-weekly') ? 'active' : ''); ?>"><?php echo $this->Html->link('Litre Weekly', array('controller'=>'fillups','action'=>'stats','ppl-weekly')); ?></li>
  <li class="<?php echo ((isset($this->params['pass'][0]) && $this->params['pass'][0]=='total-monthly') ? 'active' : ''); ?>"><?php echo $this->Html->link('Monthly Spend', array('controller'=>'fillups','action'=>'stats','total-monthly')); ?></li>
</ul>

<?php
if(isset($data) && count($data)>0) :

  if($view=='ppl-monthly') :
?>
  <table class="table table-striped table-hover chart">
    <caption>Price Per Litre</caption>
    <thead>
      <tr>
        <th>Month</th>
        <th>Price Per Litre</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($data as $row) : ?>
      <tr>
        <th><?php echo $row[0]['month'] . ' ' . $row[0]['year']; ?></th>
        <td><?php echo $this->Number->precision($row[0]['ppl']*100,1); ?></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
<?php
  elseif($view=='ppl-weekly') :
?>
  <table class="table table-striped table-hover chart">
    <caption>Price Per Litre</caption>
    <thead>
      <tr>
        <th>Week</th>
        <th>Price Per Litre</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($data as $row) : ?>
      <tr>
        <th><?php echo $row[0]['week'] . ' ' . $row[0]['year']; ?></th>
        <td><?php echo $this->Number->precision($row[0]['ppl']*100,1); ?></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
<?php
  elseif($view=='total-monthly') :
?>
  <table class="table table-striped table-hover chart">
    <caption>Total Monthly</caption>
    <thead>
      <tr>
        <th>Month</th>
        <th>Spent</th>
      </tr>
    </thead>
    <tbody>
    <?php 
      $total_spent = 0;
      foreach($data as $row) : 
        $total_spent += $row[0]['spent'];  
    ?>
      <tr>
        <th><?php echo $row[0]['month'] . ' ' . $row[0]['year']; ?></th>
        <td><?php echo $this->Number->currency($row[0]['spent'],'GBP'); ?></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
    <tfoot>
      <tr>
        <th>Total</th>
        <td><?php echo $this->Number->currency($total_spent,'GBP'); ?></td>
      </tr>
    </tfoot>
  </table>
<?php

  endif;
  
endif;
?>
        