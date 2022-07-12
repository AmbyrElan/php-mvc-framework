<?php 

namespace app\core;
/** 
 * Class Application
 *
 * @author AmbyrElan <89077791+AmbyrElan@users.noreply.github.com>
 * @package app\core
 */
class Application 
{ 
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;
    public static Application $app;
    public Controller $controller;

    public function __construct($rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
    }

    public function run()
    {
        echo $this->router->resolve();
    }

    /** 
     * @return \app\core\Controller
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @param \app\core\Controller $controller
     */
    public function setController()
    {
        return $this->controller;
    }
}
