<?php if($this->Session->read('Auth.User.id')=='') : ?>

    <h1>Ever wondered how much you spend on your daily travel? You need Commute</h1>
    <a class="btn btn-primary btn-large" href="/register">Sign up</a>

    <?php echo $this->element('user_login'); ?>
  
    <p>Created out of a personal interest for annual outgoings on commuting to work, Commute is a simple little web app for recording and monitoring the money spent on your car fuel, public transport and parking.</p>

    <p>If you're interested in an early invite to test the app, follow <a href="http://twitter.com/commutingcosts">@commutingcosts</a> on Twitter or register to our newsletter (we promise not to spam you or share it with nasty people).</p>

    <form action="http://unstyled.createsend.com/t/r/s/guryhi/" method="post" id="subForm" class="well form-inline">
        <fieldset>
            <legend>Engage</legend>
            <div class="input-group">
                <input type="email" name="cm-guryhi-guryhi" id="guryhi-guryhi" placeholder="you@domain.com" class="col-6" />
                <button type="submit" class="btn col-6">Subscribe</button>
            </div>
        </fieldset>
    </form>    

<?php else: ?>

  
    <h1>Hi <?php echo $this->Session->read('Auth.User.username'); ?></h1>
    <?php echo $this->Html->link('Not you?', array('controller'=>'users', 'action'=>'logout'), array('class'=>'')); ?>
    <p>You must be here to check these&hellip;</p>
    
    <?php echo $this->Html->link('Petrol', array('controller'=>'receipts'), array('class'=>'btn i petrol m')); ?>
    <?php echo $this->Html->link('Parking', array('controller'=>'parking_tickets'), array('class'=>'btn i parking m')); ?>
    <?php echo $this->Html->link('Trains', array('controller'=>'train_tickets'), array('class'=>'btn i trains m')); ?>

    <?php echo $this->element('active_parking_tickets'); ?>

<?php endif; ?>

