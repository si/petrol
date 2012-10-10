<?php

  if(isset($data) && count($data)>0) : 
  ?>
  <ol class="unstyled">
    <?php 
    
    foreach($data as $item) : 
    
      if(isset($item['Fillup'])) $item = $item['Fillup'];  
      
    ?>
    <li>
      <h2>
        <?php echo $this->Html->link(
          '&pound;' . $this->Number->precision($item['cost'], 2), 
          array(
            'controller'=>'fillups',
            'action'=>'edit',
            $item['id']
          ),
          array(
            'escape' => false,
          )
        ); ?>
      </h2>

      <small>

        <span class="odometer span3">        
          <i class="icon-road"></i>
          <?php echo $item['odometer']; ?>
        </span>
        
        <span class="units span3">        
          <i class="icon-tint"></i>
          <?php echo $item['litres']; ?> litres
          @ 
          <?php echo '&pound;'.number_format($item['price_per_litre'],3); ?>
        </span>

        <span class="location span3">
          <i class="icon-map-marker"></i>
          <?php echo $item['location']; ?>
        </span>  

        <span class="datetime span3">
          <i class="icon-time"></i>
          <?php echo $this->Time->niceShort($item['created']); ?>
        </span>


      </small>

        <?php
        /*
        Remove until the Bootstrap JS is fixed
        
        <div class="btn-group">
          <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
            Options
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li>
            <?php echo $this->Html->link(
              'View', 
              array(
                'controller'=>'fillups',
                'action'=>'view',
                $item['id']
              )
            ); ?>
            </li>
            <li>
            <?php echo $this->Html->link(
              'Edit', 
              array(
                'controller'=>'fillups',
                'action'=>'edit',
                $item['id']
              )
            ); ?>
            </li>
            <li>
            <?php echo $this->Html->link(
              'Delete', 
              array(
                'controller'=>'fillups',
                'action'=>'delete',
                $item['id']
              )
            ); ?>
            </li>
          </ul>
        </div>
        */
        ?>

    </li>
    <?php endforeach; ?>
  </ol>
  <?php endif; // data check ?>
