<?php
class AppController extends Controller {

	var $helpers = array('Html','Form','Time','Session','Number');

  var $components = array(
    'Session',
    'Auth' => array(
      'loginRedirect' => array('controller' => 'fillups', 'action' => 'index'),
      'logoutRedirect' => array('controller' => 'pages', 'action' => 'display', 'holding'),
    ),
  );

  function beforeFilter() {
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
