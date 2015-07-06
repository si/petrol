<h1>Locations</h1>
<ul>
<?php foreach($locations as $location): ?>
	<li>
		<?php echo $this->Html->link($location['Location']['name'], array('action'=>'view', $location['Location']['id'])); ?> 
    	<small>
    		<?php echo $location['Location']['town']; ?> 
    		<?php if($location['Location']['lat']!='') echo $location['Location']['lat'] . ',' . $location['Location']['long']; ?> 
    	</small>
	</li>
<?php endforeach; ?>
</ul>
