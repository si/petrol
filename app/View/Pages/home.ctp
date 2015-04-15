<?php if($this->Session->read('Auth.User.id')=='') : ?>

    <h1>Ever wondered how much you spend on fuel? You need Petrol</h1>
    <p>Created out of a personal interest for annual outgoings on commuting to work, Petrol is a simple little web app for recording and monitoring the money spent on your petrol.</p>
    <a class="btn btn-primary btn-large" href="/register">Sign up</a>

    <?php echo '<div class="col-md-4">' . $this->element('user_login') . '</div>'; ?>
  
<?php else: ?>

  
    <h1>Hi <?php echo $this->Session->read('Auth.User.username'); ?></h1>
    <?php echo $this->Html->link('Not you?', array('controller'=>'users', 'action'=>'logout'), array('class'=>'')); ?>
    <p>You must be here to check these&hellip;</p>
    
    <?php echo $this->Html->link('Receipts', array('controller'=>'receipts'), array('class'=>'btn btn-default btn-sm')); ?>
    <?php echo $this->Html->link('Parking', array('controller'=>'car_parks'), array('class'=>'btn btn-default btn-sm')); ?>
    <?php echo $this->Html->link('Trains', array('controller'=>'train_tickets'), array('class'=>'btn btn-default btn-sm')); ?>

<?php endif; ?>

    <p>If you're interested in an early invite to test the app, follow <a href="http://twitter.com/petrolapp">@petrolapp</a> on Twitter or register to our newsletter (we promise not to spam you or share it with nasty people).</p>

    <form action="http://unstyled.createsend.com/t/r/s/guryhi/" method="post" id="subForm" class="well form-inline">
        <fieldset>
            <legend>Engage</legend>
                <input type="email" name="cm-guryhi-guryhi" id="guryhi-guryhi" placeholder="you@domain.com" />
            <button type="submit" class="btn">Subscribe</button>
        </fieldset>
    </form>    
