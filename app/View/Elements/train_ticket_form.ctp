<?php
echo $this->Form->create('TrainTicket', array('class'=>'navbar-form'));

  if(isset($this->data['TrainTicket']['id'])) echo $this->Form->input('id', array('type' => 'hidden'));
?>
<fieldset>
  <legend>Stations</legend>
  <div class="row-fluid">
		<?php
			echo $this->Form->input('origin_id', array(
        'label' => 'Origin',
        'div' => 'input-group col-md-6',
        'class' => 'form-control',
			));
		?>
		<?php
			echo $this->Form->input('destination_id', array(
        'label' => 'Destination',
        'div' => 'input-group col-md-6',
        'class' => 'form-control',
      ));
		?>
    </div>

    <div class="row-fluid settings">
  		<?php
  			echo $this->Form->input('train_ticket_type_id', array(
          'div' => 'input-group col-md-3',
          'class' => 'form-control',
        ));
  		?>
      <?php
  			echo $this->Form->input('train_ticket_class_id', array(
          'div' => 'input-group col-md-3',
          'class' => 'form-control',
        ));
  		?>
      <?php
      echo $this->Form->input('train_ticket_restriction_id', array(
        'empty' => '-',
        'div' => 'input-group col-md-3',
        'class' => 'form-control',
      ));
      ?>
      <?php
      echo $this->Form->input('price', array(
        'div' => 'input-group col-md-3',
        'class' => 'form-control',
      ));
      ?>
    </div>

    <div class="row-fluid date">
      <?php
			echo $this->Form->input('created', array(
				'label' => 'When',
        'class' => 'form-control',
      ));
		?>
</fieldset>
<?php

// var_dump($this->Session);
		echo $this->Form->input('user_id', array(
				'type' => 'hidden',
				'value' => $this->Session->read('Auth.User.id'),
			));
?>
</div>


	<?php echo $this->Form->button('Save',array('class'=>'btn btn-large')); ?>
	<?php echo $this->Html->link('Cancel',array('action'=>'index'),array('class'=>'btn')); ?>

<?
	echo $this->Form->end();
?>
