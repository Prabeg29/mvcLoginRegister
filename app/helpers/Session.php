<?php

class Session {

    public static function createUserSession($user){
        session_start();
        $_SESSION['userId'] = $user->id;
        $_SESSION['username'] = $user->username;
    }

    public static function destroyUserSession(){
        session_start();
        unset($_SESSION['userId']);
        unset($_SESSION['username']);
    }

    public static function isLoggedIn(){
        session_start();    
        return isset($_SESSION['userId']);
    }
}