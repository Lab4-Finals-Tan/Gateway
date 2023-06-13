<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['middleware' => 'client.credentials'], function() use ($router){
    
    $router->group(['prefix' => 'site1'], function($router) {
        $router->get('/users', 'site1Controller@showUsers');
        $router->get('/users/{id}', 'site1Controller@showUser');
        $router->delete('/users/{id}', 'site1Controller@deleteUser');
        $router->post('/users', 'site1Controller@createUser');
        $router->patch('/users/{id}', 'site1Controller@patchUser');
        $router->get('/userjob','site1Controller@index');             //get all jobs
        $router->get('/userjob/{id}','site1Controller@show');            //get jobs by id
    });


    $router->group(['prefix' => 'site2'], function($router) {
        $router->get('/users', 'site2Controller@showUsers');
        $router->get('/users/{id}', 'site2Controller@showUser');
        $router->delete('/users/{id}', 'site2Controller@deleteUser');
        $router->post('/users', 'site2Controller@createUser');
        $router->patch('/users/{id}', 'site2Controller@patchUser');
        $router->get('/userjob','site2Controller@index');             //get all jobs
        $router->get('/userjob/{id}','site2Controller@show');            //get jobs by id
    });

});