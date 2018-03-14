<?php
session_start();

try {
    require('error/NewException.php');
    require('autoloader/Autoloader.php');
    \Critique\Autoloader::register();
    
    //Faille CSRF
   	$object = new \Critique\token\GetToken();
   	$token = $object->getToken();

    //Routeur
    $routeur = new \Critique\routeur\Routeur();
    $routeur->initRouteur($token);
    
} 
catch(NewException $e) {
    ob_start();
        require('view/errorView.php');
    $content = ob_get_clean();
    require('view/template.php');
} 
