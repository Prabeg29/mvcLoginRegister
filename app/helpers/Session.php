<?php

class Session {

    public static function createUserSession($user){
        $_SESSION['userId'] = $user->id;
        $_SESSION['username'] = $user->username;
    }

    public static function isLoggedIn(){
        session_start();
        return isset($_SESSION['userId']);
    }
}