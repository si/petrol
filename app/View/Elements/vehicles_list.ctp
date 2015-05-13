<?php

  if(isset($data) && count($data)>0) : 
  ?>
  <ul>
    <?php 
    
    foreach($data as $item) : 
    
      if(isset($item['Vehicle'])) $item = $item['Vehicle'];  
      
    ?>
    <li class="<?php echo ($item['status']!='') ? 'inactive' : ''; ?>">
      <h2 class="reg">
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

      <div class="item-group">
        <span class="col-6 detail"><?php echo $item['manufacturer'] . ' ' . $item['model']; ?></span>
        <span class="col-3 fuel-type-<?php echo $item['fuel_type']; ?>"><?php echo $item['fuel_type']; ?></span>
        <span class="col-3 fuel-capacity"><?php echo $item['tank_capacity']; ?>l</span>
      </div>

    </li>
    <?php endforeach; ?>
  </ol>
  <?php endif; // data check ?>
