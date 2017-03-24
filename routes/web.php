<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {

    return App\Township::first()->towns()->get();

});
$app->get('/api/states', "ApiController@states");
$app->get('/api/districts', "ApiController@districts");
$app->get('/api/townships', "ApiController@townships");
$app->get('/api/towns', "ApiController@towns");
//$app->get('/api/villagetracts', "ApiController@districts");
