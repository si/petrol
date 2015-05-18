<?php $this->pageTitle = $user['User']['username']; ?>

<h1>
    <img src="http://www.gravatar.com/avatar/<?php echo md5( strtolower( trim( $this->Session->read('Auth.User.email') ) ) ); ?>?s=48" width="48" >
    <?php echo $user['User']['username']; ?>
</h1>
<h2><?php echo $user['User']['home_postcode']; ?></h2>

<?php //echo '<textarea class="code">'; var_dump($stats); echo '</textarea>'; ?>

<section class="stats">
<?php
if(count($stats)>0): 
    $stats = $stats[0][0];
    foreach($stats as $label=>$value) :
        if(strpos($label,'pound')>-1) $value = $this->Number->currency($value, 'GBP');
        $label = str_replace('_', ' ', $label);
        echo '<span><strong>' . $value . '</strong> ' . $label . '</span> ';
    endforeach;
endif;
?>
</section>

<table class="stats">
    <tbody>
        <tr>
            <td></td>
        </tr>
    </tbody>
</table>

<section id="profile">
    <ul>
      <li><?php echo $this->Html->link('Edit Profile', array('action'=>'edit',$user['User']['id'])); ?></li>
    </ul>
</section>

<section id="receipts">
    <h2><?php echo $this->Html->link('Receipts', array('controller'=>'receipts', 'action'=>'index')); ?></h2>
    <?php echo $this->element('receipts_table', array('data'=>$user['Receipt'])); ?>
</section>

<section id="vehicles">
    <h2><?php echo $this->Html->link('Vehicles', array('controller'=>'vehicles', 'action'=>'index')); ?></h2>
    <?php echo $this->element('vehicles_list', array('data'=>$user['Vehicle'])); ?>
</section>
