
<div class="users form">
<?php echo $this->Form->create('User');?>
    <fieldset>
        <legend><?php echo __('Your Details'); ?></legend>
    <?php
        echo $this->Form->input('username', array(
          'placeholder'=>'yourname',
          'div' => 'input-prepend',
          'between' => '<span class="add-on">@</span>',
          'class' => 'input-medium',
        ));

        echo $this->Form->input('password');
/*
        echo $this->Form->input('conf_password', array(
        	'label'=>'Confirm password',
        ));
*/

        echo $this->Form->input('email', array(
          'type'=>'email',
          'placeholder'=>'you@example.com',
          'class' => 'input-large',
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