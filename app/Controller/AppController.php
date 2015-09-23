<?php
class AppController extends Controller {

	var $helpers = array('Html','Form','Time','Session','Number');

  var $components = array(
    'Email',
    'Session',
    'Auth' => array(
      'loginRedirect' => array('controller' => 'pages', 'action' => 'display', 'home'),
      'logoutRedirect' => array('controller' => 'pages', 'action' => 'display', 'home'),
    ),
  );

  function beforeFilter() {
    $this->Email->smtpOptions = array(
      'port'=>'587',
      'timeout'=>'30',
      'host' => 'smtp.sendgrid.net',
      'username'=>'simon.jobling@gmail.com',
      'password'=>'B34tr1c3',
      'client' => 'dev.commutingcosts.com'
    );
    $this->Email->from    = 'Commute <receipts@commutingcosts.com>';

  }

	public function beforeRender() {
    // only compile it on development mode
/*
    if (Configure::read('debug') > 0) {
      // import the file to application
      App::import('Vendor', 'lessc');
      // set the LESS file location
      $less = ROOT . DS . APP_DIR . DS . 'webroot' . DS . 'less' . DS . 'main.less';
      // set the CSS file to be written
      $css = ROOT . DS . APP_DIR . DS . 'webroot' . DS . 'css' . DS . 'main.css';
      // compile the file
      lessc::ccompile($less, $css);
		}
*/
		parent::beforeRender();
	}

}
