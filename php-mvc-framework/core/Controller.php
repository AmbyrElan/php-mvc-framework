<?php

namespace app\core;
use app\core\Application;

/** 
 * Class Controller
 *
 * @author AmbyrElan <89077791+AmbyrElan@users.noreply.github.com>
 * @package app\core
 */
class Controller 
{
    // default layout
    public string $layout = 'main';
    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    public function render($view, $params = []) 
    {
        return Application::$app->router->renderView($view, $params);
    }
}

