<?php echo $this->Form->create(null, array('class'=>'filters')); ?>
  <?php echo $this->Form->input('from', array('class'=>'date','label'=>'','placeholder'=>'From')); ?>
  <?php echo $this->Form->input('to', array('class'=>'date','label'=>'','placeholder'=>'To')); ?>
  <div class="btns">
    <?php echo $this->Form->button('Apply'); ?>
    <?php echo $this->Html->link('Clear', array('action'=>'index'), array('class'=>'btn')); ?>
  </div>
<?php echo $this->Form->end(); ?>

