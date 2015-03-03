<div class="users form">

<?php echo $this->Form->create('User', array('action'=>'login'));?>
    <fieldset>
        <legend>Sign in</legend>
        <div class="row-fluid">
        <?php
            echo $this->Form->input('username', array(
              'placeholder'=>'yourname',
              'div' => 'form-group',
              'class' => 'form-control',
            ));
            echo $this->Form->input('password', array(
              'div' => 'form-group', 
              'class' => 'form-control'
            ));
        ?>
        </div>
    </fieldset>
<?php 
    echo $this->Form->button('Login', array(
      'div'=>'form-group',
      'class' => 'btn btn-default',
    ));
    
  echo $this->Form->end();

?>
</div>