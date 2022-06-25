<?php

/** 
 * Author: @AmbyrElan
 */

require_once 

$app = new Application();

$app->router->get('/', function(){
    return 'Running main mvc file that handles entry scripts';
});

$app->run();
