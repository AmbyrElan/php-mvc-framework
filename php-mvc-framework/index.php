<?php

/** 
 * Author: @AmbyrElan
 */
require_once __DIR__ . '/vendor/autoload.php'; 
use app\core\Application;

$app = new Application();

$app->router->get('/', function(){
    return 'Running main mvc file that handles entry scripts';
});

$app->router->get('/contact', function(){
    return 'Contact';
});

$app->run();
