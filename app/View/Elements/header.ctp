  <div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container-fluid">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <a class="brand" href="/">Petrol</a>
        
        <?php if($this->Session->read('Auth.User.id')!='') : ?>
        <div class="btn-group pull-right">
          <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="icon-user"></i> 
            <?php echo $this->Session->read('Auth.User.username'); ?>
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li><?php echo $this->Html->link('New Fill Up', array('controller'=>'fillups','action'=>'add')); ?></li>
            <li><?php echo $this->Html->link('New Report', array('controller'=>'reports','action'=>'add')); ?></li>
            <li class="divider"></li>
            <li><?php echo $this->Html->link('Profile', array('controller'=>'users','action'=>'view',$this->Session->read('Auth.User.id'))); ?></li>
            <li><?php echo $this->Html->link('Vehicles', array('controller'=>'vehicles','action'=>'index')); ?></li>
            <li class="divider"></li>
            <li><?php echo $this->Html->link('Sign Out', array('controller'=>'users','action'=>'logout')); ?></li>
          </ul>
        </div>
        <?php endif; ?>
        
        <div class="nav-collapse">
          <ul class="nav">
            <li class="active"><a href="/">Home</a></li>
            <?php if($this->Session->read('Auth.User.id')=='') : ?>
            <li><?php echo $this->Html->link('Sign In', array('controller'=>'users','action'=>'login')); ?></li>
            <li><?php echo $this->Html->link('Register', array('controller'=>'users','action'=>'add')); ?></li>
            <?php else: ?>
            <li><?php echo $this->Html->link('Fill Ups', array('controller'=>'fillups','action'=>'index')); ?></li>
            <li><?php echo $this->Html->link('Vehicles', array('controller'=>'vehicles','action'=>'index')); ?></li>
            <li><?php echo $this->Html->link('Reports', array('controller'=>'reports','action'=>'index')); ?></li>
            <?php endif; ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
  </div>

  <?php if($this->Session->check('Message.flash')) : ?>
  <div class="alert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <?php echo $this->Session->flash(); ?>
  </div>
  <?php endif; ?>