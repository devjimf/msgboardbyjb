<?php

App::uses('AppController', 'Controller');

class RepliesController extends AppController {

    public function newreply(){
        $this->autoRender = false;
		$this->request->allowMethod('ajax','POST', 'GET');
		$user_id = AuthComponent::user('id');
         
        

		if ($this->request->is('post')) {
		
		pr($this->request->data);
		$this->request->data['Reply']['user_id'] = $this->request->data['Replies']['user_id'];
		$this->request->data['Reply']['message_id'] = $this->request->data['Replies']['message_id'];
		$this->request->data['Reply']['reply_details'] = $this->request->data['Replies']['reply_details'];
			$this->Reply->create();
			if ($this->Reply->save($this->request->data)) {
				$this->Flash->success(__('The reply has been saved.'));
				return $this->redirect(array('controller'=>'messages','action' => 'replyview', $this->request->data['Replies']['message_id']));
			} else {
				$this->Flash->error(__('The reply could not be saved. Please, try again.'));
			}
		}
		// $messages = $this->Reply->Message->find('list');
		// $users = $this->Reply->User->find('list');
		// $this->set(compact('messages', 'users'));
		
		$this->redirect($this->referer());
}

    public function dltreply($id, $messageid){
        // pr($id);
        // pr($messageid);
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
    
        if ($this->Reply->delete($id)) {

            $this->Flash->success(
                __('Message has been deleted.')
            );
        } else {
            $this->Flash->error(
                __('Message could not be deleted.', h($id))
            );
        }

        return $this->redirect(array('controller'=>'messages','action' => 'replyview', $messageid));
    }

}