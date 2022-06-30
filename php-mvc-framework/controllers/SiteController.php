<?php

namespace app\controllers;
use app\core\Application;

/** 
 * Class SiteController
 *
 * @author AmbyrElan <89077791+AmbyrElan@users.noreply.github.com>
 * @package app\controllers
 */
class SiteController
{
    public function home()
    {
        $params = [
            'name' => "AmbyrElan"
        ];
        return Application::$app->router->renderView('home', $params);
    }
    public function contact()
    {
        return Application::$app->router->renderView('contact');
    }
    public function handleContact()
    {
        // executed after post
        // of the contact form
        return 'Handling submitted data';
    }
}
