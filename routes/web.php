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
    $router->get('/', 'ExampleController@index');
});


	// user resource
$router->post('users', 'UserController@create');   

	// User Authentication
$router->post('/login', 'UserController@authenticate');

	// Restricted route
$router->group(['middleware' => 'auth:api'], function () use ($router)
{
	$router->get('/users', 'UserController@view'); 
	$router->get('/me', 'UserController@me');
});
 










