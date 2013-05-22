     ~ Petrol Receipt ~

    <?php echo $data['Receipt']['created']['day'].'/'.$data['Receipt']['created']['month'].'/'.$data['Receipt']['created']['year']. ' '.((int)$data['Receipt']['created']['hour']). ':'.$data['Receipt']['created']['min'].$data['Receipt']['created']['meridian']  . "\r"; ?>
   ---------------------------------------

          <?php echo $data['Receipt']['litres']; ?>li x £<?php echo $this->Number->precision($data['Receipt']['price_per_litre'],3); ?>

          ---------------------
            £<?php echo $this->Number->precision($data['Receipt']['cost'],2) . "\r"; ?>
          ---------------------
      