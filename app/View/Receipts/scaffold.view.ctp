<div class="hero-unit">
	<h1><?php echo $this->Number->currency($fillup['Fillup']['cost'],'GBP'); ?></h1>
	<h2><?php 
		echo $this->Number->precision($fillup['Fillup']['litres'],2) 
			. ' litres at ' 
			. '&pound;'. $this->Number->precision($fillup['Fillup']['price_per_litre'],3); 
	?></h2>
</div>

<?php
var_dump($fillup);
?>