<?php

class Validate {

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

    public static function registerForm(&$data){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            // Sanitize input
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title' => 'Register',
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'errorUsername' => '',
                'errorEmail' => '',
                'errorPassword' => '',
                'errorConfirmPassword' => ''
            ];

            $regexName = '/^[a-zA-Z0-9]*$/';
            $regexPassword = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';

            // Validate username
            if(empty($data['username'])){
                $data['errorUsername'] = "Username is required!";
            }
            else if(!preg_match($regexName, $data['username'])){
                $data['errorUsername'] = "Username can only consists of letters and numbers";
            }

            // Validate email
            if(empty($data['email'])){
                $data['errorEmail'] = "Email is required!";
            }
            else if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
                $data['errorEmail'] = "Please enter valid email.";
            }

            // Validate password
            if(empty($data['password'])){
                $data['errorPassword'] = "Password is required!";
            }
            else if(!preg_match($regexPassword, $data['password'])){
                $data['errorPassword'] = "Password must have minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character";
            }

            // Validate confirm password
            if(empty($data['confirmPassword'])){
                $data['errorConfirmPassword'] = "Password is required!";
            }
            else if($data['confirmPassword'] !== $data['password']){
                $data['errorConfirmPassword'] = "Password do not match";
            }

            return (empty($data['errorUsername']) &&
                    empty($data['errorEmail']) &&
                    empty($data['errorPassword']) &&
                    empty($data['errorConfirmPassword']));
        }
    }
}