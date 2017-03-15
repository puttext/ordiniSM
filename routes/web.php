<?php

use App\Http\Controllers\OrdiniController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::resource("ordini","OrdiniController");
Route::resource("user","UserController");
Route::get('ordini/pane/{anno}/{mese}/edit', 'PaneController@edit');
Route::post('ordini/pane/{anno}/{mese}', 'PaneController@update');
