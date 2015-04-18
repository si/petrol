<h1>Parking Ticket №<?php echo $carPark['CarPark']['id']; ?></h1>

<div class="vitals">
	<time datetime="<?php echo $this->Time->format('c', $carPark['CarPark']['created']); ?>"><?php echo $this->Time->format('d M y h:ia', $carPark['CarPark']['created']); ?></time>
	<span class="location"><?php echo $carPark['Location']['name']; ?></span>
	<span class="price"><?php echo $this->Number->currency($carPark['CarPark']['cost'],'GBP'); ?></span>
</div>


<div class="input-group">
	<?php echo $this->Html->link('Edit', array('action'=>'edit', $carPark['CarPark']['id']), array('class'=>'btn')); ?>
	<?php echo $this->Html->link('Back', array('action'=>'index'), array('class'=>'btn')); ?>
</div>