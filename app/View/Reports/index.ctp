<!-- File: reports/index.ctp -->
<div class="hero-unit">
  <h1>Bad Driving</h1>
  <h2><?php echo count($reports); ?> reports of bad-driving so far</h2>
  <?php 
  echo $this->Html->link('Report Another',array('controller' => 'reports', 'action' => 'add'), array('class'=>'btn btn-primary btn-large'));
  ?>
</div>


<table>
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
/*
  Disabled Google Maps as using v2 API (now deprecated)
  
  // initialization of $my_locations array to show in map - you can do this in your controller.
  echo $this->Map->displaymap($my_locations,500,500); 
?>
<script type="text/javascript">onLoad();</script> 
<?php

*/

?>

<?php 
echo $this->Html->link('Add Report',array('controller' => 'reports', 'action' => 'add'), array('class'=>'btn btn-primary btn-large'));
?>

