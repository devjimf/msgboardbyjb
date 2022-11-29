<?php

App::uses('AppController', 'Controller');

class UsersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('register', 'logout');
    }

    public function welcome(){

    }

    public function index() {
        $user = $this->User->findById(AuthComponent::user('id'));
		$this->set(compact('user'));
    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->findById($id));
    }

    public function login() {

        if($this->Session->check('Auth.User')){
			$this->redirect(array('controller' => 'messages', 'action' => 'index'));
		}

        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                
                $this->request->data['User']['date_lastlog_in'] = date("Y-m-d H:i:s");
				$this->User->save($this->request->data);

                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }
    
    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    public function register() {

        if($this->Session->check('Auth.User')){
			$this->redirect(array('controller' => 'messages', 'action' => 'index'));
		}

        if ($this->request->is('post')) {
            $this->User->create();


            $this->request->data['User']['profilepic'] = 'NoPic.png';
            $this->request->data['User']['date_lastlog_in'] = date("Y-m-d H:i:s");

            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved'));
                if($this->Auth->login()){
                    return $this->redirect(array('controller'=>'users','action' => 'welcome'));
                }
            }
            $this->Flash->error(
                __('The user could not be saved. Please, try again.')
            );
        }
    }

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $frmData = $this->request->data['User'];
			$tmp = $frmData['Upload']['tmp_name'];

			//Get the data from form
			$hash = rand();
			$date = date("Ymd");
			$image = $date.$hash."-".$frmData['Upload']['name'];

			//Path to store upload image
			$target = WWW_ROOT.'img'.DS;
        	$target = $target.basename($image);

			if(move_uploaded_file($tmp, $target)) {
				$this->request->data['User']['profilepic'] = $image;
			}

            $birthday = $this->request->data['User']['birthday'];
            $today = date("Y-m-d");
            $diff = date_diff(date_create($birthday), date_create($today));
            $age = $diff->format('%y');
            
            $this->request->data['User']['age'] = $age;

            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                __('The user could not be saved. Please, try again.')
            );
        } else {
            $this->request->data = $this->User->findById($id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        // Prior to 2.5 use
        // $this->request->onlyAllow('post');

        $this->request->allowMethod('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Flash->success(__('User deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('User was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }

    public function profile($id = null){
        $user = $this->User->findById(AuthComponent::user('id'));

    
		if(!$user['User']['birthday'] == null){
			$user['User']['birthday'] = date('F j\, Y', strtotime($user['User']['birthday']));
		}

		$user['User']['date_created'] = date('F j\, Y ha', strtotime($user['User']['date_created']));
		$user['User']['date_lastlog_in'] = date('F j\, Y ha', strtotime($user['User']['date_lastlog_in']));

		$this->set(compact('user'));
    }

    public function account(){
        $id = AuthComponent::user('id');

		 //pr($id);
		 //pr($this->User->findById($id));

		$user = $this->User->findById($id);

		if ($this->request->is('post') || $this->request->is('put')) {
			$this->User->id = $id;
			pr($this->User->id);
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been updated'));
				$this->redirect(array('action' => 'account', $id));
			}else{
				$this->Session->setFlash(__('Unable to update your user.'));
			}
		}

		if (!$this->request->data) {
			$this->request->data = $user;
		}
    }
}