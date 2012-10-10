<?php
class Report extends AppModel {

  var $name = 'Report';
  var $order = array('created DESC');
  
	var $validate = array(
		'reg_plate' => array(
			'rule' => 'notEmpty'
		),
		'tags' => array(
			'rule' => 'notEmpty'
		)
  );
}