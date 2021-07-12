<?php

class LoginController extends Controller{

    public function __construct(){
        $this->model = $this->model('UserLogin');
    }

    /**
     * Login: Processes a login request. NOTE: This controller can only be
     * accessed by unauthenticated users!
     * @access public
     * @example login/_login
     * @return void
     */
    public function login(){
        $data = [
            'title' => 'Login Page',
            'username' => '',
            'password' => '',
            'errorUsername' => '',
            'errorPassword' => ''
        ];
        
        if(Validate::loginForm($data)){
            $loggedInUser = $this->model->login($data['username'], $data['password']);

            if($loggedInUser){
                Session::createUserSession($loggedInUser);
                Redirect::to('/indexController/index');
            }
            else{
                $data['errorPassword'] = "Invalid Credentials. Please try again";
            }
        }

        $this->view('users/login', $data);
    }

    /**
     * Login: Processes a login request. NOTE: This controller can only be
     * accessed by unauthenticated users!
     * @access public
     * @example loginController/logout
     * @return void
     */
    public function logout(){
        SESSION::destroyUserSession();
        REDIRECT::to('/loginController/login');
    }
}