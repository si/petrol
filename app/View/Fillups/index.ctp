
<div class="hero-unit">
  <h1>Your Fill Ups</h1>
  <h2>
    You've spent <?php echo $this->Number->currency($totals[0][0]['spent'],'GBP'); ?>
    <?php if(isset($vehicle)) : ?>
      on your <?php echo $vehicle['Vehicle']['manufacturer'] . ' ' . $vehicle['Vehicle']['model']; ?>
    <?php endif; ?>
    so far
  </h2>
  <?php echo $this->Html->link('Add Fillup', array('controller'=>'fillups','action'=>'add'), array('class'=>'btn btn-primary btn-large')); ?>
</div>
<?php // var_dump($data); 

if(count($vehicles)>1) : 
?>
<div class="btn-group pull-right">
  <a class="btn dropdown-toggle btn-mini" data-toggle="dropdown" href="#">
    Filter by Vehicle
    <span class="caret"></span>
  </a>
  <ul class="dropdown-menu">
    <li><a href="<?php echo $this->Html->url(array("controller" => "fillups","action" => "index")); ?>">All</a></li>
    <?php 
      foreach($vehicles as $id=>$name) :
        echo '<li '
          . ((isset($vehicle) && $vehicle['Vehicle']['id']==$id) ? 'class="disabled"' : '') 
          . '>' 
          . '<a href="'. $this->Html->url(array("controller" => "fillups","action" => "index","vehicle" => $id)) . '">'
          . $name 
          . '</a>'
          . '</li>';
      endforeach;
    ?>
  </ul>
</div>
<?php
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
