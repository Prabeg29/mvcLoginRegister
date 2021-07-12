<?php

class User extends Database{

    public function __construct(){
        parent::__construct();
    }

    public function findUserByEmail($email){
        $this->query('SELECT * FROM user WHERE email=:email');
        $this->bind(':email', $email);

        return $this->rowCount();
    }

    public function register($data){
        $this->query('INSERT INTO user(username, password) VALUE(:username, :password)');

        $this->bind(':username', $data['username']);
        $this->bind(':password', $data['password']);

        return $this->execute();
    }

    public function login($username, $password){
        $this->query('SELECT * FROM user WHERE username=:username');

        $this->bind(':username', $username);

        $row = $this->single();

        $hashedPassword = $row->password;

        return password_verify($password, $hashedPassword) ? $row : false;
    }
}