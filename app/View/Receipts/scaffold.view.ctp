<?php $this->pageTitle = "Receipt #" . $receipt['Receipt']['id']; ?>

<?php echo $this->element('receipt_view'); ?>

<div class="input-group">
	<?php echo $this->Html->link('Edit',array('action'=>'add',$receipt['Receipt']['id']),array('class'=>'btn col-4')); ?>
	<?php echo $this->Html->link('Delete',array('action'=>'delete',$receipt['Receipt']['id']),array('class'=>'btn col-4')); ?>
	<?php echo $this->Html->link('Wallet',array('action'=>'index'),array('class'=>'btn col-4')); ?>
</div>
