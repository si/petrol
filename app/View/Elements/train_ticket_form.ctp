<?php
echo $this->Form->create('TrainTicket', array('class'=>'navbar-form'));

  if(isset($this->data['TrainTicket']['id'])) echo $this->Form->input('id', array('type' => 'hidden'));
?>
<fieldset>
  <legend>Stations</legend>
  <div class="input-group">
		<?php
			echo $this->Form->input('origin_id', array(
        'label' => 'Origin',
        'div' => 'col-6',
        'options' => $train_stations,
			));
		?>
		<?php
			echo $this->Form->input('destination_id', array(
        'label' => 'Destination',
        'div' => 'col-6',
        'options' => $train_stations,
      ));
		?>
    </div>
</fieldset>

<fieldset>
  <legend>Ticket</legend>

    <div class="input-group">
  		<?php
  			echo $this->Form->input('train_ticket_type_id', array(
          'label' => 'Type',
          'div' => 'col-6',
          'options' => $train_ticket_types,
        ));
  		?>
      <?php
  			echo $this->Form->input('train_ticket_class_id', array(
          'label' => 'Class',
          'div' => 'col-6',
          'options' => $train_ticket_classes,
        ));
  		?>
    </div>

    <div class="input-group">
      <?php
        echo $this->Form->input('train_ticket_restriction_id', array(
          'label' => 'Restrictions',
          'empty' => '-',
          'div' => 'col-6',
          'options' => $train_ticket_restrictions,
        ));
      ?>
      <?php
        echo $this->Form->input('price', array(
          'label' => 'Price',
          'div' => 'col-6',
          'class' => 'price'
        ));
      ?>
    </div>
</fieldset>

<fieldset>
  <legend>When</legend>

  <div class="input-group">
  <?php
    echo $this->Form->input('TrainTicket.created.hour', array(
      'type' => 'number',
      'name' => 'data[TrainTicket][created][hour]',
      'div' => 'col-3',
      'label' => 'Time',
      'placeholder' => 'HH'
    ));
    echo $this->Form->input('TrainTicket.created.minute', array(
      'type' => 'number',
      'name' => 'data[TrainTicket][created][minute]',
      'div' => 'col-3 no-label',
      'label' => '',
      'placeholder' => 'MI'
    ));
    echo $this->Form->input('TrainTicket.created.day', array(
      'type' => 'number',
      'name' => 'data[TrainTicket][created][day]',
      'div' => 'col-3',
      'label' => 'Date',
      'placeholder' => 'DD'
    ));
    echo $this->Form->input('TrainTicket.created.month', array(
      'type' => 'number',
      'name' => 'data[TrainTicket][created][month]',
      'div' => 'col-3 no-label',
      'label' => '',
      'placeholder' => 'MM'
    ));
  ?>
  </div>

</fieldset>

<div class="input-group">
	<?php echo $this->Form->button('Save',array('class'=>'btn btn-large')); ?>
	<?php echo $this->Html->link('Cancel',array('action'=>'index'),array('class'=>'btn')); ?>
</div>

<?
	echo $this->Form->end();
?>
