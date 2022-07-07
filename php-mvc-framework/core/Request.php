<?php

namespace app\core;

/**
 * Class Request
 *
 * @author AmbyrElan <89077791+AmbyrElan@users.noreply.github.com>
 * @package app\core
 */
Class Request 
{
    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');
        
        if ($position === false) {
            return $path;
        }

        return substr($path, 0, $position);
    }

    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function getBody()
    {
        $body = [];

        // iterate over super global GET
        // filter input to remove special characters
        if ($this->getMethod === 'get') {
            foreach ($_GET as $key => $value) {
              $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);  
            }
        }

        if ($this->getMethod() === 'post') {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        return $body;
    }
}
