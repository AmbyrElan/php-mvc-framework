<?php

namespace app\core;

/** 
 * Class Router
 *
 * @author AmbyrElan <89077791+AmbyrElan@users.noreply.github.com>
 * @package app\core
 */
class Router 
{
    public Request $request;
    public Response $response;
    protected array $routes = [];

    /** 
     * Router constructor.
     *
     * @param \app\core\Request $request
     * @param \app\core\Response $response
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath(); 
        $method = $this->request ->method();
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            $this->response->setStatusCode(404);
            return $this->renderView("_404");
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        if(is_array($callback)) {
            // create instance of controller
            // turn sitecontroller into an object
            // grab controller name from index.php (SiteController::Class, '...')
            // second element is the method
            Application::$app->controller = new $callback[0]();
            $callback[0] = Application::$app->controller;
        }

        // calls the method statically
        return call_user_func($callback, $this->request);
    }

    public function renderView($view, $params = []) 
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params);
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    public function renderContent($viewContent)
    {
        $layoutContent = $this->layoutContent();
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    protected function layoutContent()
    {
        $layout = Application::$app->controller->layout;
        // start output cache
        ob_start();

        // actual output
        include_once Application::$ROOT_DIR."/views/layouts/$layout.php";

        // return this instead of outputting to browser
        // clear buffer
        return ob_get_clean();
    }

    protected function renderOnlyView($view, $params)
    {
        foreach ($params as $key => $value) {
            // $$ explicitly grabs the variable name
            $$key = $value;
        }
        ob_start();
        include_once Application::$ROOT_DIR."/views/$view.php";
        return ob_get_clean();
    }

}
