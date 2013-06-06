<?php echo $this->Html->script('http://maps.google.com/maps/api/js?sensor=true'); ?>

  <h1>Bad Driving</h1>
  <h2><?php echo count($reports); ?> reports of bad-driving so far</h2>
  <?php 
  echo $this->Html->link('Report Another',array('controller' => 'reports', 'action' => 'add'), array('class'=>'btn btn-primary btn-large'));
  ?>


<table class="table">
	<tr>
		<th>Reg Plate</th>
		<th>Location</th>
		<th>Tags</th>
		<th>When</th>
		<th>Actions</th>
	</tr>

	<?php 

  $my_locations=array();
	
	
	foreach ($reports as $report): 
	
    $my_locations[] = array('address' => $report['Report']['location'], 'title' => $report['Report']['reg_plate']);
	
	 
	?>
	<tr>
		<td>
			<?php echo $this->Html->link($report['Report']['reg_plate'], "/reports/view/".$report['Report']['id']); ?>
		</td>
		<td>
		<i class="icon-map-marker"></i>
		<?php echo $report['Report']['location']; ?>
		</td>
		<td><?php echo $report['Report']['tags']; ?></td>
		<td>
		<i class="icon-time"></i>
		<?php echo $this->Time->niceShort($report['Report']['created']); ?>
		</td>
		<td>
		<?php echo $this->Html->link('Edit', array('action' => 'edit', $report['Report']['id']))?>
		<?php echo $this->Html->link('Delete', array('action' => 'delete', $report['Report']['id']), null, 'Are you sure?' )?>
		</td>
	</tr>
	<?php endforeach; ?>

</table>

<?php 
$map_options = array(
  'id' => 'map_canvas',
  'width' => '800px',
  'height' => '300px',
//  'zoom' => 7,
//  'type' => 'HYBRID',
  'localize' => true,
/*
  'latitude' => 40.69847032728747,
  'longitude' => -1.9514422416687,
*/
  'address' => 'NN4 7TS',
  'marker' => true,
  'markerTitle' => 'This is my position',
//  'markerIcon' => 'http://google-maps-icons.googlecode.com/files/home.png',
//  'markerShadow' => 'http://google-maps-icons.googlecode.com/files/shadow.png',
//  'infoWindow' => true,
//  'windowText' => 'My Position'
);
echo $this->GoogleMap->map($map_options); ?>

<?php // echo $this->GoogleMap->addMarker("map_canvas", 1, "1 Infinite Loop, Cupertino, California"); ?>

<?php 
echo $this->Html->link('Add Report',array('controller' => 'reports', 'action' => 'add'), array('class'=>'btn btn-primary btn-large'));
?>

