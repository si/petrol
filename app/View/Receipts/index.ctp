<h1>Your Receipts</h1>

<?php echo $this->Html->link('Add Receipt', array('controller'=>'receipts','action'=>'add'), array('class'=>'btn btn-primary btn-large')); ?>

<?php echo $this->element('filter_form'); ?>  

<table class="stats">
  <tbody>
  <tr>
    <td><?php echo $this->Number->currency(floor($totals[0][0]['spent']),'GBP',array('places'=>0)); ?></td>
    <td><?php echo ($totals[0][0]['miles']>0 && $totals[0][0]['litres']>0) ? $this->Number->format( $gallons = $totals[0][0]['miles'] / ($totals[0][0]['litres'] * 0.219), 2 ) : 0; ?></td>
    <td><?php echo ($totals[0][0]['miles']>0 && $totals[0][0]['litres']>0) ? $this->Number->currency($totals[0][0]['spent']/$totals[0][0]['miles'],'GBP') : 0; ?></td>
  </tr>
  <tr>
    <th>total spent</th>
    <th>MPG</th>
    <th>per mile</th>
  </tr>
  </tbody>
</table>
    
<?php // var_dump($data); 

if(count($vehicles)>1) : 
?>
<ul class="tabs">
  <li class="<?php echo !isset($vehicle) ? 'selected' : ''; ?>">
    <?php 
    echo $this->Html->link('All', 
      array("controller" => "receipts","action" => "index")
    ); ?>
  </li>
  <?php 
    foreach($vehicles as $id=>$name) :
      echo '<li '
        . ((isset($vehicle) && $vehicle['Vehicle']['id']==$id) ? 'class="selected"' : '') 
        . '>' 
        . '<a href="'. $this->Html->url(array("controller" => "receipts","action" => "index","vehicle" => $id)) . '">'
        . $name 
        . '</a>'
        . '</li>';
    endforeach;
  ?>
  </ul>
<?php
endif;

echo $this->element('receipts_table', array('data'=>$data));

?>


<div class="pager">
	<?php
	if($this->Paginator->hasPrev()) echo $this->Paginator->prev('Previous', null, null, array('class' => 'disabled')); ?>
  
  <span><?php echo 'Page ' . $this->Paginator->counter(); ?></span>

	<?php
  	if($this->Paginator->hasNext()) echo $this->Paginator->next('Next', null, null, array('class' => 'disabled')); ?> 
</div>
