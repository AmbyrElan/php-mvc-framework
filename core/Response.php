<?php

namespace app\core;
/** 
 * Class Response
 * 
 * @author AmbyrElan <89077791+AmbyrElan@users.noreply.github.com>
 * @package app\core
 */
class Response
{
    public function setStatusCode(int $code)
    {
        http_response_code($code);
    }
}
