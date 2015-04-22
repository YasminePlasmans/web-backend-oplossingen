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

Route::get('/', ['middleware' => 'guest', 'uses' => 'PagesController@index']);

Route::resource('dashboard' , 'TodosController' );

Route::get('dashboard/{id}/toggle','TodosController@toggle');
Route::get('dashboard/{id}/delete','TodosController@delete');

Route::controllers([

	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',

	]);