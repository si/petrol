<?php if($this->Session->read('Auth.User.id')=='') : ?>
  <div class="container-fluid">
    <h1>Ever wondered how much you spend on fuel? You need Petrol</h1>
    <p>Created out of a personal interest for annual outgoings on commuting to work, Petrol is a simple little web app for recording and monitoring the money spent on your petrol.</p>
    <a class="btn btn-primary btn-large" href="/login">Sign up</a>
  </div>

  <?php echo $this->element('user_login'); ?>

<?php else: ?>

  
    <h1>Hi <?php echo $this->Session->read('Auth.User.username'); ?></h1>
    <?php echo $this->Html->link('Not you?', array('controller'=>'users', 'action'=>'logout'), array('class'=>'')); ?>
    <p>You must be here to check these&hellip;</p>
    
    <?php echo $this->Html->link('Receipts', array('controller'=>'receipts'), array('class'=>'btn btn-default btn-sm')); ?>
    <?php echo $this->Html->link('Parking', array('controller'=>'car_parks'), array('class'=>'btn btn-default btn-sm')); ?>
    <?php echo $this->Html->link('Trains', array('controller'=>'train_tickets'), array('class'=>'btn btn-default btn-sm')); ?>

<?php endif; ?>

<div class="container-fluid">
  <div class="span6">
    <h2>Coming soon!</h2>
    <p>The app is currently in development with no official launch date but we're hoping to roll out the first release in <strong>Summer 2012</strong>.</p>
    <p>If you're interested in an early invite to test the app, follow <a href="http://twitter.com/petrolapp">@petrolapp</a> on Twitter or register to our newsletter (we promise not to spam you or share it with nasty people).</p>
  </div>
  <div class="span6">
    <form action="http://unstyled.createsend.com/t/r/s/guryhi/" method="post" id="subForm" class="well form-inline">
      <input type="email" name="cm-guryhi-guryhi" id="guryhi-guryhi" placeholder="you@domain.com" />
      <button type="submit" class="btn">Subscribe</button>
    </form>    
  </div>
</div>
