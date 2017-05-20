<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use app\controllers\User;

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

$app['debug'] = true;
######################################################################################
$app->get('/', function () {
    return 'Hello';
});
######################################################################################
$app->get('/hello/{name}', function ($name) use ($app) {
    return 'Hello ' . $app->escape($name);
})->value('name', User::$test);
######################################################################################
$app->post('/feedback', function (Request $request) {
    $message = $request->get('message');
    mail('feedback@yoursite.com', '[YourSite] Feedback', $message);

    return new Response('Thank you for your feedback!', 201);
});
######################################################################################
$app->get('/my/{name}', 'app\\controllers\\User::bar')
    ->value('name', User::$test);;
######################################################################################

$app->run();