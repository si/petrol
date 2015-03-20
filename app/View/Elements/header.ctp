<div class="container">

<div class="menu-wrap">
	<nav class="menu" role="navigation">
		<ul class="nav navbar-nav">
		  <?php if($this->Session->read('Auth.User.id')=='') : ?>
		    <li><?php echo $this->Html->link('Sign In', array('controller'=>'users','action'=>'login')); ?></li>
		    <li><?php echo $this->Html->link('Register', array('controller'=>'users','action'=>'add')); ?></li>
		  <?php else: ?>
		    <li><?php echo $this->Html->link('Receipts', array('controller'=>'receipts','action'=>'index')); ?></li>
		    <li><?php echo $this->Html->link('Vehicles', array('controller'=>'vehicles','action'=>'index')); ?></li>
		    <li><?php echo $this->Html->link('Reports', array('controller'=>'reports','action'=>'index')); ?></li>
		    <li><?php echo $this->Html->link('Trains', array('controller'=>'train_tickets','action'=>'index')); ?></li>
		    <li><?php echo $this->Html->link('Parking', array('controller'=>'car_parks','action'=>'index')); ?></li>
		  <?php endif; ?>
		</ul>
		
		<?php if($this->Session->read('Auth.User.id')!='') : ?>
		<ul class="nav navbar-nav navbar-right">
		  <li class="dropdown">
		    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
		      <img src="http://www.gravatar.com/avatar/<?php echo md5( strtolower( trim( $this->Session->read('Auth.User.email') ) ) ); ?>?s=24">
		      <?php echo $this->Session->read('Auth.User.username'); ?>
		      <span class="caret"></span></a>
		    <ul class="dropdown-menu" role="menu">
		      <li><?php echo $this->Html->link('New Receipt', array('controller'=>'receipts','action'=>'add')); ?></li>
		      <li><?php echo $this->Html->link('New Report', array('controller'=>'reports','action'=>'add')); ?></li>
		      <li class="divider"></li>
		      <li><?php echo $this->Html->link('Profile', array('controller'=>'users','action'=>'view',$this->Session->read('Auth.User.id'))); ?></li>
		      <li><?php echo $this->Html->link('Vehicles', array('controller'=>'vehicles','action'=>'index')); ?></li>
		      <li class="divider"></li>
		      <li><?php echo $this->Html->link('Sign Out', array('controller'=>'users','action'=>'logout')); ?></li>
		    </ul>
		  </li>
		</ul>
		<?php endif; ?>
	</nav>
	<button class="close-button" id="close-button">Close Menu</button>
	<div class="morph-shape" id="morph-shape" data-morph-open="M-7.312,0H15c0,0,66,113.339,66,399.5C81,664.006,15,800,15,800H-7.312V0z;M-7.312,0H100c0,0,0,113.839,0,400c0,264.506,0,400,0,400H-7.312V0z">
		<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 100 800" preserveAspectRatio="none">
			<path d="M-7.312,0H0c0,0,0,113.839,0,400c0,264.506,0,400,0,400h-7.312V0z"/>
		</svg>
	</div>
</div>

<button class="menu-button" id="open-button">Open Menu</button>

<div class="content-wrap">

	<a class="brand" href="/">Petrol</a>



	<?php if($this->Session->check('Message.flash')) : ?>
	<div class="alert alert-warning">
	  <button type="button" class="close" data-dismiss="alert">&times;</button>
	  <?php echo $this->Session->flash(); ?>
	</div>
	<?php endif; ?>
