<?php

  if(isset($data) && count($data)>0) : 
  ?>
  <ol class="unstyled">
    <?php 
    
    foreach($data as $item) : 
    
      if(isset($item['Vehicle'])) $item = $item['Vehicle'];  
      
    ?>
    <li>
      <h2>
        <?php echo $this->Html->link(
          $item['registration'], 
          array(
            'controller'=>'vehicles',
            'action'=>'view',
            $item['id']
          ),
          array(
            'escape' => false,
          )
        ); ?>
      </h2>

      <small>
        <i class="icon-info-sign"></i>
        <?php echo $item['manufacturer'] . ' ' . $item['model']; ?>
        <i class="icon-time"></i>
        <?php echo $this->Time->niceShort($item['created']); ?>
      </small>

    </li>
    <?php endforeach; ?>
  </ol>
  <?php endif; // data check ?>
