<?php
session_start();

try {
    require('error/NewException.php');
    require('routeur.php');
    require('autoloader/Autoloader.php');
    \Critique\Autoloader::register();

    foreach ($routeur as $key => $value) {
        if (preg_match($key, $_SERVER['REQUEST_URI'])){
            $rout = explode('@', $value);
            $class = '\Critique\controler\\' . $rout[0];
            $controler = new $class();
            $method = $rout[1];
            $controler->$method();
        }
    }
    if(!(isset($controler))){
      throw new NewException("Cette page n'existe pas !", 404);   
    }
} 
catch(NewException $e) {
    ob_start();
        require('view/errorView.php');
    $content = ob_get_clean();
    require('view/template.php');
} 
