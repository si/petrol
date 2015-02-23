<div class="users form">

<?php echo $this->Form->create('User');?>
    <fieldset>
        <legend><?php echo __('Please enter your username and password'); ?></legend>
        <div class="row-fluid">
        <?php
            echo $this->Form->input('username', array(
              'placeholder'=>'yourname',
              'div' => 'input-group col-md-6',
              'class' => 'form-control',
            ));
            echo $this->Form->input('password', array(
              'div' => 'input-group col-md-6', 
              'class' => 'form-control'
            ));
        ?>
        </div>
    </fieldset>
<?php 
    echo $this->Form->button('Login', array(
      'div'=>'form-actions',
      'class' => 'btn btn-primary',
    ));
    
  echo $this->Form->end();

?>
</div>