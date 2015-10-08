<?php 
$receipt = $this->requestAction(['controller' => 'receipts', 'action' => 'latest'], ['return']);

if($receipt) {
	echo $receipt;
} else {
	echo 'No recent receipts. ' . $this->Html->link('Add one', array('controller'=>'receipts', 'action'=>'form'));
}