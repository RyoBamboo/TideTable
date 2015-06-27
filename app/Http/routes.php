<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**
 * User
 */
// Home
$router->get('/', 'HomeController@index');

// Tide
$router->get('/tide/{id}', 'TideController@index');
$router->get('/tide/area', 'TideController@index');


/**
 * Admin
 */
// Home
$router->get('/admin', 'Admin\AdminHomeController@index');

// Tide
$router->get('/admin/tide', 'Admin\TideController@index');
$router->get('/admin/tide/get', 'Admin\TideController@get');

// Weather
// Spot
$router->get('/admin/spot/', 'Admin\SpotController@index');
$router->get('/admin/spot/get', 'Admin\SpotController@get');


