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

    return view('index');
});

//$app->get('/test', "ApiController@states");

$app->get('/api/states', "DivisionsController@states");
$app->get('/api/districts', "DivisionsController@districts");
$app->get('/api/townships', "DivisionsControllertownships");
$app->get('/api/towns', "DivisionsController@towns");
//$app->get('/api/villagetracts', "ApiController@districts");
//

$app->get('/api/states/{name}' , "DivisionController@state");
$app->get('/api/towns/{name}' , "DivisionControllerr@town");

// 
$app->get('/api/states/{name}/districts', "HierarchicalDivisionController@districts");
$app->get('/api/districts/{name}/townships', "HierarchicalDivisionController@townships");
$app->get('/api/townships/{name}/towns', "HierarchicalDivisionController@towns");
