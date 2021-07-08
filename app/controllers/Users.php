<?php

class Users extends Controller {

    public function __construct(){
        $this->model = $this->model('User');
    }

    public function register(){
        //
    }

    public function login(){
        $data = [
            'title' => 'Login Page',
            'username' => '',
            'password' => '',
            'errorUsername' => '',
            'errorPassword' => ''
        ];

        $this->view('users/login', $data);
    }
}