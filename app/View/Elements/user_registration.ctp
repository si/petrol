
<div class="users form">
<?php echo $this->Form->create('User', array('action' => 'add'));?>
    <fieldset>
        <legend><?php echo __('Your Details'); ?></legend>
    <?php
        echo $this->Form->input('username', array(
          'placeholder'=>'yourname',
          'div' => 'input-group col-md-6',
          'class' => 'form-control',
        ));

        echo $this->Form->input('password', array(
          'div' => 'input-group col-md-6',
          'class' => 'form-control',
        ));

        echo $this->Form->input('email', array(
          'type'=>'email',
          'placeholder'=>'you@example.com',
          'div' => 'input-group col-md-6',
          'class' => 'form-control',
        ));

        echo $this->Form->input('role', array(
          'type' => 'hidden',
          'value' => 'Member',
        ));
    ?>
    </fieldset>
  <?php 
    echo $this->Form->button('Register', array(
      'div'=>'form-actions',
      'class' => 'btn btn-primary',
    ));

  echo $this->Form->end();
    
?>
</div>