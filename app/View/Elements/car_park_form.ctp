<?php
echo $this->Form->create('CarPark', array('class'=>'navbar-form'));

  if(isset($this->data['CarPark']['id'])) echo $this->Form->input('id', array('type' => 'hidden'));
?>
<fieldset>
  <legend>Details</legend>
  <div class="input-group">
		<?php
			echo $this->Form->input('location_id', array(
        'label' => 'Location',
        'div' => 'col-8',
        'options' => $locations
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
      echo $this->Form->input('duration_hours', array(
        'label' => 'Duration',
        'div' => 'col-6',
        'type' => 'number',
      ));
    ?>
    <?php
      echo $this->Form->input('duration_units', array(
        'label' => 'Units',
        'div' => 'col-6',
        'options' => array(
          'h' => 'hours',
          'd' => 'days',
          'w' => 'weeks',
        )
      ));
    ?>
  </div>

  <div class="input-group">
  <?php
    echo $this->Form->input('CarPark.created.hour', array(
        'type' => 'number',
        'name' => 'data[CarPark][created][hour]',
      'div' => 'col-3',
      'label' => 'Time',
      'placeholder' => 'HH',
      'max' => '23'
    ));
    echo $this->Form->input('CarPark.created.minute', array(
        'type' => 'number',
        'name' => 'data[CarPark][created][minute]',
      'div' => 'col-3 no-label',
      'label' => '',
      'placeholder' => 'MI',
      'max' => '59'
    ));
    echo $this->Form->input('CarPark.created.day', array(
        'type' => 'number',
        'name' => 'data[CarPark][created][day]',
      'div' => 'col-3',
      'label' => 'Date',
      'placeholder' => 'DD',
      'max' => '31'
    ));
    echo $this->Form->input('CarPark.created.month', array(
        'type' => 'number',
        'name' => 'data[CarPark][created][month]',
      'div' => 'col-3 no-label',
      'label' => '',
      'placeholder' => 'MM',
      'max' => '12'

    ));
  ?>
  </div>


</fieldset>

<?php echo $this->Form->button('Save',array('class'=>'btn btn-large')); ?>
<?php echo $this->Html->link('Cancel',array('action'=>'index'),array('class'=>'btn')); ?>

<?php
	echo $this->Form->end();
?>
