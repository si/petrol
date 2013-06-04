<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $title_for_layout; ?> – Petrol</title>
	<link href="/img/petrol-touch-icon.png" type="image/x-icon" rel="icon" />
	<link href="/img/petrol-touch-icon.png" type="image/x-icon" rel="shortcut icon" />
	<link rel="apple-touch-icon" sizes="114x114" href="/img/petrol-touch-icon.png" />
	
	<?php echo $this->Html->css('http://fonts.googleapis.com/css?family=Fugaz+One'); ?>
	<?php
	$css = array('app','bootstrap','bootstrap-responsive','jquery-ui-1.8.18.custom');
	$css = array(
  	'http://twitter.github.com/bootstrap/assets/css/bootstrap.css',
  	'http://twitter.github.com/bootstrap/assets/css/bootstrap-responsive.css',
  	'http://code.jquery.com/mobile/1.1.1/jquery.mobile-1.1.1.css',
  	'app',
	);
	
	echo $this->Html->css($css);
//	echo $this->Html->script(array('bootstrap.min','modernizr','jquery-1.7.1.min','jquery-ui-1.8.18.custom.min','app')); 
?>

</head>

