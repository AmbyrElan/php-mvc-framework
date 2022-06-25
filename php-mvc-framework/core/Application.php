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
    public Router $router;

    public function __construct()
    {
        $this->router = new Router();
    }
}
