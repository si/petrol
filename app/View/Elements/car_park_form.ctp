<?php
echo $this->Form->create('CarPark', array('class'=>'navbar-form'));

  if(isset($this->data['CarPark']['id'])) echo $this->Form->input('id', array('type' => 'hidden'));
?>
<fieldset>
  <legend>Details</legend>
  <div class="row-fluid">
		<?php
			echo $this->Form->input('location_id', array(
        'label' => 'Location',
        'div' => 'input-group col-md-12',
        'class' => 'form-control',
        'options' => $locations
			));
		?>
    </div>

    <div class="row-fixed settings">
      <?php
        echo $this->Form->input('duration_hours', array(
          'label' => 'Duration',
          'div' => 'input-group col-md-3',
          'class' => 'form-control',
        ));
      ?>
      <?php
        echo $this->Form->input('duration_units', array(
          'label' => 'Units',
          'div' => 'input-group col-md-3',
          'class' => 'form-control',
          'options' => array(
            'h' => 'hours',
            'd' => 'days',
            'w' => 'weeks',
          )
        ));
      ?>
  		<?php
  			echo $this->Form->input('cost', array(
          'div' => 'input-group col-md-3',
          'class' => 'form-control',
          'placeholder' => '£',
        ));
  		?>
    </div>

    <div class="row-fluid date">
      <?php
			echo $this->Form->input('created', array(
        'class' => 'form-control',
        'div' => 'input-group col-md-6',
        'label' => 'When',
        'separator' => '',
      ));
		?>
</fieldset>
</div>
<?php echo $this->Form->button('Save',array('class'=>'btn btn-large')); ?>
<?php echo $this->Html->link('Cancel',array('action'=>'index'),array('class'=>'btn')); ?>

<?php
	echo $this->Form->end();
?>
