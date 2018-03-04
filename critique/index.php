<?php
session_start();

try {
    require('error/NewException.php');
    require('autoloader/Autoloader.php');
    \Critique\Autoloader::register();

    $routeur = new \Critique\routeur\Routeur();
    $routeur->initRouteur();
} 
catch(NewException $e) {
    ob_start();
        require('view/errorView.php');
    $content = ob_get_clean();
    require('view/template.php');
} 
