
<div class="users form">
<?php echo $this->Form->create('User');?>
    <fieldset>
        <legend><?php echo __('Your Details'); ?></legend>
    <?php
        echo $this->Form->input('username');

        echo $this->Form->input('password');
/*
        echo $this->Form->input('conf_password', array(
        	'label'=>'Confirm password',
        ));
*/

        echo $this->Form->input('email');

        echo $this->Form->input('role', array(
          'type' => 'hidden',
          'value' => 'Member',
        ));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Register'));?>
</div>