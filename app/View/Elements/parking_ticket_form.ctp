<?php
echo $this->Form->create('ParkingTicket', array('class'=>'navbar-form'));

  if(isset($this->data['ParkingTicket']['id'])) echo $this->Form->input('id', array('type' => 'hidden'));
?>
<fieldset>
  <legend>Details</legend>
  <div class="input-group">
		<?php
      echo $this->Form->input('location', array(
        'label' => 'Location',
        'type' => 'text',
        'value' => (isset($this->data['Location']['name'])) ? $this->data['Location']['name'] : '',
        'placeholder' => (isset($locations) && count($locations)>0) ? 'eg. ' . $locations[1] : 'Start typing…',
        'list'=>'location_history',
        'div' => 'col-12 location',
      ));

      if(isset($locations) && count($locations)>0) :
      ?>
      <datalist id="location_history">
        <?php foreach($locations as $id => $location) : ?>
         <option value="<?php echo $location; ?>">
        <?php endforeach; ?>
      </datalist>
      <?php
      endif;
		?>
  </div>

  <div class="input-group">
    <?php
      echo $this->Form->input('duration_hours', array(
        'label' => 'Duration',
        'div' => 'col-4',
        'type' => 'number',
      ));
    ?>
    <?php
      echo $this->Form->input('duration_units', array(
        'label' => 'Units',
        'div' => 'col-4',
        'options' => array(
          'h' => 'hours',
          'd' => 'days',
          'w' => 'weeks',
        )
      ));
    ?>
    <?php
      echo $this->Form->input('cost', array(
        'div' => 'col-4',
        'placeholder' => '£',
      ));
    ?>
  </div>

  <div class="input-group">
  <?php
    echo $this->Form->input('ParkingTicket.created.hour', array(
        'type' => 'number',
        'name' => 'data[ParkingTicket][created][hour]',
      'div' => 'col-3',
      'label' => 'Time',
      'placeholder' => 'HH',
      'max' => '23'
    ));
    echo $this->Form->input('ParkingTicket.created.minute', array(
        'type' => 'number',
        'name' => 'data[ParkingTicket][created][minute]',
      'div' => 'col-3 no-label',
      'label' => '',
      'placeholder' => 'MI',
      'max' => '59'
    ));
    echo $this->Form->input('ParkingTicket.created.day', array(
        'type' => 'number',
        'name' => 'data[ParkingTicket][created][day]',
      'div' => 'col-3',
      'label' => 'Date',
      'placeholder' => 'DD',
      'max' => '31'
    ));
    echo $this->Form->input('ParkingTicket.created.month', array(
        'type' => 'number',
        'name' => 'data[ParkingTicket][created][month]',
      'div' => 'col-3 no-label',
      'label' => '',
      'placeholder' => 'MM',
      'max' => '12'

    ));
  ?>
  </div>


</fieldset>

<div class="input-group">
  <?php echo $this->Form->button('Save',array('class'=>'btn btn-primary')); ?>
  <?php echo $this->Html->link('Cancel',array('action'=>'index'),array('class'=>'btn')); ?>
</div>

<?php
	echo $this->Form->end();
?>
