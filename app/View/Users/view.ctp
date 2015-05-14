<?php $this->pageTitle = $user['User']['username']; ?>

<h1><?php echo $user['User']['username']; ?></h1>
<h2><?php echo $user['User']['home_postcode']; ?></h2>

<section id="profile">
    <p><?php echo count($user['Receipt']); ?> fill ups 
    for <?php echo count($user['Vehicle']); ?> vehicles</p>
    <ul>
      <li><?php echo $this->Html->link('Edit Profile', array('action'=>'edit',$user['User']['id'])); ?></li>
    </ul>
</section>

<section id="receipts">
    <h2><?php echo $this->Html->link('Receipts', array('controller'=>'receipts', 'action'=>'index')); ?></h2>
    <?php echo $this->element('receipts_table', array('data'=>$user['Receipt'])); ?>
</section>

<section id="vehicles">
    <h2><?php echo $this->Html->link('Vehicles', array('controller'=>'vehicles', 'action'=>'index')); ?></h2>
    <?php echo $this->element('vehicles_list', array('data'=>$user['Vehicle'])); ?>
</section>
