<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php echo $title_for_layout; ?> – Commute</title>

	<link href="/img/petrol-touch-icon.png" type="image/x-icon" rel="icon" />
	<link href="/img/petrol-touch-icon.png" type="image/x-icon" rel="shortcut icon" />
	<link rel="apple-touch-icon" sizes="114x114" href="/img/petrol-touch-icon.png" />
	<?php
		$css = array('bootstrap.min','app');
		echo $this->Html->css($css);
	?>
</head>
