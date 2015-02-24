<h1>Your Receipts</h1>

<table class="statistics">
  <tbody>
  <tr>
    <td><?php echo $this->Number->currency($totals[0][0]['spent'],'GBP'); ?></td>
    <td><?php echo $this->Number->format($totals[0][0]['entries']); ?></td>
    <td><?php echo $this->Number->format($totals[0][0]['stations']); ?></td>
    <td><?php echo $this->Number->format($totals[0][0]['miles']); ?></td>
    <td><?php echo $this->Number->currency($totals[0][0]['spent']/$totals[0][0]['miles'],'GBP'); ?></td>
  </tr>
  <tr>
    <th>total spent</th>
    <th>Receipts</th>
    <th>stations</th>
    <th>total miles</th>
    <th>per mile</th>
  </tr>
  </tbody>
</table>
    
<?php echo $this->Html->link('Add Receipt', array('controller'=>'receipts','action'=>'add'), array('class'=>'btn btn-primary btn-large')); ?>
<?php // var_dump($data); 

if(count($vehicles)>1) : 
?>
<div class="btn-group pull-right">
  <a class="btn dropdown-toggle btn-mini" data-toggle="dropdown" href="#">
    Filter by Vehicle
    <span class="caret"></span>
  </a>
  <ul class="dropdown-menu">
    <li><a href="<?php echo $this->Html->url(array("controller" => "receipts","action" => "index")); ?>">All</a></li>
    <?php 
      foreach($vehicles as $id=>$name) :
        echo '<li '
          . ((isset($vehicle) && $vehicle['Vehicle']['id']==$id) ? 'class="disabled"' : '') 
          . '>' 
          . '<a href="'. $this->Html->url(array("controller" => "receipts","action" => "index","vehicle" => $id)) . '">'
          . $name 
          . '</a>'
          . '</li>';
      endforeach;
    ?>
  </ul>
</div>
<?php
endif;

echo $this->element('receipts_table', array('data'=>$data));

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


	
</div>
