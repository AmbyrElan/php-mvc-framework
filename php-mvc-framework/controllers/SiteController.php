<?php

namespace app\controllers;
use app\core\Controller;
use app\core\Application;
use app\core\Request;

/** 
 * Class SiteController
 *
 * @author AmbyrElan <89077791+AmbyrElan@users.noreply.github.com>
 * @package app\controllers
 */
class SiteController extends Controller
{
    public function home()
    {
        $params = [
            'name' => "AmbyrElan"
        ];
        return $this->render('home', $params);
    }

    public function contact()
    {
        return $this->render('contact');
    }

    public function handleContact(Request $request)
    {
        // access request instance
        // call the getbody
        $body = $request->getBody();

        // executed after post
        // of the contact form
        return 'Handling submitted data';
    }
}
