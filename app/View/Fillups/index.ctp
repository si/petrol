
<div class="hero-unit">
  <h1>Your Fill Ups</h1>
  <h2>You've already spent <?php echo $this->Number->currency($totals[0][0]['spent'],'GBP'); ?> this year</h2>
  <?php echo $this->Html->link('Add Fillup', array('controller'=>'fillups','action'=>'add'), array('class'=>'btn btn-primary btn-large')); ?>
</div>
<?php // var_dump($data); 

if(count($vehicles)>1) :
  echo 'Filter by Vehicle <ul>';
  echo '<li><a href="'. $this->Html->url(array("controller" => "fillups","action" => "index")) . '">All</a></li>';
  foreach($vehicles as $id=>$name) :
    echo '<li><a href="'. $this->Html->url(array("controller" => "fillups","action" => "index","vehicle" => $id)) . '">'.$name.'</a></li>';
  endforeach;
  echo '</ul>';
endif;

// Table view  
if(isset($view) && $view=='list ') : 

  echo $this->element('fillups_list', array('data'=>$data));

// Simple (list) view
else: 
  echo $this->element('fillups_table', array('data'=>$data));

endif; 
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
