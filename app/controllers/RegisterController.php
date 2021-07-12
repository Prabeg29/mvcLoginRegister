<?php

class RegisterController extends Controller {

    public function __construct(){
        $this->model = $this->model('User');
    }

    public function register(){
        $data = [
            'title' => 'Register',
            'username' => '',
            'email' => '',
            'password' => '',
            'confrimPassword' => '',
            'errorUsername' => '',
            'errorEmail' => '',
            'errorPassword' => '',
            'errorConfirmPassword' => ''
        ];

        if(Validate::registerForm($data)){
            // Hash password
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

            if($this->model->register($data)){
                Redirect::to('/loginController/login');
            }
            else{
                die("Cannot register user");
            }
        }

        $this->view('users/register', $data);
    }
}