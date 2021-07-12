<?php

class Validate {

    // return bool
    public static function loginForm(&$data){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
                // Sanitize input
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title' => 'Login Page',
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'errorUsername' => '',
                'errorPassword' => '',
            ];

            // Validate username
            if(empty($data['username'])){
                $data['errorUsername'] = "Username is required!";
            }

            // Validate password
            if(empty($data['password'])){
                $data['errorPassword'] = "Password is required!";
            }

            return (empty($data['errorUsername']) && empty($data['errorPassword']));
        }
    }

}