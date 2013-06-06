<?php
echo $this->Form->create('Report', array('type' => 'file'));
  if(isset($this->data['Report']['id'])) echo $this->Form->input('id', array('type' => 'hidden'));
?>
  <fieldset>
    <?
    echo $this->Form->input('media', array('type'=>'file','label'=>'Photo or Video'));
    echo $this->Form->input('reg_plate', array('label'=>'Vehicle Registration','placeholder'=>'AA12 AAA'));
    echo $this->Form->input('vehicle_details', array('label'=>'Vehicle Details'));
    echo $this->Form->input('location', array('label'=>'Where?','placeholder'=>'Postcode, street name, area'));
    echo $this->Form->input('tags', array('label'=>'Reasons (comma separated)'));
    echo $this->Form->input('when', array('label'=>'When'));
    echo $this->Form->input('user_id', array(
    		'type' => 'hidden',
    		'value' => $this->Session->read('Auth.User.id'),
    	));
    echo $this->Form->submit('Report');
    ?>
  </fieldset>
<?php
echo $this->Form->end();
?>