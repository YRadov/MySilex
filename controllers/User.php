<?php

namespace app\controllers;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class User
{
    public static $test = 'Test';

    public function bar(Request $request, Application $app)
    {
        $name = $request->get('name');
        return 'Hello ' . $app->escape($name);
    }

}