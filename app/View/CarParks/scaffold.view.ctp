<article class="card">

	<div class="item-group">
		<h1 class="col-8">Parking №<?php echo $carPark['CarPark']['id']; ?></h1>
		<span class="col-4 price"><?php echo $this->Number->currency($carPark['CarPark']['cost'],'GBP'); ?></span>
	</div>
	<div class="item-group">
		<time class="col-6" datetime="<?php echo $this->Time->format('c', $carPark['CarPark']['created']); ?>"><?php echo $this->Time->format('d M y h:ia', $carPark['CarPark']['created']); ?></time>
		<time class="col-6" datetime="<?php echo $this->Time->format('c', $carPark['CarPark']['expires']); ?>"><?php echo $this->Time->format('d M y h:ia', $carPark['CarPark']['expires']); ?></time>
	</div>
	<div class="map">
		<span class="location">
			<?php echo $carPark['Location']['name']; ?>
		</span>
	</div>
</article>

<div class="input-group">
	<?php echo $this->Html->link('Edit', array('action'=>'edit', $carPark['CarPark']['id']), array('class'=>'btn')); ?>
	<?php echo $this->Html->link('Back', array('action'=>'index'), array('class'=>'btn')); ?>
</div>