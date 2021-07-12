<?php

class UserLogin extends Database{
    public function __construct(){
        parent::__construct();
    }

    public function login($username, $password){
        $this->query('SELECT * FROM user WHERE username=:username');

        $this->bind(':username', $username);

        $row = $this->single();

        $hashedPassword = $row->password;

        return password_verify($password, $hashedPassword) ? $row : false;
    }
}