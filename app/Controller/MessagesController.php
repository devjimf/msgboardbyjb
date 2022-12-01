<?php

App::uses('AppController', 'Controller');

class MessagesController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login','register', 'thankyou');

		date_default_timezone_set('Asia/Manila');
		$this->loadmodel('User');
		$this->loadModel('Reply');
		$this->loadModel('Message');
    }

    
	public $components = array('Paginator', 'Session', 'Flash');

    public function index(){
        
    }

    public function messages(){

    $user_id = AuthComponent::user('id');

    $userdata = $this->User->query("
    SELECT id, username, profilepic FROM Users;
     ");

        $messages = $this->Message->query("
    SELECT * FROM Messages as Messages WHERE 
    `from_user_id` = $user_id 
    OR 
    `to_user_id` = $user_id 
    ORDER BY date_created DESC 
    LIMIT 5;
     ");
        //pr($messages);
        
        $this->set(compact('messages'));
        $this->set(compact('userdata'));

        $this->loadModel('User');
		$data = $this->User->find('list', array(
				'fields' => array('id', 'username'),
			));
		$this->set('users',$data);

        // $check = $this->Message->query('SELECT EXISTS(SELECT * FROM Messages WHERE ( from_user_id = '. $to_user 
		// 	. ' AND to_user = ' . $from_user . ') OR (from_user = ' . $from_user 
		// 	. ' AND to_user = ' . $to_user . '))');
		// 	pr($check);


    }

    public function newmessage(){
        // if ($this->request->is('post')) {

        //     $this->Message->create();
        //     var_dump($this->request->data);
            
        //     if ($this->Message->save($this->request->data)) {
        //         $this->Flash->success(__('Message sent.'));
        //         return $this->redirect(array('action' => 'messages'));
        //     }
        //     $this->Flash->error(__('Unable to send message.'));
        // }

        if ($this->request->is('post')) {
			$this->Message->create();
			$this->request->data['Message']['to_user_id'] = $this->request->data['Message']['users'];
			$to_user = $this->request->data['Message']['to_user_id'];
			$from_user = $this->request->data['Message']['from_user_id'];
			var_dump($to_user, $from_user);
			$check = $this->Message->query('SELECT EXISTS(SELECT * FROM Messages WHERE ( from_user_id = '. $to_user 
			. ' AND to_user_id = ' . $from_user . ') OR (from_user_id = ' . $from_user 
			. ' AND to_user_id = ' . $to_user . ')) AS result');
			// $check = $this->Message->query('Select * from Messages');
			pr($check);
			var_dump($check[0][0]['result']);
			if($check[0][0]['result'] == 0)
			{
			if ($this->Message->save($this->request->data)) {
				$this->Flash->success(__('The message has been sent.'));
				return $this->redirect(array('action' => 'messages'));
			} else {
				$this->Flash->error(__('The message could not be sent. Please, try again.'));
			}
			}
			else
			{
				$this->loadModel('Reply');
				$this->request->data['Reply']['to_user'] = $this->request->data['Message']['users'];
				$this->request->data['Reply']['from_user'] = $this->request->data['Message']['from_user'];
				$this->request->data['Reply']['message'] = $this->request->data['Message']['message'];

				if ($this->Reply->save($this->request->data)) {
					$this->Flash->success(__('The message has been saved.'));
					return $this->redirect(array('action' => 'search'));
				} else {
					$this->Flash->error(__('The message could not be saved. Please, try again.'));
				}
			}
			// if ($this->Message->save($this->request->data)) {
			// 	$this->Flash->success(__('The message has been saved.'));
			// 	return $this->redirect(array('action' => 'messages'));
			// } else {
			// 	$this->Flash->error(__('The message could not be saved. Please, try again.'));
			// }

        }
    }

    public function dltmessage($id){
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
    
        if ($this->Message->delete($id)) {
            $this->Flash->success(
                __('Message has been deleted.')
            );
        } else {
            $this->Flash->error(
                __('Message could not be deleted.', h($id))
            );
        }
    
        return $this->redirect(array('action' => 'messages'));
    }


    public  function replyview($id = null){
    
     if (!$id) {
        throw new NotFoundException(__('Invalid post'));
    }

    $message = $this->Message->findById($id);
    if (!$message) {
        throw new NotFoundException(__('Invalid post'));
    }
    
    $userdata = $this->User->query("
    SELECT id, username, profilepic FROM Users;
     ");
    $replies = $this->Reply->query("
    SELECT * FROM Replies as Replies WHERE 
    `message_id` = $id 
    ORDER BY date_created DESC 
    LIMIT 5
     ");

    $options = array('conditions' => array('Message.' . $this->Message->primaryKey => $id));
    $this->set(compact('userdata'));
    $this->set('replies',$replies);
    $this->set('message', $message);
    }
}