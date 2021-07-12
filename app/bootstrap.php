<?php

require_once 'config/config.php';

spl_autoload_register(function($className){
    require 'libraries/' . $className . '.php';
});

require '../app/helpers/Validate.php';
require '../app/helpers/Session.php';
require '../app/helpers/Redirect.php';