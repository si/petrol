  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">

        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <a class="navbar-brand" href="/">Petrol</a>

      </div>

      <div id="navbar" class="navbar-collapse collapse">

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

      </div><!-- #navbar -->
    </div><!-- .container -->
  </nav>

  <?php if($this->Session->check('Message.flash')) : ?>
  <div class="alert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <?php echo $this->Session->flash(); ?>
  </div>
  <?php endif; ?>
