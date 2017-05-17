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

//$app->getgroup('/test', "ApiController@states");
$app->group(['prefix' => 'api'], function () use ($app) {
    $app->get('states', "StatesController@states");
    $app->get("states/{id}" , "StatesController@state");
    $app->get("states/{id}/{division}", "StatesController@divisions");
});

$app->get('/api/districts', "DivisionsController@districts");
$app->get('/api/townships', "DivisionsController@townships");
$app->get('/api/towns', "DivisionsController@towns");
//$app->get('/api/villagetracts', "ApiController@districts");
//

$app->get('/api/districts/{id}' , "DivisionController@district");
$app->get('/api/townships/{id}' , "DivisionController@township");
$app->get('/api/towns/{id}' , "DivisionControllerr@town");

// 
//$app->get('/api/districts/{name}/{division}', "HierarchicalDivisionController@townships");
//$app->get('/api/townships/{name}/{division}', "HierarchicalDivisionController@towns");
