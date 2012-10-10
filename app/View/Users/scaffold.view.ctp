<div class="hero-unit">
  <h1><?php echo $user['User']['username']; ?></h1>
  <h2><?php echo $user['User']['home_postcode']; ?></h2>
</div>

<div class="span12">
  <div class="row-fluid">

    <section id="profile" class="span4">
    <h2>Information</h2>
    <p><?php echo count($user['Fillup']); ?> fill ups 
    for <?php echo count($user['Vehicle']); ?> vehicles</p>
    <ul>
      <li><?php echo $this->Html->link('Edit Profile', array('action'=>'edit',$user['User']['id'])); ?></li>
    </ul>

    </section>

    <section id="fillups" class="span4">
    <h2>Fill Ups</h2>
    <?php 
    echo $this->element('fillups_list', array('data'=>$user['Fillup'])); 
    ?>
    <?php echo $this->Html->link('All Fillups', array('controller'=>'fillups', 'action'=>'index')); ?>
    </section>

    <section id="vehicles" class="span4">
    <h2>Vehicles</h2>
    <?php 
    echo $this->element('vehicles_list', array('data'=>$user['Vehicle']));
    ?>
    <?php echo $this->Html->link('All Vehicles', array('controller'=>'vehicles', 'action'=>'index')); ?>
    </section>


  </div>
</div>