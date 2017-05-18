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
    // states
    $app->get('states', "StatesController@divisions");
    $app->get("states/{id}" , "StatesController@division");
    $app->get("states/{id}/{division}", "StatesController@subDivisions");

    // Districts
    $app->get('districts', "DistrictsController@divisions");
    $app->get("districts/{id}" , "DistrictsController@division");
    $app->get("districts/{id}/{division}", "DistrictsController@subDivisions");

    // Townships
    $app->get("townships", "TownshipsController@divisions");
    $app->get("townships/{id}" , "TownshipsController@division");
    $app->get("townships/{id}/{division}", "TownshipsController@subDivisions");

    // Towns

    $app->get("towns", "TownsController@divisions");
    $app->get("towns/{id}" , "TownsController@division");
    $app->get("towns/{id}/{division}", "TownsController@subDivisions");






});

