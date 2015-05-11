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
			echo $this->Form->input('created', array(
        'div' => 'col-12',
        'label' => 'When',
        'separator' => '',
      ));
		?>
  </div>

</fieldset>

<?php echo $this->Form->button('Save',array('class'=>'btn btn-large')); ?>
<?php echo $this->Html->link('Cancel',array('action'=>'index'),array('class'=>'btn')); ?>

<?php
	echo $this->Form->end();
?>
