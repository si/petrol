<?php

  if(isset($data) && count($data)>0) :
  ?>
  <ol class="dates">
    <?php
    foreach($data as $item) :
    ?>
    <li class="row">

        <span class="units col-md-2">
          <i class="icon-shopping-cart icon-white"></i>
          <?php echo '&pound;'.number_format($item['Receipt']['cost'],2); ?>
        </span>

        <span class="units col-md-2">
          <i class="icon-tint  icon-white"></i>
          <?php echo $item['Receipt']['litres']; ?> litres
          @
          <?php echo '&pound;'.number_format($item['Receipt']['price_per_litre'],3); ?>
        </span>

        <span class="location col-md-3">
          <i class="icon-map-marker icon-white"></i>
          <?php echo $item['Receipt']['location']; ?>
        </span>

      <span class="date col-md-3">
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


        <span class="btn-group col-md-2">
          <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
            Options
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li>
            <?php echo $this->Html->link(
              'View',
              array(
                'controller'=>'receipts',
                'action'=>'view',
                $item['Receipt']['id']
              )
            ); ?>
            </li>
            <li>
            <?php echo $this->Html->link(
              'Edit',
              array(
                'controller'=>'receipts',
                'action'=>'edit',
                $item['Receipt']['id']
              )
            ); ?>
            </li>
            <li>
            <?php echo $this->Html->link(
              'Delete',
              array(
                'controller'=>'receipts',
                'action'=>'delete',
                $item['Receipt']['id']
              )
            ); ?>
            </li>
          </ul>
        </span>

    </li>
    <?php endforeach; ?>
  </ol>
  <?php endif; // data check ?>
