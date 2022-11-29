<?php

App::uses('AppController', 'Controller');

class MessagesController extends AppController {

    public function index(){
        
    }

    public function messages(){

        $user_id = AuthComponent::user('id');

    }

}