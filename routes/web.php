<?php

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
Route::resource('ordini', 'OrdiniController');
Route::resource('user', 'UserController');
Route::get('ordini/pane/{anno}/{mese}/edit/{fornaio?}', 'PaneController@edit');
Route::post('ordini/pane/{anno}/{mese}', 'PaneController@update');
Route::get('ordini/compila/{id?}', 'OrdiniController@compila');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'gestore']], function () {
    Route::redirect('/', '/admin/stagioni');
    Route::get('stagioni', 'StagioniController@index');
    Route::get('stagioni/create', 'StagioniController@create');
    Route::post('stagioni', 'StagioniController@store');
    Route::get('stagioni/{stagione}/edit', 'StagioniController@edit');
    Route::put('stagioni/{stagione}', 'StagioniController@update');
    Route::post('stagioni/{stagione}/corrente', 'StagioniController@corrente');
});
