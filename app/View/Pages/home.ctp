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

  
    <h1>
        Hi <?php echo $this->Session->read('Auth.User.username'); ?>
    </h1>

    <ul class="tabs">
        <li><a href="#parking" class="i parking m">Parking</a></li>
        <li><a href="#trains" class="i trains m">Trains</a></li>
        <li><a href="#fuel" class="i petrol m">Fuel</a></li>
    </ul>

    <section class="tab" id="parking">
        <h2>Parking Tickets</h2>
        <?php echo $this->element('active_parking_tickets'); ?>
        <?php echo $this->Html->link('More parking tickets…', array('controller'=>'parking_tickets'), array('class'=>'btn')); ?>
    </section>

    <section class="tab" id="trains">
        <h2>Trains</h2>
        <?php echo $this->element('active_train_ticket'); ?>
        <?php echo $this->Html->link('More train tickets…', array('controller'=>'train_tickets'), array('class'=>'btn')); ?>
    </section>

    <section class="tab" id="fuel">
        <h2>Fuel</h2>
        <p>(Recent stats will show here)</p>
        <?php echo $this->Html->link('More fuel receipts…', array('controller'=>'receipts'), array('class'=>'btn')); ?>
    </section>

<?php endif; ?>

