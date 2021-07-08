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
            'title' => 'Login Page'
        ];

        $this->view('users/login', $data);
    }
}