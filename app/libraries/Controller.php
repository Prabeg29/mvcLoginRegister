<?php
/*
 * Load model and view
 */

 class Controller {
     // Load Model
     public function model($model) {
        require '../app/models/' . $model .'.php';

        return new $model();
     }

     // Load View
     public function view($view, $data = []) {
        if(file_exists('../app/views/' . $view . '.php')){
            require '../app/views/' . $view . '.php';
        }
        else{
            die('View does not exists');
        }
     }
 }