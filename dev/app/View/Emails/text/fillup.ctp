Receipt
-------

Capacity  | Price  |  Total
<?php echo $data['Fillup']['litres']; ?>li  |  <?php echo $this->Number->currency($data['Fillup']['price_per_litre']); ?> | <?php echo $this->Number->currency($data['Fillup']['cost'],'GBP'); ?>
