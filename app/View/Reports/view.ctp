<!-- File: reports/view.ctp -->

<h1><?php echo $report['Report']['reg_plate']?></h1>

<p>Location: <?php echo $report['Report']['location']?></p>
<p>Reasons: <?php echo $report['Report']['tags']?></p>

<?php
/*
  Disabled Google Maps as using v2 API (now deprecated)

  // initialization of $my_locations array to show in map - you can do this in your controller.
  $my_locations=array();
  $my_locations[1]['address']=$report['Report']['location'];
  $my_locations[1]['title']=$report['Report']['reg_plate'];
  echo $map->displaymap($my_locations,500,500); 
?>
<script type="text/javascript">onLoad();</script> 
*/
?>
  
<p>When: <?php echo $this->Time->nice($report['Report']['created']); 
  
?></p>
