<?php

require_once __DIR__.'/vendor/autoload.php';

use app\core\Application;

// Create new application
$app = new Application();

// Return when / is run
$app->router->get('/', function(){
    return 'Hello World';
}); 

$app->router->get('/contact', function(){
    return 'Contact';
}); 

// Handle everything
$app->run();

 
