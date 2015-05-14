<?php
// app/Controller/UsersController.php
class UsersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add', 'logout');
    }

    public function login() {
        if ($this->Auth->login()) {
            $this->redirect($this->Auth->redirect());
        } else {
            $this->Session->setFlash(__('Invalid username or password, try again'));
        }
    }
    
    public function logout() {
        $this->redirect($this->Auth->logout());
    }
    
/*
    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

*/

    public function view($id = null) {
        $this->User->id = $this->Session->read('Auth.User.id');
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));

        $conditions = array(
            "Receipt.user_id" => $this->Session->read('Auth.User.id')
        );

        $this->set('stats', $this->User->Receipt->find('all', array(
            'fields'=> array(
                'ROUND(SUM(cost),2) AS pounds_spent',
                'ROUND(SUM(litres),2) AS litres',
                'MAX(odometer) - MIN(odometer) AS miles',
                'COUNT(*) AS receipts',
                'COUNT(DISTINCT location) AS locations',
            ),
            'conditions' => $conditions,
        )));
    }
    public function add() {
        if ($this->request->is('post')) {
          $this->User->create();
            if ($this->User->save($this->request->data)) {
              if ($this->Auth->login()) {
                $this->Session->setFlash(__('You are now registered.'));
                $this->redirect(array('controller'=>'vehicles','action' => 'index'));
              }
            } else {
                $this->Session->setFlash(__('There were problems registering. Please check your details and try again.'));
            }
        }
    }

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash_failure');
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
        }
 }
    
