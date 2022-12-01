<?php

App::uses('AuthComponent', 'Controller/Component');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {

    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A username is required'
            ),
            '5 to 20 characters' => array(
                'rule' => array('between', 5, 20),
                'message' => '5 to 20 characters required'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A password is required'
            ),
            'passwordequal'  => array(
                'rule' =>'password_confirm',
                'message' => 'Passwords dont match')
            ),
        'email' => array(
                'required' => array(
                    'rule' => 'notBlank',
                    'message' => 'A email@ is required'
                ),
                'isUnique' => array(
                    'rule' => array('isUnique'),
                    'message' => 'Email is already taken'
                )
            )
    );

    public function password_confirm(){ 
        if ($this->data['User']['password'] !== $this->data['User']['password_confirm']){
            return false;       
        }
        return true;
    }

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new BlowfishPasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        }
        return true;
    }
}
