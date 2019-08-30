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

	//  checking the processing to group route and show json data.

$router->group(['prefix' => 'admin'], function () use ($router) {
    $router->get('/', 'UserController@index');
});


	//  User Route here -->

$router->post('users', 'UserController@create');











