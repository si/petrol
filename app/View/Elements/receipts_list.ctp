<?php

  if(isset($data) && count($data)>0) : 
  ?>
  <ol class="dates">
    <?php 
    foreach($data as $item) : 
    ?>
    <li class="row">
      <span class="date span3">
        <?php echo $this->Html->link(
          $this->Time->niceShort($item['Receipt']['created']), 
          array(
            'controller'=>'receipts',
            'action'=>'view',
            $item['Receipt']['id']
          ),
          array(
            'escape' => false,
          )
        ); ?>
      </span>

      <small>

        <span class="units span3">        
          <i class="icon-tint  icon-white"></i>
          <?php echo $item['Receipt']['litres']; ?> litres
          @ 
          <?php echo '&pound;'.number_format($item['Receipt']['price_per_litre'],3); ?>
        </span>

        <span class="units span3">        
          <i class="icon-tint  icon-white"></i>
          <?php echo '&pound;'.number_format($item['Receipt']['cost'],2); ?>
        </span>

        <span class="location span3">
          <i class="icon-map-marker icon-white"></i>
          <?php echo $item['Receipt']['location']; ?>
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
                'controller'=>'Receipts',
                'action'=>'view',
                $item['id']
              )
            ); ?>
            </li>
            <li>
            <?php echo $this->Html->link(
              'Edit', 
              array(
                'controller'=>'Receipts',
                'action'=>'edit',
                $item['id']
              )
            ); ?>
            </li>
            <li>
            <?php echo $this->Html->link(
              'Delete', 
              array(
                'controller'=>'Receipts',
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
