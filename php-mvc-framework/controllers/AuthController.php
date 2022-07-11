<?php

namespace app\controllers;
use app\core\Controller;
use app\core\Application;
use app\core\Request;

/** 
 * Class AuthController
 *
 * @author AmbyrElan <89077791+AmbyrElan@users.noreply.github.com>
 * @package app\controllers
 */
class AuthController extends Controller
{
    public function login()
    {
        return $this->render('login');
    }

    public function register(Request $request)
    {
        if ($request->isPost()) {
            return 'Handle submitted data.';
        }
        return $this->render('register');
    }
}

