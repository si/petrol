<div class="hero-unit">
  <h1><?php echo $vehicle['Vehicle']['registration']; ?></h1>
  <h2><?php echo $vehicle['Vehicle']['manufacturer'] . ' ' . $vehicle['Vehicle']['model']; ?></h2>
</div>

<h2>Recent Fillups</h2>
<?php
  echo $this->element('fillups_list', array('data'=>$vehicle['Fillup']));
?>