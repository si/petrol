<div class="users form">

<?php echo $this->Form->create('User');?>
    <fieldset>
        <legend><?php echo __('Please enter your username and password'); ?></legend>
    <?php
        echo $this->Form->input('username', array(
          'placeholder'=>'yourname',
          'div' => 'input-prepend',
          'between' => '<span class="add-on">@</span>',
          'class' => 'input-medium',
        ));
        echo $this->Form->input('password');
    ?>
    </fieldset>
<?php 
    echo $this->Form->button('Login', array(
      'div'=>'form-actions',
      'class' => 'btn btn-primary',
    ));
    
  echo $this->Form->end();

?>
</div>